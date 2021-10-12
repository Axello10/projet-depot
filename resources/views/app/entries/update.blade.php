@extends('app')
@section('page', 'modifier une entree')
@section('content')
<main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="my-2"> Entrees </h1>
    </div>
    <div class="card mt-5 mt-5 shadow p-3 mb-5 brounded">
      <div class="card-header alert-primary text-center text-dark">
        <h1>Modifier une entrée </h1>
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
   <form class="row g-6" action="{{ route('entries.update', $entrie->id) }}" method="POST">
          @csrf
          @method('put')
          <div class="col-md-6 mb-3">
            <label class="form-label" for="vendor_id">Vendeur</label>
            <select name="vendor_id" id="vendor" class="form-select" aria-label="Default select example">
            @foreach ($vendors as $vd)
                    <option value="{{ $vd->id }}" {{ ($vd->id === $entrie->vendor_id) ? "selected" : "" }}>{{ $vd->name }}</option>
            @endforeach
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label" for="deposit_id">Nom du dépot</label>
            <select name="deposit_id" id="deposit_id" class="form-select" aria-label="Default select example">
                 @foreach ($deposits as $dp)
                    <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-12 mb-3">
            <label class="form-label" for="product">Nom du produit</label>
            <select name="product_id" id="product" class="form-select" aria-label="Default select example">
            @foreach ($products as $pd)
                    <option value="{{ $pd->id }}" {{ ($pd->id === $entrie->product_id) ? "selected" : "" }}>{{ $pd->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-12 mb-3" >
          <label class="form-label" >Choississez l'action a faire sur la quantité</label>
            <select name="choice" class="form-select" id="">
                <option value="add">Augmentez</option>
                <option value="substract">Diminuer</option>
            </select>
          </div>
          <div class="col-md-6 mb-3" >
            <label  class="form-label" for="quantity">Quantité</label>
            <input class="form-control " value="{{ $entrie->quantity }}" type="number" name="quantity" id="quantity">
          </div>
          <input type="hidden" name="deposit_id" value="{{ Auth::user()->deposit_id }}">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="empty">Vide rendue</label>
            <input type="number"  class="form-control" name="empty" id="empty" value="{{ $entrie->empty }}">
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

