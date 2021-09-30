<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\DepositProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\SimpleExit;
use Illuminate\Http\Request;

class SimpleExitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SimpleExit::all();
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

        return view('app.simplexit.new')
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
        // la quantité disponible dans le stock
        $deproduct = DepositProduct::where('deposit_id', Auth::user()->deposit_id)->where('product_id', $request->product_id)->first();
        // verifier si la quantité est dispo
        $product = Product::findOrFail($deproduct->product_id);

        if ($request->quantity > $deproduct->quantity || $deproduct->quantity === 0) {
            return back()->withErrors(['errors' => 'quantité non disponible']);
        } else if ($request->quantity === 0) {
            return back()->withErrors(['errors' => 'reka gufyina!']);
        }
        // le prix egale a quantité par le produit
        // $product = Product::findOrFail($deproduct->product_id);
        // $data = $request->all();
        // $data['price'] = $request->quantity * $product->price_out;
        // // diminuer la quantité du produit dans le stocke du depot et dans la totale des produit
        // $product_quantity = ['quantity' => $product->quantity - $request->quantity];
        // $o =  $product->update($product_quantity);

        // $deprod_quantity = ['quantity' => $deproduct->quantity - $request->quantity];
        // $p = $deproduct->update($deprod_quantity);

        return ['product' => $deproduct];

        return redirect()->route('simplexits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SimpleExit  $simpleExit
     * @return \Illuminate\Http\Response
     */
    public function show(SimpleExit $simpleExit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimpleExit  $simpleExit
     * @return \Illuminate\Http\Response
     */
    public function edit(SimpleExit $simpleExit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SimpleExit  $simpleExit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimpleExit $simpleExit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimpleExit  $simpleExit
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimpleExit $simpleExit)
    {
        //
    }
}
