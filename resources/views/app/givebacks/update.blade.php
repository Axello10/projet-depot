@extends('app')
@section('page', 'mettre a jour une dette de vide')
@section('content')
    
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    <form action="{{ route('givebacks.update', $giveback->id) }}" method="post">
        @csrf
        @method('put')
        <div class="">
            <label for="">nom du fournisseur</label>
            <select name="vendor_id" id="vendor_id">
                @foreach ($vendors as $vd)
                    <option value="{{ $vd->id }}" {{ ($vd->id === $giveback->vendor_id) ? "selected" : "" }}>{{ $vd->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <label for="">nom du produit</label>
            <select name="product_id" id="product_id">
                @foreach ($products as $pd)
                    <option value="{{ $pd->id }}" {{ ($pd->id === $giveback->product_id) ? "selected" : "" }}>{{ $pd->name }}</option>
                @endforeach
            </select>
        </div>

        <input type="number" name="quantity" id="quantity" value="{{ $giveback->quantity }}">

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