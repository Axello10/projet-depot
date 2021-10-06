@extends('app')
@section('page', $client->name)
@section('content')

        <h2> nom du client : {{ $client->name }} </h2>
        <p>adresse : {{ $client->adress }} </p>
        <p>numero du client : {{ $client->mobile_number }}</p>
        
@endsection