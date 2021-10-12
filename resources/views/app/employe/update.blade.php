@extends('app')
@section('page', 'Modifier un employé')
@section('content') 
<main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Employé </h1>
    </div>
    <div class="card mt-5 mt-5 shadow p-3 mb-5 brounded">
      <div class="card-header alert-primary text-center text-dark ">
        <h1>Modifier un employé</h1>
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
   <form class="row g-6" action="{{ route('employes.update', $employe->id) }}" method="POST">
          @csrf
         
          <div class="col-md-12 mb-3">
            <label class="form-label" for="user_id">Nom de l'employer</label>
            <select   name="user_id" class="form-select" aria-label="Default select example">
                 @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ ($user->id === $employe->user_id) ? "selected" : "" }}>{{ $user->fullname }}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-4 mb-3" >
            <label  class="form-label" for="salary">Salaire mensuel</label>
            <input class="form-control"   type="number" name="salary"  value="{{ $employe->salary }}">
          </div>
          <div class="col-md-4 mb-3" >
            <label  class="form-label" for="adress">Adresse du client</label>
            <input class="form-control" type="text" name="adress" id="adress" value="{{ $employe->adress }}">
          </div>
          <div class="col-md-4 mb-3" >
            <label  class="form-label" for="mobile_number">Numero du client</label>
            <input class="form-control" type="number" name="mobile_number" id="mobile_number" value="{{ $employe->mobile_number }}">
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
