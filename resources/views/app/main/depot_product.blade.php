@extends('app')
@section('page', 'produits par depot')
@section('content')
    
    @foreach ($all as $all)
        {{ $all::find(4) }}        
    @endforeach


@endsection