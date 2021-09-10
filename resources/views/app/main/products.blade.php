@extends('app')
@section('page', 'Page des Produits')
@section('content')
    <h2>all products info---</h2>

    @if (count($products) <= 0)
        <p>rien a voir ici</p>
    @else
            <table border="1px">
                <thead>
                    <tr>
                        <td><strong>name</strong></td>
                        <td><strong>prix d'entree</strong></td>
                        <td><strong>prix de sortie</strong></td>
                        <td><strong>quantité</strong></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $pd)     
                    <tr>
                        <td>{{ $pd->name }}</td>
                        <td>{{ $pd->price_in }}</td>
                        <td>{{ $pd->price_out }}</td>
                        <td>{{ $pd->quantity }}</td>
                    </tr>   
                    @endforeach
                </tbody>
            </table>


    @endif