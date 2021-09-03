@extends('app')
@section('page', 'vides')
@section('content')

        <h2> nom du client : {{ $empty->client->name }} </h2>
        <p>nom du depot : {{ $empty->deposit_id }}</p>
        <p>nom du produit : {{ $empty->product->name }} || prix du produit : {{ $empty->product->price }}</p>
        <p>quantité : {{ $empty->quantity }}</p>
        <p>nom du depot : {{ $empty->deposit->name }}</p>
    
@endsection