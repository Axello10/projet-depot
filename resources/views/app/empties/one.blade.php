@extends('app')
@section('page', 'vides')
@section('content')

        <h2> nom du client : {{ $client->name }} </h2>
        <p>nom du depot : {{ $empty->deposit_id }}</p>
    
@endsection