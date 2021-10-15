@extends('app')
@section('page', 'produits par depot')
@section('content')
    
    @foreach ($all as $all)
        @foreach ($all->products as $ap)
            {{ $ap->name }}
        @endforeach        
    @endforeach

@endsection