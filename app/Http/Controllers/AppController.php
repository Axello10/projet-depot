<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\DepotProduct;
use App\Models\Entrie;
use App\Models\Product;
use App\Models\Sortie;
use Illuminate\Http\Request;

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
        $all = DepotProduct::all();
        $all = Deposit
        return $all->product->name;
    }

    public function exits()
    {
        $all = Sortie::OrderBy('created_at', 'desc')->get();

        return view('app.main.exits')
                ->with('exits', $all);
    }
}
