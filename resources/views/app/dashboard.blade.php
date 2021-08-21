@extends('app')
@section('page', 'dashboard')
@section('content')

    <div class="dashboard-links">
        bienvenue, vous travaillez en tant que <em><strong>{{ Auth::user()->username }}</strong></em>
        <ul>
            <li>role => {{ Auth::user()->role->name }}</li>
        </ul>
        <ul>
            <li>
                <h2>utilisateur</h2>
                <ul>
                    @can('create', Auth::user())
                        <li><a href="{{ route('users.create') }}">ajouter un utilisateur</a></li>
                    @else
                        <p>t'es pas autorisé!</p>
                    @endcan
                </ul>
            </li>
            <li>
                <h2>entrees</h2>
                <ul>
                    <li><a href="{{ route('entries.create') }}">ajouter une entrees</a></li>
                </ul>
            </li>
        </ul>
    </div>

@endsection