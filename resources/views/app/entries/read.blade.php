@extends('app')
@section('page', 'entree')
@section('content')

    @if ( count($entries) <= 0)
        <p>aucun entree trouvé</p>
    @else
    <h2>liste de entree</h2>
    <ul>
        @foreach ($entries as $et)
            <div style="margin: 20px 0px">
                <li> <strong> nom du produit </strong> : {{ $et->product_id }} </li>
                <div>
                    <a href="{{ route('entries.show', $et->id) }}">plus de details</a>

                    <a href="{{ route('entries.edit', $et->id) }}">modifier</a>

                    <a href="{{ route('entries.destroy', $et->id) }}">supprimer</a>

                    <form action="{{ route('entries.destroy', $et->id) }}" method="POST">
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