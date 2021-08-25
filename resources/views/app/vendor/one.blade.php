@extends('app')
@section('page', $vendor->name)
@section('content')

        @foreach ($vendors as $vd)
            <h2> nom du vendeur : {{ $vd->name }} </h2>
            <p> adress : {{ $vd->adress }} </p>
        @endforeach
    
@endsection