<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\DepositProduct;
use Illuminate\Http\Request;

class DepositProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.depot_product.read')
                ->with('depotproducts', DepositProduct::OrderBy('created_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DepositProduct  $depositProduct
     * @return \Illuminate\Http\Response
     */
    public function show(DepositProduct $depositProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepositProduct  $depositProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(DepositProduct $depositProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepositProduct  $depositProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepositProduct $depositProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepositProduct  $depositProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepositProduct $depositProduct)
    {
        //
    }
}
