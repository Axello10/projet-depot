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
    
    /**
     * 
     * @param $arr array to loop on
     * @return Array 
     * 
     * */
    public function loop($arr) {
        $data = 0;
        foreach($arr as $ar) {
            $data += $ar->price;
        }
        return $data;
    }

    public function data() {
        

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

        $today_entries = $this->loop($today_entrie);
        $week_entries = $this->loop($current_week);
        $month_entries = $this->loop($current_month);
        $year_entries = $this->loop($current_year);

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

        $today_rarecase = $this->loop($today_rarecase);
        $week_rarecase = $this->loop($week_rarecase);
        $month_rarecase = $this->loop($month_rarecase);
        $year_rarecase = $this->loop($year_rarecase);

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

        $today_sorties = $this->loop($today_sorties);
        $week_sorties = $this->loop($week_sorties);
        $month_sorties = $this->loop($month_sorties);
        $year_sorties = $this->loop($year_sorties);

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

        $today_simpexits = $this->loop($today_simpexits);
        $week_simpexits = $this->loop($week_simpexits);
        $month_simpexits = $this->loop($month_simpexits);
        $year_simpexits = $this->loop($year_simpexits);

        $entries = ['today' => $today_entries, 'this_week' => $week_entries, 'this_month' => $month_entries, 'this_year' => $year_entries];
        $rarecases = ['today' => $today_rarecase, 'this_week' => $week_rarecase, 'this_month' => $month_rarecase, 'this_year' => $year_rarecase];
        $sorties = ['today' => $today_sorties, 'this_week' => $week_sorties, 'this_month' => $month_sorties, 'this_year' => $year_sorties];
        $simplexits = ['today' => $today_simpexits, 'this_week' => $week_simpexits, 'this_month' => $month_simpexits, 'this_year' => $year_simpexits];
        
        return ['entries' => $entries, 'rarecases', $rarecases, 'sorties' => $sorties, 'simplexits' => $simplexits];

    }


    public function dashboard()
    {
        if(auth()->user()->role->id == 1) {

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
    
            $today_entries = $this->loop($today_entrie);
            $week_entries = $this->loop($current_week);
            $month_entries = $this->loop($current_month);
            $year_entries = $this->loop($current_year);
    
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
    
            $today_rarecase = $this->loop($today_rarecase);
            $week_rarecase = $this->loop($week_rarecase);
            $month_rarecase = $this->loop($month_rarecase);
            $year_rarecase = $this->loop($year_rarecase);
    
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
    
            $today_sorties = $this->loop($today_sorties);
            $week_sorties = $this->loop($week_sorties);
            $month_sorties = $this->loop($month_sorties);
            $year_sorties = $this->loop($year_sorties);
    
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
    
            $today_simpexits = $this->loop($today_simpexits);
            $week_simpexits = $this->loop($week_simpexits);
            $month_simpexits = $this->loop($month_simpexits);
            $year_simpexits = $this->loop($year_simpexits);
    
            $entries = ['today' => $today_entries, 'this_week' => $week_entries, 'this_month' => $month_entries, 'this_year' => $year_entries];
            $rarecases = ['today' => $today_rarecase, 'this_week' => $week_rarecase, 'this_month' => $month_rarecase, 'this_year' => $year_rarecase];
            $sorties = ['today' => $today_sorties, 'this_week' => $week_sorties, 'this_month' => $month_sorties, 'this_year' => $year_sorties];
            $simplexits = ['today' => $today_simpexits, 'this_week' => $week_simpexits, 'this_month' => $month_simpexits, 'this_year' => $year_simpexits];
            
            return view('app.dashboard')
                    ->with('entries', $entries)
                    ->with('rarecases', $rarecases)
                    ->with('sorties', $sorties)
                    ->with('simplexits', $simplexits);
        } else {
            // entrees
            // aujourd'hui
            $today_entrie = Entrie::where('deposit_id', auth()->user()->deposit->id)->whereDate('created_at', Carbon::today())->get();
            // cette semaine
            $current_week = Entrie::where('deposit_id', auth()->user()->deposit->id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            // cette annee
            $current_year = Entrie::where('deposit_id', auth()->user()->deposit->id)->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
            // ce mois
            $current_month = Entrie::where('deposit_id', auth()->user()->deposit->id)->whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->get();
    
            $today_entries = $this->loop($today_entrie);
            $week_entries = $this->loop($current_week);
            $month_entries = $this->loop($current_month);
            $year_entries = $this->loop($current_year);
    
            // cas rare
            // aujourd'hui
            $today_rarecase = RareCase::where('deposit_id', auth()->user()->deposit->id)->whereDate('created_at', Carbon::today())->get();
            // cette semaine
            $week_rarecase = RareCase::where('deposit_id', auth()->user()->deposit->id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            // cette annee
            $year_rarecase = RareCase::where('deposit_id', auth()->user()->deposit->id)->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
            // ce mois
            $month_rarecase = Entrie::where('deposit_id', auth()->user()->deposit->id)->whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->get();
    
            $today_rarecase = $this->loop($today_rarecase);
            $week_rarecase = $this->loop($week_rarecase);
            $month_rarecase = $this->loop($month_rarecase);
            $year_rarecase = $this->loop($year_rarecase);
    
            // sorties client particulier
            // aujourd'hui
            $today_sorties = Sortie::where('deposit_id', auth()->user()->deposit->id)->where('payer', 'oui')->whereDate('created_at', Carbon::today())->get();
            // cette semaine
            $week_sorties = Sortie::where('deposit_id', auth()->user()->deposit->id)->where('payer', 'oui')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            // cette annee
            $year_sorties = Sortie::where('deposit_id', auth()->user()->deposit->id)->where('payer', 'oui')->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
            // ce mois
            $month_sorties = Sortie::where('deposit_id', auth()->user()->deposit->id)->where('payer', 'oui')->whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->get();
    
            $today_sorties = $this->loop($today_sorties);
            $week_sorties = $this->loop($week_sorties);
            $month_sorties = $this->loop($month_sorties);
            $year_sorties = $this->loop($year_sorties);
    
            // sorties simple
            // aujourd'hui
            $today_simpexits = SimpleExit::where('deposit_id', auth()->user()->deposit->id)->whereDate('created_at', Carbon::today())->get();
            // cette semaine
            $week_simpexits = SimpleExit::where('deposit_id', auth()->user()->deposit->id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            // cette annee
            $year_simpexits = SimpleExit::where('deposit_id', auth()->user()->deposit->id)->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
            // ce mois
            $month_simpexits = SimpleExit::where('deposit_id', auth()->user()->deposit->id)->whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->get();
    
            $today_simpexits = $this->loop($today_simpexits);
            $week_simpexits = $this->loop($week_simpexits);
            $month_simpexits = $this->loop($month_simpexits);
            $year_simpexits = $this->loop($year_simpexits);
    
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
