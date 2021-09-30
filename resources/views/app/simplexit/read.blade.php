@extends('app')
@section('page', 'sortie')
@section('content')

    @if ( count($sorties) <= 0)
        <p>aucun sortie trouvé</p>
    @else
    <h2>liste de sortie</h2>
    <ul>
        @foreach ($sorties as $st)
            <div style="margin: 20px 0px">
                <li> <strong> nom du produit </strong> : {{ $st->product_id }} </li>
                <div>
                    <a href="{{ route('sorties.show', $st->id) }}">plus de details</a>

                    <a href="{{ route('sorties.edit', $st->id) }}">modifier</a>

                    <a href="{{ route('sorties.destroy', $st->id) }}">supprimer</a>

                    <form action="{{ route('sorties.destroy', $st->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="supprimer">
                    </form>

                </div>
                
            </div>
        @endforeach
    </ul>
    @endif
    
@endsection