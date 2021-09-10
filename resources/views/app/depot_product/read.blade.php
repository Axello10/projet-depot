@extends('app')
@section('page', 'Nouveau produit relie au depot')
@section('content')

    @if ( count($depotproducts) <= 0)
        <p>aucun produit trouvé</p>
    @else
    <h2>liste de tout les produit</h2>
    <ul>
        @foreach ($depotproducts as $gd)
            <div style="margin: 20px 0px">
                <li> <strong> nom du produit </strong> : {{ $gd->product_id }} </li>
                <div>
                    <a href="{{ route('grades.show', $gd->id) }}">plus de details</a>

                    <a href="{{ route('grades.edit', $gd->id) }}">modifier</a>

                    <a href="{{ route('grades.destroy', $gd->id) }}">supprimer</a>
                </div>
                
            </div>
        @endforeach
    </ul>
    @endif
    
@endsection