@extends('app')
@section('page', $vendor->name)
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-4"> Vendeur </h1>
                </div>
                <div class="note note-primary text-dark   mt-5 mb-3 shadow p-3 mb-5 brounded shadow p-3 mb-5 brounded ">
                <h2>Nom du vendeur : {{ $vendor->name }} </h2>
                <p>Adress : {{ $vendor->adress }} </p>
                </div>
</main>  
@endsection