@extends('app')
@section('page', "entree")
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-4"> Entrees </h1>
                </div>
                <div class=" text-dark note note-primary  mt-5 mb-3 shadow p-3 mb-5 brounded shadow p-3 mb-5 brounded ">
                <h2>Nom du produit : {{ $entrie->product->name }} </h2>
                <p>Nom du fournisseur : {{ $entrie->vendor->name }} |</p>
                <p>Fait par : {{ $entrie->user->fullname }} |</p>
                <p>Nom du depot : {{ $entrie->deposit->name }} |</p>    
                <p>Prix : {{ $entrie->price }}</p>
                </div>
</main> 
@endsection