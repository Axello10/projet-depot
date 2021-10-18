@extends('app')
@section('page', 'Nouvelle Sortie vers depot')
@section('content')

<main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="dispaly-4"> Sortie vers depot </h1>
    </div>
    <div class="card mt-5 mt-5 shadow p-3 mb-5 brounded">
      <div class="card-header alert-primary text-center text-dark">
        <h1>Ajouter une sortie pour un depot</h1>
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
      <form class="row g-6"  action="{{ route('sdeposits.store') }}" method="POST">
          @csrf
          <div class="col-md-12">
            <label class="form-label" for="deposit_id">nom du depot</label>
            <select class="form-select" name="deposit_id" id="deposit_id">
            @foreach ($deposits as $dp)
                    <option value="{{ $dp->id }}">{{ $dp->name }}</option>
            @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <label class="form-label" for="product">Nom du produit</label>
            <select class="form-select"  name="product_id" id="product">
            @foreach ($products as $pd)
                    <option value="{{ $pd->id }}">{{ $pd->name }}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="from_deposit_id" value="{{ Auth::user()->deposit_id }}">

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        
          <div class="col-md-4" >
            <label  class="form-label" for="quantity">Quantité</label>
            <input class="form-control" type="number" name="quantity" id="quantity"> 
          </div>

          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </form>
      </div>
    </div>
  </main>
@endsection

