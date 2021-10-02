<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Entrie;
use App\Models\Giveback;
use App\Models\Product;
use App\Models\DepositProduct;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entrie::orderBy('created_at', 'desc')->get();

        return view('app.entries.read')
                ->with('entries', $entries);
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
        return view('app.entries.new')
                ->with('vendors', $vendors)
                ->with('products', $products)
                ->with('deposits', $deposits);
    }

    /**
    * 
    * @param $products[] liste des produits du depot
    * @param $product le produit a inserer
    * 
    * @return bool
    */
    public static function check_existing($products, $product) {
        foreach($products as $prod) {
            $res = false;
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
            'vendor_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|min:1',
            'empty' => 'required',
            'deposit_id' => 'required'
        ]);
        
        // verifier si le nombre de vide est inferieur a la quantité il ajouter dans les dettes
        // echo json_encode($request->all());
        if ($request->empty < $request->quantity) {
            $give = [
                'vendor_id' => $request->vendor_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity - $request->empty,
                'deposit_id' => $request->deposit_id
            ];

            Giveback::create($give);
        } 
        
        else {
            $data = $request->all();
            $data['empty'] = $request->quantity;
        }

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        $data['price'] = Product::findOrFail($request->product_id)
                                    ->price_in * $request->quantity;

        $vendor = Vendor::findOrFail($request->vendor_id);

        if ($vendor['grade_id'] == 1 || $vendor['grade_id'] === 2) {
            $data['price'] = 0;
        }

        $product = Product::findOrFail($request->product_id);

        $pd_update = [
            'quantity' => $product->quantity + $request->quantity
        ];

        Product::where('id', $request->product_id)->update($pd_update);

        $depot = DepositProduct::where('deposit_id', Auth::user()->deposit_id)->get();

        $products = [];
        for($i = 0; $i < count($depot); $i++) {
            $products[$i] = Product::findOrFail($depot[$i]->product_id);
        }      

        if ($this->check_existing($products, Product::findOrFail($request->product_id))) {
            // update the products table
            $product_q = ['quantity' => $request->quantity + $product->quantity];
            $product->update($product_q);
            // update the depotproduct table
            $deproduct = DepositProduct::where('deposit_id', Auth::user()->deposit_id)->where('product_id', $request->product_id)->first();
            $deproduct->update(['quantity' => $deproduct->quantity + $request->quantity]);
        } else {
            $depotproduct = [
                'deposit_id' => $request->deposit_id,
                'product_id' => $product->id,
                'user_id' => Auth::user()->id,
                'quantity' => $request->quantity
            ];
    
            DepositProduct::create($depotproduct);
        }

        Entrie::create($data);

        return redirect()->route('entries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrie  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entrie $entry)
    {
        return view('app.entries.one')
                ->with('entrie', $entry);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrie  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrie $entry)
    {
        $depot = DepositProduct::where('deposit_id', Auth::user()->deposit_id)->get();

        $products = [];
        for($i = 0; $i < count($depot); $i++) {
            $products[$i] = Product::findOrFail($depot[$i]->product_id);
        }
        $vendors = Vendor::all();
        $deposits = Deposit::all();
        return view('app.entries.update')
                ->with('entrie', $entry)
                ->with('vendors', $vendors)
                ->with('products', $products)
                ->with('deposits', $deposits);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrie  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrie $entry)
    {

        $request->validate([
            'quantity' => 'min:1',
        ]);
        
        // verifier si le nombre de vide est inferieur a la quantité il ajouter dans les dettes
        // echo json_encode($request->all());
        if ($request->empty < $request->quantity) {
            $give = [
                'vendor_id' => $request->vendor_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity - $request->empty,
                'deposit_id' => $request->deposit_id
            ];

            Giveback::create($give);
        } 
        
        else {
            $data = $request->all();
            $data['empty'] = $request->quantity;
        }

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        $data['price'] = Product::findOrFail($request->product_id)
                                    ->price_in * $request->quantity;

        $vendor = Vendor::findOrFail($request->vendor_id);

        if ($vendor['grade_id'] == 1 || $vendor['grade_id'] === 2) {
            $data['price'] = 0;
        }

        $product = Product::findOrFail($request->product_id);
        
        $deproduct = DepositProduct::where('deposit_id', Auth::user()->deposit_id)->where('product_id', $request->product_id)->first();

        $depot = DepositProduct::where('deposit_id', Auth::user()->deposit_id)->get();

        $products = [];
        for($i = 0; $i < count($depot); $i++) {
            $products[$i] = Product::findOrFail($depot[$i]->product_id);
        }      

        if ($this->check_existing($products, Product::findOrFail($request->product_id))) {

            /// updating by adding or substracting from the quantity
            if ($request->choice === "add") {
                // diminuer la quantité du produit dans le stocke du depot 
                $product_quantity = ['quantity' => $product->quantity - $request->quantity];
    
                // diminuer la quantité dans la totale des produit
                $deprod_quantity = ['quantity' => $deproduct->quantity - $request->quantity];
    
                $data['quantity'] = $entry->quantity + $request->quantity;
            }
    
            else if ($request->choice === "substract") {
                // augmenter la quantité du produit dans le stocke du depot 
                $product_quantity = ['quantity' => $product->quantity + $request->quantity];
    
                // augmenter la quantité dans la totale des produit
                $deprod_quantity = ['quantity' => $deproduct->quantity + $request->quantity];
    
                $data['quantity'] = $entry->quantity - $request->quantity;
            }
            
            if ($product_quantity['quantity'] <= 0 || $deprod_quantity['quantity'] <= 0 || $data['quantity'] <= 0) {
                return back()->withErrors(['errors' => 'operation impossible!']);
            }

            // update the products table
            $product->update($product_quantity);
            // update the depotproduct table
            $deproduct->update($deprod_quantity);
        } else {
            $depotproduct = [
                'deposit_id' => $request->deposit_id,
                'product_id' => $product->id,
                'user_id' => Auth::user()->id,
                'quantity' => $request->quantity
            ];
    
            DepositProduct::create($depotproduct);
        }

        $entry->update($data);

        return redirect()->route('entries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrie $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrie $entry)
    {
        $entry->delete();
        return back();
    }
}
