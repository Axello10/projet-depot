@extends('app')
@section('page', 'vendeurs')
@section('content')

    @if ( count($vendors) <= 0)
        <p>aucun vendeur trouvé</p>
    @else
    <ul>
        @foreach ($vendors as $vd)
            <li> <strong> nom du vendeur </strong> : {{ $vd->name }} </li>
            <li> <strong> adress </strong> : {{ $vd->adress }} </li>
            <br>
        @endforeach
    </ul>
    @endif
    
@endsection