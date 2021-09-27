@extends('app')
@section('page', $deposit->name)
@section('content')

        <h2> nom du depot : {{ $deposit->name }} </h2>
        @if (Auth::user()->deposit_id === $deposit->id)
            <a href="{{ route('depotproducts.create') }}">ajouter un produit dans le stock</a>            
        @endif
        <ul>
            @if(count($deposit->products) <= 0)
                <p>pas de produits dans le stock!</p>
            @else
                @foreach ($deposit->products as $pd)
                
                    <div class="">
                        <p><strong>{{ $pd->name }}</strong> {{ ($pd->quantity <= 0) ? "non disponible (0)" : $pd->quantity }}</p>
                        @if (Auth::user()->deposit_id === $deposit->id)
                            <a href="{{ route('depotproducts.edit', $pd->id) }}">modifier le produit dans le stock</a>
                        @endif
                    </div>
                    
                @endforeach
            @endif
        </ul>
@endsection