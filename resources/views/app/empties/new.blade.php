@extends('app')
@section('page', 'Nouveau vide')
@section('content')
    <h2>Ajouter un vide</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('empties.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="client_id">nom du client</label>
            <select name="client_id" id="client_id">
                @foreach ($clients as $cl)
                    <option value="{{ $cl->id }}">{{ $cl->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <label for="client_id">nom du produit</label>
            <select name="product_id" id="product_id">
                @foreach ($products as $pd)
                    <option value="{{ $pd->id }}">{{ $pd->name }}</option>
                @endforeach
            </select>
        </div>

        <label for="client_id">quantité</label>
        <input type="number" name="quantity" id="quantity">

        <div class="">
            <label for="client_id">nom du depot</label>
            <select name="deposit_id" id="deposit_id">
                @foreach ($deposits as $dp)
                    <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit">ajouter</button>
    </form>
@endsection