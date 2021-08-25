@extends('app')
@section('page', 'vendeurs')
@section('content')

    @if ( count($vendors) <= 0)
        <p>aucun vendeur trouvé</p>
    @else
    <ul>
        @foreach ($vendors as $vd)
         <strong>nom: <li>$vd->name</li></strong>
         <strong>adress: <li>$vd->adress</li></strong>
        @endforeach
    </ul>
    @endif
    
@endsection