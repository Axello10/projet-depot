<?php

namespace App\Http\Controllers;


use App\Models\Entrie;
use App\Models\Product;
use App\Models\RareCase;
use App\Models\SimpleExit;
use App\Models\Sortie;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{

    public function dashboard()
    {
        // array of entries based on month and year
        $entrie_month_year = Entrie::all()->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('M-Y');
        });
        // cas rare
        $rarecase_month_year = RareCase::all()->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('M-Y');
        });
        // client particulier
        $client_sortie_month_year = Sortie::all()->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('M-Y');
        });
        // sortie simple
        $simplexit_month_year = SimpleExit::all()->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('M-Y');
        });
        // total des produit
        $product_month_year = Product::all()->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('M-Y');
        });
    
        // total du jour
        // total mensuel
        // total annuel


        /* 
        données du jour: entrees, sortie d'aujourd'hui
        */
        // aujourd'hui
        $today_entrie = Entrie::whereDate('created_at', Carbon::today())->get();
        // cette semaine
        $current_week = Entrie::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        // ce mois
        $current_month = Entrie::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get();
                    
        return view('app.dashboard');
    }

    public function entries()
    {
        if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2) {
            $entries = Entrie::OrderBy('created_at', 'desc')->get();
        } else if (Auth::user()->role_id === 3) {
            $entries = Entrie::where('id', Auth::user()->deposit_id)->OrderBy('created_at', 'desc')->get();
        }
        
        return view('app.main.entries')
        ->with('entries', $entries);
    }
    

    public function exits()
    {
        if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2) {
            $all = Sortie::OrderBy('created_at', 'desc')->get();
        } else if (Auth::user()->role_id === 3) {
            $all = Sortie::where('id', Auth::user()->deposit_id)->OrderBy('created_at', 'desc')->get();
        }

        return view('app.main.exits')
                ->with('exits', $all);
    }
}
