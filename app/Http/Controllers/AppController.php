<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\DepotEmptie;
use App\Models\Emptie;
use App\Models\Entrie;
use App\Models\Product;
use App\Models\Sortie;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{

    public function dashboard()
    {
        // // dettes payés
        // $empties_p = Emptie::where('deposit_id', Auth::user()->deposit_id)
        //         ->where('payer', 'oui')
        //         ->get();

        // // dettes non payes
        // $empties_np = Emptie::where('deposit_id', Auth::user()->deposit_id)
        //         ->where('payer', 'non')
        //         ->get();
        
        // // $nber_total_empties_p = 0;
        // // for ($i = 0; $i < count($empties_p); $i++) {
        // //     $nber_total_empties_p += $empties_p['quantity'];
        // // }

        // $nber_total_empties_np = 0;
        // if (sizeof($empties_np) <= 1 ) {
        //     foreach($empties_np as $enp) {
        //         $nber_total_empties_np += $enp->quantity;
        //     }
        // } else {
        //     foreach($empties_np as $enp) {
        //         for($i = 0; $i < count($enp); $i++) {
        //             $nber_total_empties_np += $enp[$i]['quantity'];
        //         }
        //     }
        // }
        

        // return [
        //     'dette de vides payés' => $empties_p,
        //     'dette de vides non payés' => $empties_np,
        //     // 'total payés' => $nber_total_empties_p,
        //     'total non payés' => $nber_total_empties_np
        // ];
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
