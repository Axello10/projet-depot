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
        function loop($arr) {
            $data = 0;
            foreach($arr as $ar) {
                $data += $ar->price;
            }
            return $data;
        }
        
        // entrees
        // aujourd'hui
        $today_entrie = Entrie::whereDate('created_at', Carbon::today())->get();
        // cette semaine
        $current_week = Entrie::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        // cette annee
        $current_year = Entrie::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
        // ce mois
        $current_month = Entrie::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get();

        $today_entries = loop($today_entrie);
        $week_entries = loop($current_week);
        $month_entries = loop($current_month);
        $year_entries = loop($current_year);

        // cas rare
        // aujourd'hui
        $today_rarecase = RareCase::whereDate('created_at', Carbon::today())->get();
        // cette semaine
        $week_rarecase = RareCase::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        // cette annee
        $year_rarecase = RareCase::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
        // ce mois
        $month_rarecase = Entrie::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get();

        $today_rarecase = loop($today_rarecase);
        $week_rarecase = loop($week_rarecase);
        $month_rarecase = loop($month_rarecase);
        $year_rarecase = loop($year_rarecase);

        // sorties client particulier
        // aujourd'hui
        $today_sorties = Sortie::where('payer', 'oui')->whereDate('created_at', Carbon::today())->get();
        // cette semaine
        $week_sorties = Sortie::where('payer', 'oui')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        // cette annee
        $year_sorties = Sortie::where('payer', 'oui')->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
        // ce mois
        $month_sorties = Sortie::where('payer', 'oui')->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get();

        $today_sorties = loop($today_sorties);
        $week_sorties = loop($week_sorties);
        $month_sorties = loop($month_sorties);
        $year_sorties = loop($year_sorties);

        // sorties simple
        // aujourd'hui
        $today_simpexits = SimpleExit::whereDate('created_at', Carbon::today())->get();
        // cette semaine
        $week_simpexits = SimpleExit::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        // cette annee
        $year_simpexits = SimpleExit::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
        // ce mois
        $month_simpexits = SimpleExit::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get();

        $today_simpexits = loop($today_simpexits);
        $week_simpexits = loop($week_simpexits);
        $month_simpexits = loop($month_simpexits);
        $year_simpexits = loop($year_simpexits);

        $entries = ['today' => $today_entries, 'this_week' => $week_entries, 'this_month' => $month_entries, 'this_year' => $year_entries];
        $rarecases = ['today' => $today_rarecase, 'this_week' => $week_rarecase, 'this_month' => $month_rarecase, 'this_year' => $year_rarecase];
        $sorties = ['today' => $today_sorties, 'this_week' => $week_sorties, 'this_month' => $month_sorties, 'this_year' => $year_sorties];
        $simplexits = ['today' => $today_simpexits, 'this_week' => $week_simpexits, 'this_month' => $month_simpexits, 'this_year' => $year_simpexits];
        
        return view('app.dashboard')
                ->with('entries', $entries)
                ->with('rarecases', $rarecases)
                ->with('sorties', $sorties)
                ->with('simplexits', $simplexits);
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
