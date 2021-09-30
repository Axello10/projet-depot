<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
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
        $product = Product::findOrFail($deproduct->product_id);
        $data = $request->all();
        $data['price'] = $request->quantity * $product->price_out;
        $data['user_id'] = Auth::user()->id;
        $data['deposit_id'] = Auth::user()->deposit_id;
        
        // diminuer la quantité du produit dans le stocke du depot 
        $product_quantity = ['quantity' => $product->quantity - $request->quantity];
        $product->update($product_quantity);
        
        // diminuer la quantité dans la totale des produit
        $deprod_quantity = ['quantity' => $deproduct->quantity - $request->quantity];
        $deproduct->update($deprod_quantity);

        SimpleExit::create($data);

        return redirect()->route('simplexits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SimpleExit  $simpleExit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $simpleExit = SimpleExit::findOrFail($id);
        $product = Product::findOrFail($simpleExit->product_id);
        $deposit = Deposit::findOrFail($simpleExit->deposit_id);
        
        return view('app.simplexit.one')
                ->with('simplexit', $simpleExit)
                ->with('product', $product)
                ->with('deposit', $deposit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimpleExit  $simpleExit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $depot = DepositProduct::where('deposit_id', Auth::user()->deposit_id)->get();

        $products = [];
        for($i = 0; $i < count($depot); $i++) {
            $products[$i] = Product::findOrFail($depot[$i]->product_id);
        }

        return view('app.simplexit.update')
                ->with('simplexit', SimpleExit::findOrFail($id))
                ->with('products', $products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SimpleExit  $simpleExit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $simp = SimpleExit::findOrFail($id);
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
        $product = Product::findOrFail($deproduct->product_id);
        $data = $request->all();
        $data['price'] = $request->quantity * $product->price_out;
        $data['user_id'] = Auth::user()->id;
        $data['deposit_id'] = Auth::user()->deposit_id;

        if ($request->choice === "add") {
            // augmenter la quantité du produit dans le stocke du depot 
            $product_quantity = ['quantity' => $product->quantity + $request->quantity];

            // augmenter la quantité dans la totale des produit
            $deprod_quantity = ['quantity' => $deproduct->quantity + $request->quantity];

            $data['quantity'] = $simp->quantity + $request->quantity;
        }

        else if ($request->choice === "substract") {
            // augmenter la quantité du produit dans le stocke du depot 
            $product_quantity = ['quantity' => $product->quantity - $request->quantity];

            // augmenter la quantité dans la totale des produit
            $deprod_quantity = ['quantity' => $deproduct->quantity - $request->quantity];

            $data['quantity'] = $simp->quantity - $request->quantity;
        }
        
        if ($product_quantity['quantity'] <= 0 || $deprod_quantity['quantity'] <= 0 || $data['quantity'] <= 0) {
            return back()->withErrors(['errors' => 'operation impossible!']);
        }

        $product->update($product_quantity);        
        $simp->update($data);
        $deproduct->update($deprod_quantity);
        
        return redirect()->route('simplexits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimpleExit  $simpleExit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SimpleExit::findOrFail($id)->delete();

        return redirect()->route('simplexits.index');
    }
}
