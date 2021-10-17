@extends('app')
@section('page', 'Nouveau Client')
@section('content') 
<main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Client </h1>
    </div>
    <div class="card mt-5 mt-5 shadow p-3 mb-5 brounded">
      <div class="card-header alert-primary text-center text-dark ">
        <h1>Ajouter un client</h1>
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
   <form class="row g-6" action="{{ route('clients.store') }}" method="POST">
          @csrf
          <div class="col-md-12 mb-3" >
            <label  class="form-label" for="name">Nom du client</label>
            <input class="form-control" type="text" name="name" id="name">
          </div>
          
          <div class="col-md-4 mb-3" >
            <label  class="form-label" for="adress">Adresse du client</label>
            <input class="form-control" type="text" name="adress" id="adress">
          </div>
          <div class="col-md-8 mb-3" >
            <label  class="form-label" for="mobile_number">Numero du client</label>
            <input class="form-control" type="number" name="mobile_number" id="mobile_number">
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
