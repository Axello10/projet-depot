@extends('app')
@section('page', 'Nouveau produit relie au depot')
@section('content')
    <h2>Ajouter un produit au depot : <em>{{ Auth::user()->deposit->name }}</em></h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('depotproducts.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="name">nom du produit</label>
            <select name="product_id" id="product_id">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="">
            <label for="quantity">quantité</label>
            <input type="number" name="quantity" id="">
        </div>

        <button type="submit">ajouter</button>
    </form>
@endsection