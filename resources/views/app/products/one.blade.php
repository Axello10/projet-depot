@extends('app')
@section('page', $product->name)
@section('content')

        <h2> nom du produit : {{ $product->name }} </h2>
    
@endsection