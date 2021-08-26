@extends('app')
@section('page', 'depots')
@section('content')

    @if ( count($deposits) <= 0)
        <p>aucun depot trouvé</p>
    @else
    <h2>liste de depots</h2>
    <ul>
        @foreach ($depots as $dp)
            <div style="margin: 20px 0px">
                <li> <strong> nom du depot </strong> : {{ $dp->name }} </li>
                <div>
                    <a href="{{ route('deposits.show', $gd->id) }}">plus de details</a>

                    <a href="{{ route('deposits.edit', $gd->id) }}">modifier</a>

                    <a href="{{ route('deposits.destroy', $gd->id) }}">supprimer</a>
                </div>
                
            </div>
        @endforeach
    </ul>
    @endif
    
@endsection