@extends('app')
@section('page', $deposit->name)
@section('content')

        <h2> nom de la grade : {{ $deposit->name }} </h2>
        <strong>type du depot : {{ $deposit->grade->name }}</strong>
    
@endsection