<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Emptie;
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
        return view('app.empties.new');
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
    public function show(Emptie $emptie)
    {
        return view('app.empties.one')->with('emptie', $emptie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emptie  $emptie
     * @return \Illuminate\Http\Response
     */
    public function edit(Emptie $emptie)
    {
        return view('app.empties.update')
        ->with('emptie', $emptie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emptie  $emptie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emptie $emptie)
    {
        $request->validate([
            'client_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'deposit_id' => 'required'
        ]);

        $emptie->update($request->all());

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
