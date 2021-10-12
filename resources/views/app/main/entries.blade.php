@extends('app')
@section('page', 'Page des entrees')
@section('content')


<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Information sur tout entrée </h1>
    </div>
    @if (count($entries) <= 0)
    <p class="note note-primary shadow p-3 mb-5 brounded  ">Aucune entrée trouvé</p>
    @else
    <div class="card  shadow p-3 mb-5 brounded ">
      <div class="card-header  text-center text-dark alert-primary ">
        <h3>Liste des entrées </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped " id="table_id">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du produit</th>
                <th scope="col">Nom du produit</th>
                <th scope="col">Prix total</th>
                <th scope="col">Nom du depot</th>
                <th scope="col">Quantité</th>
                <th scope="col">Fournisseur</th>
                <th scope="col">Utilisateur</th>
                <th scope="col">Jour et mois</th>
        </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($entries as $pd)
              <tr>
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td> <strong>{{ $pd->name }}</strong> </td>
                <td>{{ $pd->product->name }}</td>
                <td>{{ $pd->price }}</td>
                <td>{{ $pd->deposit->name }}</td>
                <td>{{ $pd->quantity }}</td>
                <td>{{ $pd->vendor->name }}</td>
                <td>{{ $pd->user->fullname }}</td>
                <td>{{ $pd->created_at->format('d M') }}</td>
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


