@extends('app')
@section('page', 'Nouvelle Entree')
@section('content')
  
<main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="my-2"> Entrees </h1>
    </div>
    <div class="card mt-5 mt-5 shadow p-3 mb-5 brounded">
      <div class="card-header alert-primary text-center text-dark">
        <h1>Ajouter une entrée </h1>
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
   <form class="row g-6" action="{{ route('entries.store') }}" method="POST">
          @csrf
          <div class="col-md-12 mb-3">
            <label class="form-label" for="vendor_id">Vendeur</label>
            <select name="vendor_id" id="vendor" class="form-select" aria-label="Default select example">
                @foreach ($vendors as $vd)
                    <option value="{{ $vd->id }}">{{ $vd->name }}</option>
                @endforeach
            </select>
          </div>

          <div class="col-md-4 mb-1">
            <label class="form-label" for="product">Nom du produit</label>
            <select name="product_id" id="product" class="form-select" aria-label="Default select example">
                @foreach ($products as $pd)
                    <option value="{{ $pd->id }}">{{ $pd->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-4 mb-3" >
            <label  class="form-label" for="quantity">Quantité</label>
            <input class="form-control" type="number" name="quantity" id="quantity">
          </div>
          <input type="hidden" name="deposit_id" value="{{ Auth::user()->deposit_id }}">
          <div class="col-md-4 mb-3">
            <label class="form-label" for="empty">Vide rendue</label>
            <input  class="form-control" type="number" name="empty" id="empty">
        </div>
          <br>
          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
    </form>
    </div>
</div>
</main>
@endsection
