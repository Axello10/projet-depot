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
                <h2>produits</h2>
                <ul>
                    <li><a href="{{ route('products.index') }}">voir les produits</a></li>
                    <li><a href="{{ route('products.create') }}">ajouter un produit</a></li>
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