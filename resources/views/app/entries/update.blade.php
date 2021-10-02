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
                    <option value="{{ $vd->id }}" {{ ($vd->id === $entrie->vendor_id) ? "selected" : "" }}>{{ $vd->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="">
            <label for="product">nom du produit</label>
            <select name="product_id" id="product">
                @foreach ($products as $pd)
                    <option value="{{ $pd->id }}" {{ ($pd->id === $entrie->product_id) ? "selected" : "" }}>{{ $pd->name }}</option>
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
            <input type="number" name="quantity" id="quantity" value="{{ $entrie->quantity }}">
        </div>

        <input type="hidden" name="deposit_id" value="{{ Auth::user()->deposit_id }}">
        
        <div class="">
            <label for="empty">vide rendue</label>
            <input type="number" name="empty" id="empty" value="{{ $entrie->empty }}">
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection