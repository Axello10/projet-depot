@extends('app')
@section('page', 'produits')
@section('content')

    @if ( count($products) <= 0)
        <p>aucun produit trouvé</p>
    @else
    <h2>liste de produits</h2>
    <ul>
        @foreach ($products as $pd)
            <div style="margin: 20px 0px">
                <li> <strong> nom du produit </strong> : {{ $pd->name }} </li>
                <div>
                    <a href="{{ route('products.show', $pd->id) }}">plus de details</a>

                    <a href="{{ route('products.edit', $pd->id) }}">modifier</a>

                    <a href="{{ route('products.destroy', $pd->id) }}">supprimer</a>
                </div>
                
            </div>
        @endforeach
    </ul>
    @endif
    
@endsection