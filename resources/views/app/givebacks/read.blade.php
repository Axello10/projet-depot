@extends('app')
@section('page', 'dette de vides')
@section('content')


<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Dettes des vides </h1>
    </div>
    <a href="{{ route('givebacks.create') }}" class="btn btn-primary mb-3" >Ajouter un dette a rendre</a>
    @if ( count($givebacks) <= 0)
        <p class="alert alert-info">Aucun dette de vide trouvé</p>
    @else
    <div class="card  shadow p-3 mb-5 brounded ">
      <div class="card-header  text-center text-dark alert-primary ">
        <h3> Liste de dette de vides </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped " id="table_id">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du vendeur</th>
                <th scope="col">Quantité</th>
                <th scope="col">Payé</th>
                <th scope="col" >Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($givebacks as $gv)
              <tr>
                
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td> <strong>{{ $gv->vendor->name }} </strong> </td>
                <td> <strong>{{ $gv->quantity }} </strong> </td>
                <td> <strong>{{ $gv->payer }} </strong> </td>
                <td>
                <a href="{{ route('givebacks.show', $gv->id) }}"  class="btn btn-sm btn-primary  mb-1" >Plus de details</a>

                <a href="{{ route('givebacks.edit', $gv->id) }}"  class="btn btn-sm btn-info  mb-1">Modifier</a>
                @if(Auth::user()->role_id === 1)
                <form action="{{ route('givebacks.destroy', $gv->id) }}"  method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-sm btn-danger  mb-1" value="Supprimer">
                    </form>
                @endif
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
