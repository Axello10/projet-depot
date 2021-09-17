@extends('app')
@section('page', 'Page des entrees')
@section('content')
    <h2>all entries info---</h2>

    @if (count($entries) <= 0)
        <p>rien a voir ici</p>
    @else
            <table border="1px">
                <thead>
                    <tr>
                        <td><strong>nom du produit</strong></td>
                        <td><strong>prix total</strong></td>
                        <td><strong>nom du depot</strong></td>
                        <td><strong>quantité</strong></td>
                        <td><strong>fournisseur</strong></td>
                        <td><strong>utilisateur</strong></td>
                        <td><strong>mois</strong></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entries as $pd)
                    <tr>
                        <td>{{ $pd->product->name }}</td>
                        <td>{{ $pd->price }}</td>
                        <td>{{ $pd->deposit->name }}</td>
                        <td>{{ $pd->quantity }}</td>
                        <td>{{ $pd->vendor->name }}</td>
                        <td>{{ $pd->user->fullname }}</td>
                        <td>{{ $pd->created_at->format('d M') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    @endif