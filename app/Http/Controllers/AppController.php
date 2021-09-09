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
        $entries = Entrie::all();
        
        foreach ($entries as $et) {
            $products[] = $et->product;
        }

        return view('app.main.products')
                ->with('data', $products);
    }
}
