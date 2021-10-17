@extends('app')
@section('page', 'modifier un produit')
@section('content')
    
<main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Produit </h1>
    </div>
    <div class="card mt-5 mt-5 shadow p-3 mb-5 brounded">
      <div class="card-header alert-primary text-center text-dark">
        <h1>Modifier un produit</h1>
      </div>
      <br>
      @if ($errors->any())
      <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>    
        @endforeach
      </ul>
      </div>
       @endif
      <div class="card-body">
      <form class="row g-6"  action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="col-md-12 " >
            <label  class="form-label" for="name">Nom du produit</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}">
          </div>
          <div class="col-md-12 mt-2">
              <p class="alert alert-primary">les prix pour tout les depots</p>
          </div>
          <div class="col-md-4 " >
            <label  class="form-label" for="price_in">Prix d'entrée du produit</label>
            <input class="form-control" type="number" name="price_in" id="price_in" value="{{ $product->price_in }}">
          </div>
          <div class="col-md-4 " >
            <label  class="form-label" for="price_out">Prix de sortie du produit</label>
            <input class="form-control" type="number" name="price_out" id="price_out" value="{{ $product->price_out }}">
          </div>
          <div class="col-md-12 mt-2">
            <p class="alert alert-primary">les prix pour le depot a part</p>
        </div>
        <div class="col-md-4 " >
          <label  class="form-label" for="second_price_in">Prix d'entrée du produit</label>
          <input class="form-control" type="number" name="second_price_in" id="second_price_in" value="{{ $product->second_price_in }}">
        </div>
        <div class="col-md-4 " >
          <label  class="form-label" for="second_price_out">Prix de sortie du produit</label>
          <input class="form-control" type="number" name="second_price_out" id="second_price_out" value="{{ $product->second_price_out }}">
        </div>
        <input type="hidden" name="quantity" value="{{ $product->quantity }}">
          </div>
          <br>
          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </main>

@endsection
