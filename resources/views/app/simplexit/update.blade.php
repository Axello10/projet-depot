@extends('app')
@section('page', 'modifier une sortie simple')
@section('content')

<main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="dispaly-4"> Sortie simple </h1>
    </div>
    <div class="card mt-5 mt-5 shadow p-3 mb-5 brounded">
      <div class="card-header alert-primary text-center text-dark">
        <h1>Modifier une simple sortie</h1>
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
      <form class="row g-6"  action="{{ route('simplexits.update', $simplexit->id) }}"  method="POST">
         @csrf
         @method('put')
          <div class="col-md-12">
            <label class="form-label" for="product_id">Nom du produit</label>
            <select class="form-select" name="product_id" id="">
            @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ ($product->id == $simplexit->product_id) ? "selected" : "" }} >{{ $product->name }} - {{ $product->price_out }} Fbu</option>
                @endforeach
            </select>
        </div>
        <label class="form-label" >Choississez l'action à faire sur la quantité</label>
        <select name="choice" id="" class="form-select">
            <option value="add">Augmentez</option>
            <option value="substract">Diminuer</option>
        </select>
          <div class="col-md-12" >
            <label  class="form-label" for="quantity">Quantité</label>
            <input class="form-control" type="number" name="quantity" id="" value="{{ $simplexit->quantity }}"> 
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
