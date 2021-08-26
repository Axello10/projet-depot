@extends('app')
@section('page', 'dashboard')
@section('content')

    <div class="dashboard-links">
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
                <h2>vendeurs</h2>
                <ul>
                    <li><a href="{{ route('vendors.index') }}">voir les vendeurs</a></li>
                    <li><a href="{{ route('vendors.create') }}">ajouter un vendeur</a></li>
                </ul>
            </li>
            <li>
                <h2>clients</h2>
                <ul>
                    <li><a href="{{ route('clients.index') }}">voir les clients</a></li>
                    <li><a href="{{ route('clients.create') }}">ajouter un client</a></li>
                </ul>
            </li>
            
            <li>
                <h2>produits</h2>
                <ul>
                    <li><a href="{{ route('products.index') }}">voir les produits</a></li>
                    <li><a href="{{ route('products.create') }}">ajouter un produit</a></li>
                </ul>
            </li>
            <li>
                <h2>depots</h2>
                <ul>
                    <li><a href="{{ route('deposits.index') }}">voir les depots</a></li>
                    <li><a href="{{ route('deposits.create') }}">ajouter un depots</a></li>
                </ul>
            </li>
            <li>
                <h2>grades</h2>
                <ul>
                    <li><a href="{{ route('grades.index') }}">voir les grades</a></li>
                    <li><a href="{{ route('grades.create') }}">ajouter une grades</a></li>
                </ul>
            </li>

            <li>
                <h2>vides</h2>
                <ul>
                    <li><a href="{{ route('empties.index') }}">voir les vides</a></li>
                    <li><a href="{{ route('empties.create') }}">ajouter un vide</a></li>
                </ul>
            </li>

            <li>
                <h2>dettes de vides</h2>
                <ul>
                    <li><a href="{{ route('givebacks.index') }}">voir les dettes de vides</a></li>
                    <li><a href="{{ route('givebacks.create') }}">ajouter une dette de vides</a></li>
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