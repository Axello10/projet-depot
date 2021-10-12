@extends('app')
@section('page', 'modifier  un produit relie au depot')
@section('content')
<main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Produit par dépot </h1>
    </div>
    
    <div class="card mt-5 mt-5 shadow p-3 mb-5 brounded">
      <div class="card-header alert-primary text-center text-dark">
        <h1>Modifier un produit relié au dépot</h1>
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
   <form class="row g-6"  action="{{ route('depotproducts.update', $depotproduct->id) }}" method="POST">
            @csrf
            @method('put')
          <h3>Vous modifiez le produit {{ $product->name }} (seulement la quantité)</h3>
          <div class="col-md-12 mb-3" >
            <label class="form-label" >Choisissez le type de modification a faire <strong class="text-danger">*important!</strong></label>
            <select name="choice" id=""  class="form-select" aria-label="Default select example">
                <option value="add">Augmenter</option>
                <option value="subtract">Diminuer</option>
            </select>
                    </div>
            <div class="col-md-12 mb-3">
                <label for="quantity" class="form-label" >Quantité</label>
                <input class="form-control" type="number" name="quantity" value="{{ $depotproduct->quantity }}">
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