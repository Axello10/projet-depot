@extends('app')
@section('page', 'page des sorties')
@section('content')


<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Information sur tout sortie </h1>
    </div>
    @if (count($exits) <= 0)
    <p class="note note-primary shadow p-3 mb-5 brounded  ">Aucune sortie trouvé</p>
    @else
    <div class="card  shadow p-3 mb-5 brounded ">
      <div class="card-header  text-center text-dark alert-primary ">
        <h3> La liste recente des sorties </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped " id="table_id">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col"><strong>Nom du produit</strong></th>
                <th scope="col">Prix total</th>
                <th scope="col">Nom du depot</th>
                <th scope="col">Quantité</th>
                <th scope="col">Client</th>
                <th scope="col">Utilisateur</th>
                <th scope="col">Jour et mois</th>
        </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($exits as $pd)
              <tr>
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td><strong><{{ $pd->product->name }}</strong></td>
                <td>{{ $pd->price }}</td>
                <td>{{ $pd->deposit->name }}</td>
                <td>{{ $pd->quantity }}</td>
                <td>{{ $pd->client->name }}</td>
                <td>{{ $pd->user->fullname }}</td>
                <td>{{ $pd->created_at->format('d M Y') }}</td>
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