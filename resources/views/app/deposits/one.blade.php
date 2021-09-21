@extends('app')
@section('page', $deposit->name)
@section('content')

        <h2> nom du depot : {{ $deposit->name }} </h2>
        <a href="{{ route('depotproducts.create') }}">ajouter un produit dans le stock</a>
        <ul>
            @if(count($deposit->products) <= 0)
                <p>pas de produits dans le stock!</p>
            @else
                @foreach ($deposit->products as $pd)
                    {{ $pd->name }}<a href="{{ route('depotproducts.edit', $pd->id) }}">modifier le produit dans le stock</a>
                    @if($pd->quantity <= 0)
                        non disponible (0)
                    @endif
                @endforeach
            @endif
        </ul>
@endsection