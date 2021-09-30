@extends('app')
@section('page', 'Sortie simple')
@section('content')
    <h2>Ajouter une sortie</h2>
    @if ($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>    
        @endforeach
        </ul>
    @endif
    <form action="{{ route('simplexits.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="product_id">nom du produit</label>
            <select name="product_id" id="">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->price_out }} Fbu</option>
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