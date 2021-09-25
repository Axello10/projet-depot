<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\DepositProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('app.depot_product.read')
        //         ->with('depotproducts', DepositProduct::OrderBy('created_at', 'desc')->get());
        return DepositProduct::OrderBy('created_at', 'desc')->get();
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
            'product_id' => 'required|min:1',
            'quantity' => 'required|min:1'
        ]);

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;
        $data['deposit_id'] = Auth::user()->deposit->id;

        DepositProduct::create($data);

        return redirect()->route('deposits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DepositProduct  $depositProduct
     * @return \Illuminate\Http\Response
     */
    public function show(DepositProduct $depotproduct)
    {
        return view('app.depot_product.one')
                ->with('deproduct', $depotproduct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepositProduct  $depositProduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Product::findOrFail($id);
        return view('app.depot_product.update')
                ->with('prod', $prod);
        // return [Product::findOrFail($id), DepositProduct::where('id', Product::findOrFail($id)->id)->first()];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepositProduct  $depositProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|min:1'
        ]);

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;
        $data['deposit_id'] = Auth::user()->deposit->id;

        $depositProduct = DepositProduct::findOrFail($id);

        $depositProduct->update($data);

        return redirect()->route('depotproducts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepositProduct  $depositProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $depositProduct = DepositProduct::findOrFail($id);
        $depositProduct->delete();
        return back();
    }
}
