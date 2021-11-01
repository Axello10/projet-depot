@extends('app')
@section('page', 'clients')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="my-2"> Client </h1>
    </div>
    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3" >Ajouter un client(é)</a>
    @if ( count($clients) <= 0)
        <p class="alert alert-info text-dark  mt-5 mb-3 shadow p-3 mb-5 brounded ">Aucun client trouvé</p>
    @else
    <div class="card  shadow p-3 mb-5 brounded ">
      <div class="card-header  text-center text-dark alert-primary ">
        <h3> Liste des clients </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du client</th>
                <th scope="col" >Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($clients as $cl)
              <tr>
                
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td> <strong>{{ $cl->name }} </strong> </td>
                <td>
                <a href="{{ route('clients.show', $cl->id) }}"  class="mb-1  btn btn-sm btn-primary " >Plus de details</a>

                <a href="{{ route('clients.edit', $cl->id) }}"  class="mb-1 btn btn-sm btn-info ">Modifier</a>
                @can('delete', Auth::user(), Client::class)
                    <form action="{{ route('clients.destroy', $cl->id) }}"  method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="mb-1 btn btn-sm btn-danger" value="Supprimer">
                    </form>    
                @endcan
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

