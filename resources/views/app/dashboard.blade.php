@extends('app')
@section('page', 'dashboard')
@section('content')

    you're logged in! as {{ Auth::user()->username }}
    @can('update', User::class)
        <p>ooh tu peux mettre a jour un user!</p>
    @else
        <p>non bro tu peux rien</p>
    @endcan
    
@endsection