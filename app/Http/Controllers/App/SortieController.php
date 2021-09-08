<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Sortie;
use App\Models\Product;
use App\Models\Deposit;
use App\Models\Emptie;
use Illuminate\Http\Request;
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
        $sorties = Sortie::orderBy('created_at', 'desc')->get();

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
        $clients = Client::all();
        $products = Product::all();
        $deposits = Deposit::all();
        return view('app.sorties.new')
                ->with('clients', $clients)
                ->with('products', $products)
                ->with('deposits', $deposits);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
                'deposit_id' => $request->deposit_id
            ];

            Emptie::create($empti);
        } 
        
        else {
            $data = $request->all();
            $data['empty'] = $request->quantity;
        }

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        $data['price'] = Product::findOrFail($request->product_id)->price_out * $request->quantity;

        $client = Client::findOrFail($request->client_id);

        if ($client['grade_id'] == 1 || $client['grade_id'] === 2) {
            $data['price'] = 0;
        }

        Sortie::create($data);

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
        $clients = Client::all();
        $products = Product::all();
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
        $request->validate([
            'quantity' => 'min:1',
        ]);
        
        // verifier si le nombre de vide est inferieur a la quantité il ajouter dans les dettes
        // echo json_encode($request->all());
        if ($request->empty < $request->quantity) {
            $empti = [
                'client_id' => $request->client_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity - $request->empty,
                'deposit_id' => $request->deposit_id
            ];

            Emptie::create($empti);
        } 
        
        else {
            $data = $request->all();
            $data['empty'] = $request->quantity;

            $empt = Emptie::where('id', $request->id)->get();
            $empt->destroy($empt);
        }

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        $data['price'] = Product::findOrFail($request->product_id)->price_out * $request->quantity;

        $client = Client::findOrFail($request->client_id);

        if ($client['grade_id'] == 1 || $client['grade_id'] === 2) {
            $data['price'] = 0;
        }

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
    }
}
