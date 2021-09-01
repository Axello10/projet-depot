@extends('app')
@section('page', "user")
@section('content')

        <h2> nom de l'utilisateur : {{ $user->fullname }} </h2>
        <p>role : {{ $user->role->name }}</p>
    
@endsection