@extends('app')
@section('page', 'dette de vides')
@section('content')

    @if ( count($givebacks) <= 0)
        <p>aucun dette de vide trouvé</p>
    @else
    <h2>liste de dette de vides</h2>
    <ul>
        @foreach ($givebacks as $gv)
            <div style="margin: 20px 0px">
                <li> <strong> nom du vendeur </strong> : {{ $gv->vendor_id }} </li>
                <div>
                    <a href="{{ route('givebacks.show', $gv->id) }}">plus de details</a>

                    <a href="{{ route('givebacks.edit', $gv->id) }}">modifier</a>

                    <a href="{{ route('givebacks.destroy', $gv->id) }}">supprimer</a>
                </div>
                
            </div>
        @endforeach
    </ul>
    @endif
    
@endsection