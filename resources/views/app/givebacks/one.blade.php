@extends('app')
@section('page', 'dette de vides')
@section('content')

        <h2> nom du vendeur : {{ $giveback->vendor_id }} </h2>
        <p>{{ $giveback->product_id }} | {{ $giveback->quantity }}</p>
    
@endsection