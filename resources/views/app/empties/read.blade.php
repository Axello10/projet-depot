@extends('app')
@section('page', 'vides')
@section('content')

    @if ( count($empties) <= 0)
        <p>aucun vide trouvé</p>
    @else
    <h2>liste de vides</h2>
    <ul>
        @foreach ($empties as $pt)
            <div style="margin: 20px 0px">
                <li> <strong> nom du client </strong> : {{ $pt->client_id }} 
                <p></p>
                </li>
                <div>
                    <a href="{{ route('empties.show', $pt->id) }}">plus de details</a>

                    <a href="{{ route('empties.edit', $pt->id) }}">modifier</a>

                    <form action="{{ route('empties.destroy', $st->id) }}" method="POST">
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