@extends('app')
@section('page', 'dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-9 px-md-3">
        </div>
        @if (auth()->user()->role->id == 1)
            <form class="row g-6" action="{{ route('users.update', auth()->user()->id) }}" method="POST">
                @csrf
                @method('put')
                <input type="hidden" name="username" value="{{ auth()->user()->username }}">
                <input type="hidden" name="fullname" value="{{ auth()->user()->fullname }}">
                <input type="hidden" name="deposit_id" value="{{ auth()->user()->deposit->id }}">
                <div class="col-md-6 ">
                    <label class="form-label" for="fullname">Nom du dépot</label>
                    <select name="deposit_id" id="" class="form-select" aria-label="Default select example">
                        @foreach ($deposits as $dp)
                            <option value="{{ $dp->id }}"
                                {{ $dp->id === auth()->user()->deposit_id ? 'selected' : '' }}>
                                {{ $dp->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">changer depot</button>
                </div>
            </form>
        @endif
        <div class="card-body">
            <h1 class="card-title mb-3 ">
                <p class="time" style="display: inline"></p>cher {{ Auth::user()->username }} -
                {{ auth()->user()->deposit->name }}
            </h1>
        </div>
        </div>
        @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
            <div class="card mb-3 shadow p-3 brounded">
                <div class="card-body">
                    @if(Auth::user()->role_id === 1)
                    <div class="">
                        <a href="{{ route('entries') }}" class="btn btn-primary mb-3">Entree</a>
                        <a href="{{ route('exits') }}" class="btn btn-primary mb-3" type="button">Sortie</a>
                        <a href="{{ route('products.index') }}" class="btn btn-primary mb-3" type="button">Tout les
                            produit</a>

                        <a href="{{ route('deposits.show', Auth::user()->deposit_id) }}" class="btn btn-primary mb-3"
                            type="button">Produit dans le stock</a>

                        <a href="{{ route('depotproducts.index') }}" class="btn btn-primary mb-3" type="button">entree
                            venant de nos depots</a>
                    </div>
                    @endif

                    {{-- <canvas id="myChart" width="400" height="200"></canvas> --}}

                    {{-- days card for the current day! --}}

                    <div class="card row-md-12 main-card">
                        <h2>Depense</h2>
                        <div class="cards-box">
                            <div class="cards">
                                <h5>Dans les entrées</h5>
                                <p>aujourd'hui : {{ $entries['today'] }} Fbu</p>
                                <p>cette semaine : {{ $entries['this_week'] }} Fbu</p>
                                <p>ce mois : {{ $entries['this_month'] }} Fbu</p>
                                <p>cette année : {{ $entries['this_year'] }} Fbu</p>
                            </div>
                            <div class="cards">
                                <h5>Dans les cas rares</h5>
                                <p>aujourd'hui : {{ $rarecases['today'] }} Fbu</p>
                                <p>cette semaine : {{ $rarecases['this_week'] }} Fbu</p>
                                <p>ce mois : {{ $rarecases['this_month'] }} Fbu</p>
                                <p>cette année : {{ $rarecases['this_year'] }} Fbu</p>
                            </div>
                        </div>
                        <h2>Revenue</h2>
                        <div class="cards-box">
                            <div class="cards">
                                <h5>Dans les sorties pour client particulier</h5>
                                <p>aujourd'hui : {{ $sorties['today'] }} Fbu</p>
                                <p>cette semaine : {{ $sorties['this_week'] }} Fbu</p>
                                <p>ce mois : {{ $sorties['this_month'] }} Fbu</p>
                                <p>cette année : {{ $sorties['this_year'] }} Fbu</p>
                            </div>
                            <div class="cards">
                                <h5>Dans les sorties pour client simple</h5>
                                <p>aujourd'hui : {{ $simplexits['today'] }} Fbu</p>
                                <p>cette semaine : {{ $simplexits['this_week'] }} Fbu</p>
                                <p>ce mois : {{ $simplexits['this_month'] }} Fbu</p>
                                <p>cette année : {{ $simplexits['this_year'] }} Fbu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>

@endsection
