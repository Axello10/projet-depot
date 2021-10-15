@extends('app')
@section('page', $client->name)
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-4"> Client </h1>
                </div>
                <div class="note note-primary text-dark   mt-5 mb-3 shadow p-3 mb-5 brounded  ">
                <h2>Nom du client : {{ $client->name }} </h2>
                <p>Adresse : {{ $client->adress }} </p>
                <p>Télephone : {{ $client->mobile_number }}</p>
                </div>
</main>    
@endsection
