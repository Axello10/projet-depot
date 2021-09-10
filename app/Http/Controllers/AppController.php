<?php

namespace App\Http\Controllers;

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
}
