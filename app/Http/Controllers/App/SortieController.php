<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Sortie;
use App\Models\Product;
use App\Models\Deposit;
use App\Models\Emptie;
use Illuminate\Http\Request;
use App\Models\DepositProduct;
use Illuminate\Support\Facades\Auth;

class SortieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sorties = Sortie::where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')->get();

        return view('app.sorties.read')
                ->with('sorties', $sorties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $depot = DepositProduct::where('deposit_id', Auth::user()->deposit_id)->get();

        $products = [];
        for($i = 0; $i < count($depot); $i++) {
            $products[$i] = Product::findOrFail($depot[$i]->product_id);
        }

        $clients = Client::all();
        return view('app.sorties.new')
                ->with('clients', $clients)
                ->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deproduct = DepositProduct::where('deposit_id', Auth::user()->deposit_id)->where('product_id', $request->product_id)->first();
        // verifier si la quantité est dispo
        $product = Product::findOrFail($deproduct->product_id);

        if ($request->quantity > $deproduct->quantity || $deproduct->quantity === 0) {
            return back()->withErrors(['errors' => 'quantité non disponible']);
        } else if ($request->quantity === 0) {
            return back()->withErrors(['errors' => 'reka gufyina!']);
        }

        $request->validate([
            'client_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|min:1',
            'empty' => 'required',
            'deposit_id' => 'required'
        ]);
        
        // verifier si le nombre de vide est inferieur a la quantité il ajouter dans les dettes
        // echo json_encode($request->all());
        if ($request->empty < $request->quantity) {
            $empti = [
                'client_id' => $request->client_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity - $request->empty,
                'deposit_id' => $request->deposit_id,
                'payer' => 'non'
            ];

            Emptie::create($empti);
        }
        
        else {
            $data = $request->all();
            $data['empty'] = $request->quantity;
        }

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        $data['price'] = $request->prix * $request->quantity;

        $product = Product::findOrFail($request->product_id);

        if ($product->quantity === 0) {
            return back()->withErrors(['vous avez pas assez de '.$product->name.' dans le stock!']);
        }

        $pd_update = [
            'quantity' => $product->quantity - $request->quantity
        ];

        Product::where('id', $request->product_id)->update($pd_update);

        Sortie::create($data);

        $deprod_quantity = ['quantity' => $deproduct->quantity - $request->quantity];
        $deproduct->update($deprod_quantity);

        return redirect()->route('sorties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sortie  $sortie
     * @return \Illuminate\Http\Response
     */
    public function show(Sortie $sorty)
    {
        return view('app.sorties.one')
                ->with('sortie', $sorty);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sortie  $sortie
     * @return \Illuminate\Http\Response
     */
    public function edit(Sortie $sorty)
    {
        $depot = DepositProduct::where('deposit_id', Auth::user()->deposit_id)->get();

        $products = [];
        for($i = 0; $i < count($depot); $i++) {
            $products[$i] = Product::findOrFail($depot[$i]->product_id);
        }

        $clients = Client::all();
        $deposits = Deposit::all();
        return view('app.sorties.update')
                ->with('sortie', $sorty)
                ->with('clients', $clients)
                ->with('products', $products)
                ->with('deposits', $deposits);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sortie  $sortie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sortie $sorty)
    {
        $deproduct = DepositProduct::where('deposit_id', Auth::user()->deposit_id)->where('product_id', $request->product_id)->first();
        // verifier si la quantité est dispo
        $product = Product::findOrFail($deproduct->product_id);

        if ($request->quantity > $deproduct->quantity || $deproduct->quantity === 0) {
            return back()->withErrors(['errors' => 'quantité non disponible']);
        } else if ($request->quantity === 0) {
            return back()->withErrors(['errors' => 'reka gufyina!']);
        }

        $request->validate([
            'quantity' => 'min:1',
            'prix' => 'required|min:1'
        ]);
        
        // verifier si le nombre de vide est inferieur a la quantité il ajouter dans les dettes
        // echo json_encode($request->all());
        if ($request->empty < $request->quantity) {
            $empti = [
                'client_id' => $request->client_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity - $request->empty,
                'deposit_id' => $request->deposit_id,
                'payer' => 'non'
            ];

            Emptie::create($empti);
        } 

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        $data['price'] = $request->prix * $request->quantity;

        $client = Client::findOrFail($request->client_id);

        if ($client['grade_id'] == 1 || $client['grade_id'] === 2) {
            $data['price'] = 0;
        }

        if ($request->choice === "add") {
            // augmenter la quantité du produit dans le stocke du depot 
            $product_quantity = ['quantity' => $product->quantity - $request->quantity];

            // augmenter la quantité dans la totale des produit
            $deprod_quantity = ['quantity' => $deproduct->quantity - $request->quantity];

            $data['quantity'] = $sorty->quantity + $request->quantity;
        }

        else if ($request->choice === "substract") {
            // augmenter la quantité du produit dans le stocke du depot 
            $product_quantity = ['quantity' => $product->quantity + $request->quantity];

            // augmenter la quantité dans la totale des produit
            $deprod_quantity = ['quantity' => $deproduct->quantity + $request->quantity];

            $data['quantity'] = $sorty->quantity - $request->quantity;
        }
        
        if ($product_quantity['quantity'] <= 0 || $deprod_quantity['quantity'] <= 0 || $data['quantity'] <= 0) {
            return back()->withErrors(['errors' => 'operation impossible!']);
        }

        $product->update($product_quantity);        
        $deproduct->update($deprod_quantity);
        $sorty->update($data);

        return redirect()->route('sorties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sortie  $sortie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sortie $sorty)
    {
        $sorty->delete();

        return redirect()->route('sorties.index');
    }
}
