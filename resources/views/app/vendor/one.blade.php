@extends('app')
@section('page', $vendor->name)
@section('content')

        <h2> nom du vendeur : {{ $vendor->name }} </h2>
        <p> adress : {{ $vendor->adress }} </p>
    
@endsection