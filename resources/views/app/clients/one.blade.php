@extends('app')
@section('page', $client->name)
@section('content')

        <h2> nom du client : {{ $client->name }} </h2>
        <p>{{ $client->adress }} | {{ $client->mobile_number }}</p>
    
@endsection