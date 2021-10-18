@extends('app')
@section('page', 'modifier un vide dans le stock')
@section('content') 
<main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> vides dans le stock</h1>
    </div>
    <div class="card mt-5 mt-5 shadow p-3 mb-5 brounded">
      <div class="card-header alert-primary text-center text-dark">
        <h1>Modifier un vide dans le stock</h1>
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
   <form class="row g-6" action="{{ route('estocks.update', $estock->id) }}" method="post">
          @csrf
          @method('put')
          <div class="col-md-12 mb-3">
            <label class="form-label" for="product_id">Nom du produit</label>
            <select name="product_id" id="product_id" class="form-select" aria-label="Default select example">
                @foreach ($products as $pd)
                    <option value="{{ $pd->id }}" {{ ($pd->id === $estock->product_id) ? "selected" : "" }}>{{ $pd->name }}</option>
                @endforeach
            </select>
          </div>

          <div class="col-md-12">
            <label class="form-label">Choississez l'action a faire sur la quantité</label>
            <select class="form-select" name="choice" id="">
                <option value="add">Augmentez</option>
                <option value="substract">Diminuer</option>
            </select>
            </div>

          <div class="col-md-4 mb-3" >
            <label  class="form-label" for="quantity">Quantité</label>
            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ $estock->quantity }}">
          </div>
        
        <input type="hidden" name="deposit_id" value="{{ Auth::user()->deposit_id }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          <br>
          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
    </form>
    </div>
</div>
</main>
@endsection
