@extends('app')
@section('page', 'liste des employés')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="my-2"> Employé </h1>
    </div>
    <a href="{{ route('employes.create') }}" class="btn btn-primary mb-3" >Ajouter un employe(é)</a>
    
    @if ( count($employes) <= 0)
        <p class="note note-primary text-dark  mt-5 mb-3 shadow p-3 mb-5 brounded ">Aucun  employé(é) trouvé(e)</p>
    @else
    <div class="card  shadow p-3 mb-5 brounded ">
      <div class="card-header  text-center text-dark alert-primary ">
        <h3> Liste de employés</h3>
      </div>
      <div class="card-body">
      
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de l'employe(é)</th>
                <th scope="col" >Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($employes as $employe)
              <tr>
                
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td> <strong>{{ $employe->user->fullname }} </strong> </td>
                <td>
                <a href="{{ route('employes.show', $employe->id) }}"  class="mb-1  btn btn-sm btn-primary " >Plus de details</a>

                <a href="{{ route('employes.edit', $employe->id) }}"  class="mb-1 btn btn-sm btn-info ">Modifier</a>
                
                <form action="{{ route('employes.destroy', $employe->id) }}"  method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="mb-1 btn btn-sm btn-danger" value="Supprimer">
                </form>

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