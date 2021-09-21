@extends('app')
@section('page', 'mettre a jour un produit relie au depot')
@section('content')
    <h2>metter a jour produit relie au depot</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('depotproducts.update', $depotProducts->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="">
            <label for="name">nom du produit</label>
            <select name="product_id" id="product_id">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $depotProducts->id === $product->id ? "selected" : "" }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="">
            <label for="quantity">quantité</label>
            <input type="number" name="quantity" id="">
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection