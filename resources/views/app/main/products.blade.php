@extends('app')
@section('page', 'Page des Produits')
@section('content')


<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Information sur tout produit </h1>
    </div>
    @if (count($products) <= 0)
    <p class="note note-primary shadow p-3 mb-5 brounded  ">Aucune produit trouvé </p>
    @else
    <div class="card  shadow p-3 mb-5 brounded ">
      <div class="card-header  text-center text-dark alert-primary ">
        <h3>Liste des produits </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped " id="table_id">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du produit</th>
                <th scope="col">Prix d'entree</th>
                <th scope="col">Prix de sortie</th>
                <th scope="col">Quantité</th>
        </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($products as $pd) 
              <tr>
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td> <strong>{{ $pd->name }}</strong> </td>
                <td>{{ $pd->price_in }}</td>
                <td>{{ $pd->price_out }}</td>
                <td>{{ $pd->quantity }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>  
  </main>
    @endif
    
@endsection


