@extends('app')
@section('page', 'Nouveau dette de vide')
@section('content')
    <h2>Ajouter une dette de vide</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('givebacks.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="vendor_id">nom du vendeur</label>
            <select name="vendor_id" id="vendor_id">
                @foreach ($vendors as $vd)
                    <option value="{{ $vd->id }}">{{ $vd->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <label for="product_id">nom du produit</label>
            <select name="product_id" id="product_id">
                @foreach ($products as $pd)
                    <option value="{{ $pd->id }}">{{ $pd->name }}</option>
                @endforeach
            </select>
        </div>

        <label for="quantity">quantité</label>
        <input type="number" name="quantity" id="quantity">

        <div class="">
            <label for="deposit_id">nom du depot</label>
            <select name="deposit_id" id="deposit_id">
                @foreach ($deposits as $dp)
                    <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit">ajouter</button>
    </form>
@endsection