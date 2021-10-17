@extends('app')
@section('page', $rarecase->incident)
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-4"> Cas rare </h1>
                </div>
                <div class="note note-primary text-dark   mt-5 mb-3 shadow p-3 mb-5 brounded  ">
                <h2>l'incident : {{ $rarecase->incident }} </h2>
                <p>la justification : {{ (!empty($rarecase->justification)) ? $rarecase->justification : "aucune" }} </p>
                <p>fautif : {{ (!empty($rarecase->acteur)) ? $rarecase->acteur : "aucune" }}</p>
                <p>utilisateur : {{ $rarecase->user->username }}</p>
                <p>depot : {{ $rarecase->deposit->name }}</p>
                <p>prix : {{ $rarecase->price }}</p>
                </div>
</main>    
@endsection
