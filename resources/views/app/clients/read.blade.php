@extends('app')
@section('page', 'clients')
@section('content')

    @if ( count($clients) <= 0)
        <p>aucun client trouvé</p>
    @else
    <h2>liste de clients</h2>
    <ul>
        {{ dd($clients->empties) }}
        @foreach ($clients as $cl)
            <div style="margin: 20px 0px">
                <li> <strong> nom du client </strong> : {{ $cl->name }} </li>
                <li></li>
                <div>
                    <a href="{{ route('clients.show', $cl->id) }}">plus de details</a>

                    <a href="{{ route('clients.edit', $cl->id) }}">modifier</a>

                    <a href="{{ route('clients.destroy', $cl->id) }}">supprimer</a>
                </div>
                
            </div>
        @endforeach
    </ul>
    @endif
    
@endsection