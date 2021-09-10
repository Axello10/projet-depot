<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\DepotProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.depot_product.read')
                ->with('depotproducts', DepotProduct::OrderBy('created_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.depot_product.new')
                ->with('products', Product::all());
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
            'product_id' => 'required|min:1'
        ]);

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;
        $data['deposit_id'] = Auth::user()->deposit->id;

        DepotProduct::create($data);

        return redirect()->route('depotproducts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DepotProduct  $depotProduct
     * @return \Illuminate\Http\Response
     */
    public function show(DepotProduct $depotProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepotProduct  $depotProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(DepotProduct $depotProduct)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepotProduct  $depotProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepotProduct $depotProduct)
    {
        $request->validate([
            'product_id' => 'required|min:1'
        ]);

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;
        $data['deposit_id'] = Auth::user()->deposit->id;

        $depotProduct->update($data);

        return redirect()->route('depotproducts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepotProduct  $depotProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepotProduct $depotProduct)
    {
        //
    }
}
