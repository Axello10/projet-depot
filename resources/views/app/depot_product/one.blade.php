@extends('app')
@section('page', $grade->name)
@section('content')

        <h2> nom de la grade : {{ $grade->name }} </h2>
    
@endsection