@extends('app')
@section('page', 'page des sorties')
@section('content')
<h2>La liste des recentes sorties</h2>
@if (count($exits) <= 0)
    <p>vous n'avez rien sortie pour l'instant</p>
@else
    <table border="1px">
    <thead>
        <tr>
            <td><strong>nom du produit</strong></td>
            <td><strong>prix total</strong></td>
            <td><strong>nom du depot</strong></td>
            <td><strong>quantité</strong></td>
            <td><strong>client</strong></td>
            <td><strong>utilisateur</strong></td>
            <td><strong>jour et mois</strong></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($exits as $pd)
        <tr>
            <td>{{ $pd->product->name }}</td>
            <td>{{ $pd->price }}</td>
            <td>{{ $pd->deposit->name }}</td>
            <td>{{ $pd->quantity }}</td>
            <td>{{ $pd->client->name }}</td>
            <td>{{ $pd->user->fullname }}</td>
            <td>{{ $pd->created_at->format('d M Y') }}</td>
        </tr>   
        @endforeach
    </tbody>
    </table>
@endif

@endsection