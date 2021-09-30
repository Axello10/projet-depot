@extends('app')
@section('page', 'mettre a jour une simple sortie')
@section('content')
    <h2>metter a jour une simple sortie</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('simplexits.update', $simplexit->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="">
            <label for="product_id">nom du produit</label>
            <select name="product_id" id="">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ ($product->id == $simplexit->product_id) ? "selected" : "" }} >{{ $product->name }} - {{ $product->price_out }} Fbu</option>
                @endforeach
            </select>
        </div>
        
        <p>choississez l'action a faire sur la quantité</p>
        <select name="choice" id="">
            <option value="add">augmentez</option>
            <option value="substract">diminuer</option>
        </select>

        <div class="">
            <label for="quantity">quantité</label>
            <input type="number" name="quantity" id="" value="{{ $simplexit->quantity }}">
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection