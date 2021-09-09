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
        $products = Product::OrderBy('created_at', 'desc')->get();

        $entries = Entrie::all()->product;

        // $total_products = [];
        // foreach($products as $pd) {
        //     $total_products[$pd->id] = Entrie::where('product_id', $pd->id)->get();
        // }
        
        // foreach ($total_products as $tp) {
        //     for ($i = 0; $i < sizeof($tp); $i++) {
        //         $data[$tp[$i]->id] = [
        //             "quantité" => $tp[$i]->quantity,
        //             "product_name" => Product::where('id', $tp[$i]->product_id)->get()
        //         ];
        //     }
        // }

        // return $data;
        // return $fn;
        // return [$data, $total_products];
        // return [$products, $total_products];
    }
}
