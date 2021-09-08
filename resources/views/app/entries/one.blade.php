@extends('app')
@section('page', "entree")
@section('content')

        <h2> nom du produit : {{ $entrie->product->name }} </h2>
        <p>nom du fournisseur : {{ $entrie->vendor->name }} |</p>
        <p> fait par : {{ $entrie->user->fullname }} |</p>
        <p> nom du depot : {{ $entrie->deposit->name }} |</p>    
        <p>prix : {{ $entrie->price }}</p>
@endsection