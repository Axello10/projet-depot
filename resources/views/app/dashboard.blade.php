@extends('app')
@section('page', 'dashboard')
@section('content')

    <div class="dashboard-links">
        bienvenue, vous travaillez en tant que <em><strong>{{ Auth::user()->username }}</strong></em>
        <ul>
            <li>role => {{ Auth::user()->role->name }}</li>
            <li>
                <h3>tes permissions</h3>
                <ul>
                    @can('viewAny', Auth::user())
                        - voir tous les users
                    @endcan
                    
                    @can('create', Auth::user())
                        - creer des users
                    @endcan

                    @can('view', Auth::user())
                        - voir un  users
                    @endcan

                    @can('update', Auth::user())
                        - mettre a jour des users
                    @endcan

                    @can('delete', Auth::user())
                        - supprimer des users
                    @endcan

                    @can('restore', Auth::user())
                        - restaurer des users
                    @endcan

                    @can('forceDelete', Auth::user())
                        - supprimer definitivement des users
                    @endcan





                    
                </ul>
            </li>
        </ul>
        <ul>
            <li><a href="">nouveau entreer</a></li>
            <li><a href="">sorties</a></li>
            <li><a href="">stock</a></li>
        </ul>
    </div>

@endsection