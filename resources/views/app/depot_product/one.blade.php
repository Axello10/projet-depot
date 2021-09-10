@extends('app')
@section('page', $depotproducts->product_id)
@section('content')

        <h2> nom du produit : {{ $depotproducts->product_id }} </h2>
    
@endsection