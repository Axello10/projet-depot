@extends('app')
@section('page', 'vides')
@section('content')

        <h2> nom du client : {{ $empty->client_id }} </h2>
        <p>{{ $empty->product_id }} | {{ $empty->quantity }}</p>
    
@endsection