@extends('app')
@section('page', 'dashboard')
@section('content')

    @can('update', Auth::user())
        <p>oui tu peux mettre a jour les utilisateur</p>
    @else
        <p>j'ai tout faux!</p>
    @endcan

@endsection