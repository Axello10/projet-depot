@extends('app')
@section('page', 'dashboard')
@section('content')

    you're logged in! as {{ Auth::user()->username }}
    <ul>
        <li>role => {{ Auth::user()->role->name }}</li>
    </ul>

    @if(Auth::user()->role_id === 1)
        <p>ooh tu peux mettre a jour un user!</p>
    @else
        <p>tu n'a aucun pouvoir :(</p>
    @endif
    
@endsection