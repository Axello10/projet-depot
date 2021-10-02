@extends('app')
@section('page', 'mettre a jour une sortie')
@section('content')
    <h2>metter a jour une sortie</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('sorties.update', $sortie->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="">
            <label for="client_id">nom du client</label>
            <select name="client_id" id="client_id">
                @foreach ($clients as $cl)
                    <option value="{{ $cl->id }}" {{ ($cl->id === $sortie->client_id) ? "selected" : "" }}>{{ $cl->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="">
            <label for="product">nom du produit</label>
            <select name="product_id" id="product">
                @foreach ($products as $pd)
                    <option value="{{ $pd->id }}" {{ ($pd->id === $sortie->product_id) ? "selected" : "" }}>{{ $pd->name }}</option>
                @endforeach
            </select>
        </div>
        
        <p><strong>choississez l'action a faire sur la quantité</strong></p>
        <select name="choice" id="">
            <option value="add">augmentez</option>
            <option value="substract">diminuer</option>
        </select>

        <div class="">
            <label for="quantity">quantité</label>
            <input type="number" name="quantity" id="quantity" value="{{ $sortie->quantity }}">
        </div>

        <div class="">
            <label for="prix">prix par casier</label>
            <input type="number" name="prix" id="prix">
        </div>

        <input type="hidden" name="deposit_id" value="{{ Auth::user()->deposit_id }}">
        
        <div class="">
            <label for="choice">paiement</label>
            <select name="payer" id="">
                <option value="oui" selected>payer directement</option>
                <option value="non">cheque</option>
                <option value="non">payer plus tard</option>
                <option value="non">payer a la fin du mois</option>
            </select>
        </div>

        <div class="">
            <label for="empty">vide rendue</label>
            <input type="number" name="empty" id="empty" value="{{ $sortie->empty }}">
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection