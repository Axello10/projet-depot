@extends('app')
@section('page', 'dashboard')
@section('content')

    <div class="dashboard-links">
        bienvenue, vous travaillez en tant que <em><strong>{{ Auth::user()->username }}</strong></em>
        <ul>
            <li>role => {{ Auth::user()->role->name }}</li>
        </ul>
        <ul>
            <li><a href="">nouveau entreer</a></li>
            <li><a href="">sorties</a></li>
            <li><a href="">stock</a></li>
        </ul>
    </div>

@endsection