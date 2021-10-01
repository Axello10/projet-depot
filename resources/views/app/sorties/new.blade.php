@extends('app')
@section('page', 'Nouvelle Sortie')
@section('content')
    <h2>Ajouter une sortie</h2>
    <h4>pour les clients avec faveurs</h4>
    @if ($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>    
        @endforeach
        </ul>
    @endif
    <form action="{{ route('sorties.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="client_id">nom du client</label>
            <select name="client_id" id="client">
                @foreach ($clients as $cl)
                    <option value="{{ $cl->id }}">{{ $cl->name }}</option>
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
            <input type="number" name="quantity" id="quantity">
        </div>

        <div class="">
            <label for="prix">prix par casier</label>
            <input type="number" name="prix" id="prix">
        </div>

        <input type="hidden" name="deposit_id" value="{{ Auth::user()->deposit_id }}">
        
        <div class="">
            <label for="empty">vide rendue</label>
            <input type="number" name="empty" id="empty">
        </div>

        <div class="">
            <label for="choice">paiement</label>
            <select name="payer" id="">
                <option value="oui">payer directement</option>
                <option value="non">cheque</option>
                <option value="non">payer plus tard</option>
                <option value="non">payer a la fin du mois</option>
            </select>
        </div>
        
        <button type="submit">ajouter</button>
    </form>
@endsection