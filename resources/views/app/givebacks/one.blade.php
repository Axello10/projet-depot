@extends('app')
@section('page', 'dette de vides')
@section('content')

        <h2> nom du vendeur : {{ $giveback->vendor->name }} </h2>
        <div>
                <p>nom du produit : {{ $giveback->product->name }}</p>
                <p>quantité : {{ $giveback->quantity }}</p>
                <p>nom du depot : {{ $giveback->deposit->name }}</p>
        </div>
    
@endsection