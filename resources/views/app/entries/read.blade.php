@extends('app')
@section('page', 'depots')
@section('content')

    @if ( count($entries) <= 0)
        <p>aucun depot trouvé</p>
    @else
    <h2>liste de depots</h2>
    <ul>
        @foreach ($entries as $et)
            <div style="margin: 20px 0px">
                <li> <strong> nom du depot </strong> : {{ $et->vendor_id }} </li>
                <div>
                    <a href="{{ route('entries.show', $et->id) }}">plus de details</a>

                    <a href="{{ route('entries.edit', $et->id) }}">modifier</a>

                    <a href="{{ route('entries.destroy', $et->id) }}">supprimer</a>
                </div>
                
            </div>
        @endforeach
    </ul>
    @endif
    
@endsection