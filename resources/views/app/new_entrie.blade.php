@extends('app')
@section('page', 'Nouvelle Entree')
@section('content')
    <h2>Ajouter une entrée</h2>
    <form action="{{ route('entries.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="vendor_id">vendeur</label>
            <select name="vendor_id" id="vendor">
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
                <option value="1">4</option>
            </select>
        </div>
        
        <div class="">
            <label for="product">nom du produit</label>
            <select name="product_id" id="product">
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
                <option value="1">4</option>
            </select>
        </div>
        
        <div class="">
            <label for="quantity">quantité</label>
            <input type="number" name="quantity" id="quantity" step="5">
        </div>
        
        <div class="">
            <label for="price">prix totale</label>
            <input type="number" name="price" id="price" step="10">
        </div>
        
        <div class="">
            <label for="empty">vide recu</label>
            <input type="number" name="empty" id="empty" step="5">
        </div>
        
    </form>
@endsection