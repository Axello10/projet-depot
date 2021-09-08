@extends('app')
@section('page', 'Nouveau Produit')
@section('content')
    <h2>Ajouter un produit</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="name">nom du produit</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="">
            <label for="price_in">prix d'entree du produit</label>
            <input type="number" name="price_in" id="price_in">
        </div>

        <div class="">
            <label for="price_out">prix de sortie du produit</label>
            <input type="number" name="price_out" id="price_out">
        </div>
        
        <button type="submit">ajouter</button>
    </form>
@endsection