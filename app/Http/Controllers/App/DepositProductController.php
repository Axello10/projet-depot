<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\DepositProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Deposit;
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
        return view('app.depot_product.new')
                ->with('products', Product::all());
    }

    /**
    * 
    * @param $products[] liste des produits du depot
    * @param $product le produit a inserer
    * 
    * @return bool
    */
    public static function check_existing($products, $product) {
        $res = false;
        foreach($products as $prod) {
            if ($prod->name === $product->name) {
                $res = true;
                break;
            }
            $res = false;
        }
        return $res;
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
            'product_id' => 'required',
            'quantity' => 'required|min:1'
        ]);

        $depot = DepositProduct::where('deposit_id', Auth::user()->deposit_id)->get();

        $products = [];
        for($i = 0; $i < count($depot); $i++) {
            $products[$i] = Product::findOrFail($depot[$i]->product_id);
        }      
        
        $product = Product::findOrFail($request->product_id);

        if (!$this->check_existing($products, Product::findOrFail($request->product_id))) {
            $data = $request->all();

            $data['user_id'] = Auth::user()->id;
            $data['deposit_id'] = Auth::user()->deposit->id;
    
            DepositProduct::create($data);

            $product_quantity = $product->quantity + $request->quantity;
            
            $product->update(['quantity' => $product_quantity]);
    
            return redirect()->route('deposits.show', Auth::user()->deposit_id);
        } else {
            return redirect()->route('depotproducts.edit', $product->id)->withErrors(['errors' => 'produit deja existant, essayez de le mettre a jour.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DepositProduct  $depositProduct
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        return view('app.depot_product.one')
                ->with('deproduct', DepositProduct::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepositProduct  $depositProduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deProd = DepositProduct::findOrFail($id);
        $product = Product::findOrFail($deProd->product_id);

        return view('app.depot_product.update')
                ->with('product', $product)
                ->with('depotproduct', $deProd);
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

        $depositProduct = DepositProduct::findOrFail($id);

        $product = Product::findOrFail($depositProduct->product_id);

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;
        $data['deposit_id'] = Auth::user()->deposit->id;
        
        if ($request->choice === "add")
        {
            $depositProduct_quantity = $depositProduct->quantity + $request->quantity;
            $product_quantity = $product->quantity + $request->quantity;
        } else if ($request->choice === "substract")
        {
            $depositProduct_quantity = $depositProduct->quantity - $request->quantity;
            $product_quantity = $product->quantity - $request->quantity;
        }

        $depositProduct->update(['quantity' => $depositProduct_quantity]);
        
        $product->update(['quantity' => $product_quantity]);
                
        return redirect()->route('deposits.show', Auth::user()->deposit_id);

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
