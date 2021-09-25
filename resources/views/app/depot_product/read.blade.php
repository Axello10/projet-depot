@extends('app')
@section('page', 'Nouveau produit relie au depot')
@section('content')

    @if ( count($depotproducts) <= 0)
        <p>aucun produit trouvé</p>
    @else
    <h2>liste de tout les produit reliés aux depots</h2>
    {{ $depotproducts }}
    <ul>
        @foreach ($depotproducts as $gd)
            <div style="margin: 20px 0px">
                <li> <strong> nom du produit </strong> : {{ $gd->product_id }} </li>
                <div>
                    <a href="{{ route('depotproducts.show', $gd->id) }}">plus de details</a>

                    <a href="{{ route('depotproducts.edit', $gd->product_id) }}">modifier</a>

                    <form action="{{ route('depotproducts.destroy', $gd->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit">supprimer</button>
                    </form>
                    
                </div>
            </div>
        @endforeach
    </ul>
    @endif
    
@endsection