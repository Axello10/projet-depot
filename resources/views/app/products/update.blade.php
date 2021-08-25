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
            <input type="text" name="name" id="name" value="{{ $vendor->name }}">
        </div>
        
        <button type="submit">modifier</button>
    </form>
@endsection