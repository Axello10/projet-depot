@extends('app')
@section('page', 'mettre a jour un produit')
@section('content')
    <h2>metter a jour un produit</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="">
            <label for="name">nom du produit</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}">
        </div>

        <div class="">
            <label for="price_in">prix d'entree du produit</label>
            <input type="number" name="price_in" id="price_in" value="{{ $product->price_in }}">
        </div>

        <div class="">
            <label for="price_out">prix de sortie du produit</label>
            <input type="number" name="price_out" id="price_out" value="{{ $product->price_out }}">
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection