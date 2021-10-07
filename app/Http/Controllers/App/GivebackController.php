<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Giveback;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Deposit;
use Illuminate\Http\Request;

class GivebackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $givebacks = Giveback::all();
        return view('app.givebacks.read')->with('givebacks', $givebacks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::all();
        $products = Product::all();
        $deposits = Deposit::all();
        return view('app.givebacks.new')
                ->with('vendors', $vendors)
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
            'vendor_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'deposit_id' => 'required'
        ]);

        Giveback::create($request->all());

        return redirect()->route('givebacks.index')->with('message', 'dette de vide bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Giveback  $giveback
     * @return \Illuminate\Http\Response
     */
    public function show(Giveback $giveback)
    {
        return view('app.givebacks.one')->with('giveback', $giveback);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Giveback  $giveback
     * @return \Illuminate\Http\Response
     */
    public function edit(Giveback $giveback)
    {
        $vendors = Vendor::all();
        $products = Product::all();
        $deposits = Deposit::all();
        return view('app.givebacks.update')
            ->with('giveback', $giveback)
            ->with('vendors', $vendors)
            ->with('products', $products)
            ->with('deposits', $deposits);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Giveback  $giveback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giveback $giveback)
    {
        $request->validate([
            'vendor_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'deposit_id' => 'required'
        ]);

        $giveback->update($request->all());

        return redirect()->route('givebacks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Giveback  $giveback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giveback $giveback)
    {
        $giveback->delete();

        return redirect()->route('givebacks.index');
    }
}
