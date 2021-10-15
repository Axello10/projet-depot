@extends('app')
@section('page', 'Nouveau Grade')
@section('content')

<main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="dispaly-4"> Grades </h1>
    </div>
    <div class="card mt-5 mt-5 shadow p-3 mb-5 brounded">
      <div class="card-header alert-primary text-center text-dark">
        <h1>Ajouter une grade</h1>
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
      <form class="row g-6"  action="{{ route('grades.store') }}" method="POST">
          @csrf
          <div class="col-md-12" >
            <label  class="form-label" for="name">Nom de la grade</label>
            <input class="form-control" type="text" name="name" id="name"> 
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
