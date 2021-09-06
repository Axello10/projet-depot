<?php

namespace App\Http\Controllers;

use App\Models\Entrie;
use App\Models\Sortie;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $entries = Entrie::all();
        $sorties = Sortie::all();
        // $vendors = [];
        // $deposits = [];
        // $users = [];
        // $products = [];

        // return [
        //     ['les entrees', $entries],
        //     ['les sorties', $sorties]
        // ];
        
        for ($i = 1; $i < 10; $i++) {
            $vendors[$i] = Entrie::find($i)->vendor;
            $deposits[$i] = Entrie::find($i)->deposit;
            $users[$i] = Entrie::find($i)->user;
            $products[$i] = Entrie::find($i)->product;
        }
        return [
            ['les vendeurs....', $vendors],
            ['les depots....', $deposits],
            ['les utilisateurs....', $users],
            ['les produits....', $products]
        ];
    }
}
