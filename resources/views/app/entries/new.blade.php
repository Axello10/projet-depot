@extends('app')
@section('page', 'Nouvelle Entree')
@section('content')
    <h2>Ajouter une entrée</h2>
    <form action="{{ route('entries.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="vendor_id">fournisseur</label>
            <select name="vendor_id" id="vendor">
                @foreach ($vendors as $vd)
                    <option value="{{ $vd->id }}">{{ $vd->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="">
            <label for="product">nom du produit</label>
            <select name="product_id" id="product">
                @foreach ($products as $pd)
                    <option value="{{ $pd->id }}">{{ $pd->name }}</option>
                @endforeach
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
            <label for="deposit_id">nom du depot</label>
            <select name="deposit_id" id="deposit_id">
                @foreach ($deposits as $dp)
                    <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="">
            <label for="empty">vide recu</label>
            <input type="number" name="empty" id="empty" step="5">
        </div>
        
        <button type="submit">ajouter</button>
    </form>
@endsection