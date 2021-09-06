@extends('app')
@section('page', "entree")
@section('content')

        <h2> nom du produit : {{ $entrie->product_id }} </h2>
        <p>nom du fournisseur : {{ $entrie->vendor->name }}</p>
    
@endsection