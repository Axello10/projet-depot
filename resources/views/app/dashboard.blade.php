@extends('app')
@section('page', 'dashboard')
@section('content')

    bienvenue, vous travaillez en tant que <em><strong>{{ Auth::user()->username }}</strong></em>
    <ul>
        <li>role => {{ Auth::user()->role->name }}</li>
    </ul>

    @if(Auth::user()->role_id === 1)
        <p>ooh tu peux mettre a jour un user!</p>
    @else
        <p>tu n'a aucun pouvoir :(</p>
    @endif
    
@endsection