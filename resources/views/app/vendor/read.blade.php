@extends('app')
@section('page', 'vendeurs')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Vendeur </h1>
    </div>
     
    @if ( count($vendors) <= 0)
        <p class="alert alert-info">Aucun vendeur trouvé</p>
    @else
    <div class="card  shadow p-3 mb-5 brounded ">
      <div class="card-header  text-center text-dark alert-primary ">
        <h3>Liste de produits </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped " id="table_id">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du vendeur</th> 
                <th scope="col">Adress</th>
                <th scope="col" >Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($vendors as $vd)
              <tr>
                
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td class=""> <strong> {{ $vd->name }}</strong> </td>
                <td class="col-lg-2"> {{ $vd->adress }}</td>
                <td>
                <a href="{{ route('vendors.show', $vd->id) }}"  class="mb-1 btn btn-sm btn-primary " >Plus de details</a>

                <a href="{{ route('vendors.edit', $vd->id) }}"  class="mb-1 btn btn-sm btn-info ">Modifier</a>
                <form action="{{ route('vendors.destroy', $vd->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit"  class="mb-1 btn btn-sm btn-danger"  value="Supprimer">
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
