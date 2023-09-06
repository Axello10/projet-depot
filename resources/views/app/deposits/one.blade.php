@extends('app')
@section('page', $deposit->name)
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    @if(Auth::user()->role_id == 1)
                    <a href="{{ route('deposits.create') }}" class="mb-1 btn btn-sm btn-primary">ajouter depot</a>
                    @endif
                <h1 class="display-4"> Dépot </h1>
                </div>
                <div class="note note-primary  text-dark   mt-5 mb-3 shadow p-3 mb-5 brounded  ">
                <h2>Nom du dépot: {{ $deposit->name }} </h2>
                <strong>Type du dépot : {{ $deposit->grade }}</strong>
                @if (Auth::user()->deposit_id === $deposit->id)
                @if(Auth::user()->role_id < 3)
            <a href="{{ route('deposits.edit', $deposit->id) }}"  class="mb-1 btn btn-sm btn-primary " >Modifier ce dépot</a>
            @endif
             @endif
            <ul>
            @if(count($products) <= 0)
                <br>
                <p>Pas de produits disponible dans son stock!</p>
            @else
                @foreach ($products as $product)
                <br>
                    <div class="note note-info">        
                            <p><strong>{{ $product->name }}</strong></p>
                            <p>la quantité disponible :</p>
                            <p>
                                @foreach ($deproducts as $dp)
                                    @if ($dp->product_id === $product->id)
                                        {{ $dp->quantity }}
                                        {{-- @if (Auth::user()->deposit_id === $deposit->id)
                                        <br>
                                            <a  class="mb-1 btn btn-sm btn-primary "  href="{{ route('depotproducts.edit', $dp->id) }}">Modifier le produit dans le stock</a>
                                        @endif --}}
                                    @endif
                                @endforeach
                            </p>
                        </div>
                @endforeach
            @endif
        </ul>
@endsection
