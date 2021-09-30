@extends('app')
@section('page', "simple sortie")
@section('content')

        <h2> nom du produit : {{ $product->name }} | </h2>
        <p>nom du depot : {{ $deposit->name }}</p>
        <p>prix : {{ $simplexit->price }}</p>

@endsection