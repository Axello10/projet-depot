@extends('app')
@section('page', 'modifier un vide')
@section('content') 
<main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Les vides </h1>
    </div>
    <div class="card mt-5 mt-5 shadow p-3 mb-5 brounded">
      <div class="card-header alert-primary text-center text-dark">
        <h1>Modifier un vide</h1>
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
   <form class="row g-6" action="{{ route('empties.update', $emptie->id) }}" method="post">
          @csrf
          @method('put')
          <div class="col-md-12 mb-3">
            <label class="form-label" for="client_id">Nom du client</label>
            <select name="client_id" id="client_id" class="form-select" aria-label="Default select example">
            @foreach ($clients as $cl)
                    <option value="{{ $cl->id }}" {{ ($cl->id === $emptie->client_id) ? "selected" : "" }}>{{ $cl->name }}</option>
            @endforeach
            </select>
          </div>
          <div class="col-md-12 mb-3">
            <label class="form-label" for="product_id">Nom du produit</label>
            <select name="product_id" id="product_id" class="form-select" aria-label="Default select example">
                @foreach ($products as $pd)
                    <option value="{{ $pd->id }}" {{ ($pd->id === $emptie->client_id) ? "selected" : "" }}>{{ $pd->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label  class="form-label" for="payer">Etat du dette</label>
            <select name="payer" id=""  class="form-select" aria-label="Default select example">
                <option value="oui">Dette payée</option>
                <option value="non">Dette non payée</option>
            </select>
        </div>
          <div class="col-md-4 mb-3" >
            <label  class="form-label" for="quantity">Quantité</label>
            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ $emptie->quantity }}">
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label" for="empty">Vide rendue</label>
            <input type="number"  class="form-control" name="empty" id="empty">
        </div>
        
        <input type="hidden" name="deposit_id" value="{{ Auth::user()->deposit_id }}">
          <br>
          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
    </form>
    </div>
</div>
</main>
@endsection
