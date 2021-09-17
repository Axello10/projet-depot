<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Entrie;
use App\Models\Product;
use App\Models\Sortie;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function products()
    {
        $products = Product::all();

        return view('app.main.products')
                ->with('products', $products);
    }

    public function entries()
    {
        $entries = Entrie::all();

        return view('app.main.entries')
                ->with('entries', $entries);
    }

    public function allproduct()
    {
        if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2 || Auth::user()->role_id === 3) {
            $all = Deposit::where('id', Auth::user()->deposit_id)->OrderBy('created_at', 'desc')->get();
            return view('app.main.depot_product')
                ->with('all', $all);
        }

        return view('errors.403');
    }

    public function exits()
    {
        $all = Sortie::OrderBy('created_at', 'desc')->get();

        return view('app.main.exits')
                ->with('exits', $all);
    }

    public function depotproduct()
    {

    }
}
