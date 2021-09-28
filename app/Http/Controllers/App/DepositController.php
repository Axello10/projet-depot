<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Deposit;
use App\Models\Grade;
use App\Models\Vendor;
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
        $deposits = Deposit::all();
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
        $grades = Grade::all();
        return view('app.deposits.new')
                ->with('grades', $grades);
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
            'name' => 'required|min:4',
            'grade_id' => 'required',
            'mobile_number' => 'required|integer|min:8'
        ]);

        Deposit::create($request->all());
        Client::create($request->all());
        Vendor::create($request->all());

        return redirect()->route('deposits.index')->with('message', 'depot bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        return view('app.deposits.one')
                ->with('deposit', $deposit);

        return $deposit->products;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        $grades = Grade::all();
        return view('app.deposits.update')
        ->with('deposit', $deposit)
        ->with('grades', $grades);
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
        $request->validate([
            'name' => 'required|min:4',
            'grade_id' => 'required',
            'mobile_number' => 'integer|min:8'
        ]);

        $deposit->update($request->all());
        Client::where('mobile_number', $deposit->mobile_number)->update($request->only('name', 'grade_id', 'mobile_number', 'adress'));
        Vendor::where('mobile_number', $deposit->mobile_number)->update($request->only('name', 'grade_id', 'mobile_number', 'adress'));

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
        $deposit->delete();
    }
}
