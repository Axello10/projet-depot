<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\RareCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RareCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.rarecases.read')
                ->with('rarecases', RareCase::orderBy('created_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.rarecases.new');
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
            'incident' => 'required'
        ]);

        RareCase::create($request->all());

        return redirect()->route('rarecases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RareCase  $rareCase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('app.rarecases.one')
                ->with('rarecase', RareCase::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RareCase  $rareCase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('app.rarecases.update')
                ->with('rarecase', RareCase::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RareCase  $rareCase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'incident' => 'required'
        ]);

        $rareCase = RareCase::findOrFail($id);

        $rareCase->update($request->all());

        return redirect()->route('rarecases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RareCase  $rareCase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role_id === 1) {
            $rareCase = RareCase::findOrFail($id);
    
            $rareCase->delete();
    
            return redirect()->route('rarecases.index');
        } else {
            return 403;
        }
    }
}
