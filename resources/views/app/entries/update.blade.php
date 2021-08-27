@extends('app')
@section('page', 'mettre a jour une entree')
@section('content')
    <h2>metter a jour une entree</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('entries.update', $entrie->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="">
            <label for="vendor_id">vendeur</label>
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
            <input type="number" name="quantity" id="quantity" value="{{ $entrie->quantity }}">
        </div>
        
        <div class="">
            <label for="price">prix totale</label>
            <input type="number" name="price" id="price" value="{{ $entrie->quantity }}">
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
            <label for="empty">vide rendue</label>
            <input type="number" name="empty" id="empty" value="{{ $entrie->empty }}">
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection