@extends('app')
@section('page', 'modifier un cas')
@section('content')
<main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Cas rare </h1>
    </div>
    
    <div class="card mt-5 mt-5 shadow p-3 mb-5 brounded">
      <div class="card-header alert-primary text-center text-dark">
        <h1>Modifier un cas rare</h1>
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
   <form class="row g-6" action="{{ route('rarecases.update', $rarecase->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="alert alert-primary">
                <p>les champs avec un * peuvent etre laisser vide.</p>
            </div>
            <div class="col-md-12 mb-3" >
              <label  class="form-label" for="incident">l'incident</label>
              <input class="form-control" type="text" name="incident" id="name" value="{{ $rarecase->incident }}">
            </div>
            
            <div class="col-md-12 mb-3" >
              <label  class="form-label" for="justification">justification * </label>
              <textarea class="form-control" name="justification" id="exampleFormControlTextarea1" rows="3">{{ $rarecase->justification }}</textarea>
            </div>
            <div class="col-md-6 mb-3" >
              <label  class="form-label" for="acteur">le fautif * </label>
              <input class="form-control" type="text" name="acteur" id="acteur" value="{{ $rarecase->acteur }}">
            </div>
            <div class="col-md-6 mb-3" >
              <label  class="form-label" for="price">le prix * </label>
              <input class="form-control" type="number" name="price" id="price" value="{{ $rarecase->price }}">
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="deposit_id" value="{{ Auth::user()->deposit_id }}">
            <br>
          <br>
          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
    </form>
    </div>
</div>
</main>
@endsection