@extends('app')
@section('page', $product->name)
@section('content')


<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-4"> Produit </h1>
                </div>
                <div class="note note-primary  text-dark  alert-primary  mt-5 mb-3 shadow p-3 mb-5 brounded shadow p-3 mb-5 brounded ">
                <h2>Nom du produit : {{ $product->name }} </h2>
                <p>Prix d'achat : {{ $product->price_in }}</p>
                <p>Prix de sortie : {{ $product->price_out }}</p>
                <p>Ajouté par : {{ $product->user->fullname }}</p>
                <p><strong>Disponible sur ces dépots :</strong></p>
                @if (count($product->deposits) <= 0)
                    Produit non disponible!
                @else
                @foreach ($product->deposits as $pd)
                    <p>nom du depot : <strong>{{ $pd->name }}</strong></p>
                @endforeach
                @endif
                </div>
</main>      
@endsection
