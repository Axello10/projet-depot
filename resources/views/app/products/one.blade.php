@extends('app')
@section('page', $product->name)
@section('content')

        <h2> nom du produit : {{ $product->name }} </h2>
        <p>prix d'achat : {{ $product->price_in }}</p>
        <p>prix de sortie : {{ $product->price_out }}</p>
        <p>ajouté par : {{ $product->user->fullname }}</p>
@endsection