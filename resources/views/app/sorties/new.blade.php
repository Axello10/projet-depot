@extends('app')
@section('page', 'Nouvelle Sortie')
@section('content')

<main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="dispaly-4"> Sortie pour les clients avec faveurs </h1>
    </div>
    <div class="card mt-5 mt-5 shadow p-3 mb-5 brounded">
      <div class="card-header alert-primary text-center text-dark">
        <h1>Ajouter une sortie</h1>
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
      <form class="row g-6"  action="{{ route('sorties.store') }}" method="POST">
          @csrf
          <div class="col-md-12">
            <label class="form-label" for="client_id">Nom du client</label>
            <select class="form-select" name="client_id" id="client">
            @foreach ($clients as $cl)
                    <option value="{{ $cl->id }}">{{ $cl->name }}</option>
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
        <div class="col-md-12">
            <label class="form-label"  for="choice">Paiement</label>
            <select class="form-select" name="payer" id="">
                <option value="oui">Payer directement</option>
                <option value="non">Cheque</option>
                <option value="non">Payer plus tard</option>
                <option value="non">Payer à la fin du mois</option>
            </select>
        </div>
        
          <div class="col-md-4" >
            <label  class="form-label" for="quantity">Quantité</label>
            <input class="form-control" type="number" name="quantity" id="quantity"> 
          </div>
          <div class="col-md-4" >
            <label  class="form-label" for="prix">Prix par casier</label>
            <input class="form-control" type="number" name="prix" id="prix"> 
          </div>
          <div class="col-md-4" >
            <label  class="form-label" for="empty">Vide rendue</label>
            <input class="form-control" type="number" name="empty" id="empty"> 
          </div>
          <input type="hidden" name="deposit_id" value="{{ Auth::user()->deposit_id }}">
          <br>
          <div class="col-md-12">
            <div class="alert alert-warning m-0 mt-2 p-0" role="alert">
                <ul>
                    <li class="list-inline-item">si le client paye par cheque remplissez ce champ *important, sinon laissez ce champ vide</li>
                </ul>
            </div>
            <label  class="form-label" for="num_cheque">numero du cheque</label>
            <input class="form-control" type="text" name="num_cheque" id="num_cheque">
          </div>
          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </form>
      </div>
    </div>
  </main>
@endsection

