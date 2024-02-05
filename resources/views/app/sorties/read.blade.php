@extends('app')
@section('page', 'sortie')
@section('content')  
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4">  Sortie pour les clients avec faveurs  </h1>
    </div>
    @if(Auth::user()->role_id == 3)
    <a href="{{ route('sorties.create') }}" class="btn btn-primary mb-3" >Ajouter une sortie</a>
    @endif
    @if ( count($sorties) <= 0)
        <p class="alert alert-info">Aucun sortie  trouvé</p>
    @else
    <div class="card  shadow p-3 mb-5 brounded ">
      <div class="card-header  text-center text-dark alert-primary ">
        <h3> Liste de sortie </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped " id="table_id">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du produit</th>
                <th scope="col">prix totale</th>
                <th scope="col">utilisateur</th>
                <th scope="col">client</th>
                <th scope="col">payé</th>
                <th scope="col">date</th>
                <th scope="col" >Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($sorties as $st)
              <tr>
                
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td> <strong> {{ $st->product->name }}</strong> </td>
                <td> <strong> {{ $st->price }} Fbu</strong> </td>
                <td> <strong> {{ $st->user->fullname }}</strong> </td>
                <td> <strong> {{ $st->client->name }}</strong> </td>
                <td> <strong> {{ $st->payer }}</strong> </td>
                <td> <strong> {{ $st->created_at->format('d M') }} </strong> </td>
                <td>
                <a href="{{ route('sorties.show', $st->id) }}"  class="btn btn-sm btn-primary mb-1 " >Plus de details</a>
                
                @if(Auth::user()->role_id == 3)
                    <a href="{{ route('sorties.edit', $st->id) }}"  class="btn btn-sm btn-info  mb-1">Modifier</a>
                @endif
                
                </div>
                </td>
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