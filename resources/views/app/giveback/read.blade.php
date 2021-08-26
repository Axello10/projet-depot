@extends('app')
@section('page', 'dette de vides')
@section('content')

    @if ( count($empties) <= 0)
        <p>aucun dette de vide trouvé</p>
    @else
    <h2>liste de dette de vides</h2>
    <ul>
        @foreach ($givebacks as $gv)
            <div style="margin: 20px 0px">
                <li> <strong> nom du vendeur </strong> : {{ $gv->vendeur_id }} </li>
                <div>
                    <a href="{{ route('givebacks.show', $pt->id) }}">plus de details</a>

                    <a href="{{ route('givebacks.edit', $pt->id) }}">modifier</a>

                    <a href="{{ route('givebacks.destroy', $pt->id) }}">supprimer</a>
                </div>
                
            </div>
        @endforeach
    </ul>
    @endif
    
@endsection