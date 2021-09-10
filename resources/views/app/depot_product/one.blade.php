@extends('app')
@section('page', $product->product_id)
@section('content')

        <h2> nom du produit : {{ $product->product_id }} </h2>
    
@endsection