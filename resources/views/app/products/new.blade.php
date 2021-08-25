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
        
        <button type="submit">ajouter</button>
    </form>
@endsection