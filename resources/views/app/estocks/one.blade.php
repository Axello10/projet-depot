@extends('app')
@section('page', 'vides dans le stock')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="display-4"> Les vides dans le stock </h1>
    </div>
    <div class="note note-primary text-dark  mt-5 mb-3 shadow p-3 mb-5 brounded  ">
        <h2>Nom du produit : {{ $estock->product->name }} </h2>
            <div>
                <p>Nom du depot : {{ $estock->deposit->name }}</p>
                <p>Quantité : {{ $estock->quantity }}</p>
                <p>utilisateur : {{ $estock->user->username }}</p>
            </div>
    </div>
</main> 
@endsection