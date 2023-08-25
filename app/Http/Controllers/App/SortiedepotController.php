<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\DepositProduct;
use App\Models\Product;
use App\Models\Sortiedepot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SortiedepotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.sortie_depots.read')
                ->with('sdeposits', Sortiedepot::orderBy('created_at', 'desc')->get());
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

        return view('app.sortie_depots.new')
                ->with('deposits', Deposit::all())
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

        if ($request->quantity > $deproduct->quantity) {
            return back()->withErrors(['errors' => 'quantité non disponible']);
        } else if ($request->quantity === 0) {
            return back()->withErrors(['errors' => 'reka gufyina!']);
        }

        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|min:1',
            'deposit_id' => 'required'
        ]);       

        $product = Product::findOrFail($request->product_id);

        if ($product->quantity === 0) {
            return back()->withErrors(['vous avez pas assez de '.$product->name.' dans le stock!']);
        }

        $pd_update = [
            'quantity' => $product->quantity - $request->quantity
        ];

        Product::where('id', $request->product_id)->update($pd_update);

        Sortiedepot::create($request->only('deposit_id', 'product_id', 'from_deposit_id', 'user_id', 'quantity'));

        $deposit_product = DepositProduct::where('product_id', $request->product_id)
                                        ->where('deposit_id', $request->deposit_id)
                                        ->first();
        
        if ($deposit_product) {
            $data = [
                'quantity' => $deposit_product->quantity + $request->quantity
            ];

            $deposit_product->update($data);
        } else {
            DepositProduct::create([
                'deposit_id' => $request->deposit_id,
                'product_id' => $request->product_id,
                'user_id' => auth()->user()->id,
                'quantity' => $request->quantity
            ]);
        }

        $deprod_quantity = ['quantity' => $deproduct->quantity - $request->quantity];
        $deproduct->update($deprod_quantity);

        return redirect()->route('sdeposits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sortiedepot  $sortiedepot
     * @return \Illuminate\Http\Response
     */
    public function show(Sortiedepot $sortiedepot)
    {
        return $sortiedepot;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sortiedepot  $sortiedepot
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $depot = DepositProduct::where('deposit_id', Auth::user()->deposit_id)->get();

        $products = [];
        for($i = 0; $i < count($depot); $i++) {
            $products[$i] = Product::findOrFail($depot[$i]->product_id);
        }

        return view('app.sortie_depots.update')
                ->with('deposits', Deposit::all())
                ->with('sdeposit', Sortiedepot::findOrFail($id))
                ->with('products', $products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sortiedepot  $sortiedepot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sortiedepot = Sortiedepot::findOrFail($id);

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
        ]);

        $data = $request->all();

        if ($request->choice === "add") {
            // augmenter la quantité du produit dans le stocke du depot 
            $product_quantity = ['quantity' => $product->quantity - $request->quantity];

            // augmenter la quantité dans la totale des produit
            $deprod_quantity = ['quantity' => $deproduct->quantity - $request->quantity];

            $data['quantity'] = $sortiedepot->quantity + $request->quantity;
        }

        else if ($request->choice === "substract") {
            // augmenter la quantité du produit dans le stocke du depot 
            $product_quantity = ['quantity' => $product->quantity + $request->quantity];

            // augmenter la quantité dans la totale des produit
            $deprod_quantity = ['quantity' => $deproduct->quantity + $request->quantity];

            $data['quantity'] = $sortiedepot->quantity - $request->quantity;
        }
        
        if ($product_quantity['quantity'] <= 0 || $deprod_quantity['quantity'] <= 0 || $data['quantity'] <= 0) {
            return back()->withErrors(['errors' => 'operation impossible!']);
        }

        $product->update($product_quantity);        
        $deproduct->update($deprod_quantity);
        $sortiedepot->update($data);

        return redirect()->route('sdeposits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sortiedepot  $sortiedepot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sortiedepot = Sortiedepot::findOrFail($id);
        
        $sortiedepot->delete();

        return redirect()->route('sdeposits.index');
    }
}
