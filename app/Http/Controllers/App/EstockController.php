<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Estock;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.estocks.read')
                ->with('estocks', Estock::orderBy('created_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.estocks.new')
                ->with('products', Product::all());
    }

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

        $stock = Estock::where('deposit_id', Auth::user()->deposit_id)->get();

        $products = [];
        for($i = 0; $i < count($stock); $i++) {
            $products[$i] = Product::findOrFail($stock[$i]->product_id);
        }
        
        $product = Product::findOrFail($request->product_id);

        if (!$this->check_existing($products, Product::findOrFail($request->product_id))) {
    
            Estock::create($request->all());
    
            return redirect()->route('estocks.index');
        } else {
            return redirect()->route('estocks.edit', $product->id)->withErrors(['errors' => 'produit deja existant, essayez de le mettre a jour.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estock  $estock
     * @return \Illuminate\Http\Response
     */
    public function show(Estock $estock)
    {
        return view('app.estocks.one')
                ->with('estock', $estock);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estock  $estock
     * @return \Illuminate\Http\Response
     */
    public function edit(Estock $estock)
    {
        return view('app.estocks.update')
                ->with('products', Product::all())
                ->with('estock', $estock);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estock  $estock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estock $estock)
    {
        $request->validate([
            'quantity' => 'required|min:1'
        ]);

        $data = $request->all();
        
        if ($request->choice === "add")
        {
            $data['quantity'] = $estock->quantity + $request->quantity;

        } else if ($request->choice === "substract")
        {
            $data['quantity'] = $estock->quantity - $request->quantity;
        }

        $estock->update($data);
                
        return redirect()->route('estocks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estock  $estock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estock $estock)
    {
        if (Auth::user()->id === 1) {
            $estock->delete();

            return redirect()->route('estocks.index');
        } else {
            return 403;
        }
    }
}
