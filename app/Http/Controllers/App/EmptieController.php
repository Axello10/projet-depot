<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Deposit;
use App\Models\Emptie;
use App\Models\Product;
use Illuminate\Http\Request;

class EmptieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empties = Emptie::all();

        return view('app.empties.read')->with('empties', $empties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $products = Product::all();
        $deposits = Deposit::all();
        return view('app.empties.new')
                ->with('clients', $clients)
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
            'client_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'deposit_id' => 'required'
        ]);

        Emptie::create($request->all());

        return redirect()->route('empties.index')->with('message', 'vide bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emptie  $emptie
     * @return \Illuminate\Http\Response
     */
    public function show(Emptie $empty)
    {
        return view('app.empties.one')
                ->with('empty', $empty);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emptie  $emptie
     * @return \Illuminate\Http\Response
     */
    public function edit(Emptie $empty)
    {
        $clients = Client::all();
        $products = Product::all();
        $deposits = Deposit::all();
        return view('app.empties.update')
            ->with('emptie', $empty)
            ->with('clients', $clients)
            ->with('products', $products)
            ->with('deposits', $deposits);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emptie  $emptie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emptie $empty)
    {
        $request->validate([
            'client_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'deposit_id' => 'required'
        ]);

        $empty->update($request->all());

        return redirect()->route('empties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emptie  $emptie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emptie $emptie)
    {
        //
    }
}
