@extends('app')
@section('page',"sortie")
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="display-4"> Sortie pour les clients avec faveurs </h1>
    </div>
    <div class="note note-primary text-dark  mt-5 mb-3 shadow p-3 mb-5 brounded shadow p-3 mb-5 brounded ">
        <h2>Nom du produit : {{ $sortie->product->name }}</h2>
            <p>Nom du client : {{ $sortie->client->name }} </p>
            <p>Nom du depot : {{ $sortie->deposit->name }}</p>
            <p>Prix : {{ $sortie->price }}</p>
            <p>numero du cheque : {{ (empty($sortie->num_cheque)) ? "inconnue" : $sortie->num_cheque }}</p>
    </div>
</main>  
   
@endsection