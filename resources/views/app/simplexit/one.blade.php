@extends('app')
@section('page', "sortie")
@section('content')

        <h2> nom du produit : {{ $sortie->product->name }} | </h2>
        <p>nom du client : {{ $sortie->client->name }} | </p>
        <p>nom du depot : {{ $sortie->deposit->name }}</p>
        <p>prix : {{ $sortie->price }}</p>
@endsection