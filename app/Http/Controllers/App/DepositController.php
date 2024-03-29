<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\DepositProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposit::orderBy('created_at', 'desc')->get();

        return view('app.deposits.read')
                ->with('deposits', $deposits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Deposit::class);

        return view('app.deposits.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Deposit::class);

        $request->validate([
            'name' => 'required|unique:deposits',
            'mobile_number' => 'required|unique:deposits'
        ]);

        Deposit::create($request->all());

        return redirect()->route('deposits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        
        $deproducts = DepositProduct::where('deposit_id', $deposit->id)->orderBy('id')->get();
        
        $products = [];
        
        for($i = 0; $i < count($deproducts); $i++) {
            $products[$i] = Product::findOrFail($deproducts[$i]->product_id);
        }

        return view('app.deposits.one')
                ->with('deposit', $deposit)
                ->with('products', $products)
                ->with('deproducts', $deproducts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        $this->authorize('update', Auth::user(), Deposit::class);

        return view('app.deposits.update')
                ->with('deposit', $deposit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        $this->authorize('update', Auth::user(), Deposit::class);

        $request->validate([
            'name' => 'required',
            'mobile_number' => 'required'
        ]);

        $deposit->update($request->all());

        return redirect()->route('deposits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        $this->authorize('delete', Auth::user(), Deposit::class);

        $deposit->delete();

        return redirect()->route('deposits.index');
    }
}
