@extends('app')
@section('page', 'mettre a jour un vide')
@section('content')
    
    <form action="{{ route('empties.update', $emptie->id) }}" method="post">
        @csrf
        @method('put')
        <div class="">
            <label for="">nom du client</label>
            <select name="client_id" id="client_id">
                @foreach ($clients as $cl)
                    <option value="{{ $cl->id }}" {{ ($cl->id === $emptie->client_id) ? "selected" : "" }}>{{ $cl->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <label for="">nom du produit</label>
            <select name="product_id" id="product_id">
                @foreach ($products as $pd)
                    <option value="{{ $pd->id }}" {{ ($pd->id === $emptie->client_id) ? "selected" : "" }}>{{ $pd->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <label for="">quantité</label>
            <input type="number" name="quantity" id="quantity" value="{{ $emptie->quantity }}">
        </div>

        <input type="hidden" name="deposit_id" value="{{ Auth::user()->deposit_id }}">

        <div class="">
            <label for="payer">etat du dette</label>
            <select name="payer" id="">
                <option value="oui">dette payer</option>
                <option value="non">dette non payer</option>
            </select>
        </div>

        <button type="submit">modifier</button>
    </form>

@endsection