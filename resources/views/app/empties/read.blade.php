@extends('app')
@section('page', 'vides')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Les vides </h1>
    </div>
    @if(Auth::user()->role_id == 3)
    <a href="{{ route('empties.create') }}" class="btn btn-primary mb-3" >Ajouter une dette de vide</a>
    @endif
    @if ( count($empties) <= 0)
        <p class="alert alert-info text-dark  mt-5 mb-3 shadow p-3 mb-5 brounded ">Aucun vide trouvé</p>
    @else
    <div class="card  shadow p-3 mb-5 brounded ">
      <div class="card-header  text-center text-dark alert-primary ">
        <h3> Liste de vides </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped "id="table_id">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du client</th>
                <th scope="col">Quantité</th>
                <th scope="col">Payé</th>
                <th scope="col" >Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($empties as $pt)
              <tr>
                
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td> <strong> {{ $pt->client->name }}  </strong> </td>
                <td> <strong> {{ $pt->quantity }}  </strong> </td>
                <td> <strong> {{ $pt->payer }}  </strong> </td>
                <td>
                <a href="{{ route('empties.show', $pt->id) }}"  class="mb-1 btn btn-sm btn-primary " >Plus de details</a>

                <a href="{{ route('empties.edit', $pt->id) }}"  class="mb-1 btn btn-sm btn-info ">Modifier</a>
                @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                <form action="{{ route('empties.destroy', $pt->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="mb-1 btn btn-sm btn-danger" value="Supprimer">
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


