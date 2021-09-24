@extends('app')
@section('page', $deproduct->product_id)
@section('content')

        <h2> nom du produit : {{ $deproduct->product_id }} </h2>
        <p> quantité : {{ $deproduct->quantity }} </p>
        <p> nom de l'utilisateur : {{ $deproduct->user_id }} </p>
        <p> nom du depot : {{ $deproduct->deposit_id }} </p>
    
@endsection