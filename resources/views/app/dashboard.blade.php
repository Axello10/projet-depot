@extends('app')
@section('page', 'dashboard')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-3">
</div>
  <div class="card-body">
    <h1 class="card-title mb-3 "><p class="time" style="display: inline"></p>cher {{ Auth::user()->username }}</h1>
  </div>
</div>
@if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2 )
    
    <div class="card mb-3 shadow p-3 mb-5 brounded">
    <div class="card-body">
        <div class="">
        <a href="{{ route('entries') }}" class="btn btn-primary mb-3">Entree</a>
        <a href="{{ route('exits') }}" class="btn btn-primary mb-3" type="button">Sortie</a>
        <a href="{{ route('products.index') }}" class="btn btn-primary mb-3" type="button">Tout les produit</a>

        <a href="{{ route('deposits.index') }}"class="btn btn-primary mb-3" type="button">Produit par depot</a>
        
        <a href="{{ route('deposits.show', Auth::user()->deposit_id) }}" class="btn btn-primary mb-3" type="button">Produit dans le stock</a>
        
        <a href="{{ route('depotproducts.index') }}" class="btn btn-primary mb-3" type="button" >entree venant de nos depots</a>
        </div>

        {{-- <canvas id="myChart" width="400" height="200"></canvas> --}}

        {{-- days card for the current day! --}}

        <div class="card row-md-12">
            <h2>Depense</h2>
            <div class="">
                <h5>Dans les entrées</h5>
                <p>aujourd'hui : {{ $entries['today'] }} Fbu</p>
                <p>cette semaine : {{ $entries['this_week'] }} Fbu</p>
                <p>ce mois : {{ $entries['this_month'] }} Fbu</p>
                <p>cette année : {{ $entries['this_year'] }} Fbu</p>
            </div>
            <div class="">
                <h5>Dans les cas rares</h5>
                <p>aujourd'hui : {{ $rarecases['today'] }} Fbu</p>
                <p>cette semaine : {{ $rarecases['this_week'] }} Fbu</p>
                <p>ce mois : {{ $rarecases['this_month'] }} Fbu</p>
                <p>cette année : {{ $rarecases['this_year'] }} Fbu</p>
            </div>
            <h2>Revenue</h2>
            <div class="">
                <h5>Dans les sorties pour client particulier</h5>
                <p>aujourd'hui : {{ $sorties['today'] }} Fbu</p>
                <p>cette semaine : {{ $sorties['this_week'] }} Fbu</p>
                <p>ce mois : {{ $sorties['this_month'] }} Fbu</p>
                <p>cette année : {{ $sorties['this_year'] }} Fbu</p>
            </div>
            <div class="">
                <h5>Dans les sorties pour client simple</h5>
                <p>aujourd'hui : {{ $simplexits['today'] }} Fbu</p>
                <p>cette semaine : {{ $simplexits['this_week'] }} Fbu</p>
                <p>ce mois : {{ $simplexits['this_month'] }} Fbu</p>
                <p>cette année : {{ $simplexits['this_year'] }} Fbu</p>
            </div>
        </div>
    </div>
    </div>
@endif
</main>

@endsection