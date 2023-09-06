@extends('app')
@section('page', 'produits')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Produit </h1>
    </div>
    @if(Auth::user()->role_id > 1)
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3" >Ajouter un produit</a>
    @endif
    @if ( count($products) <= 0)
    <p class="alert alert-info">Aucun produit trouvé</p>
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
                <th scope="col">Nom du produit</th>
                {{-- <th scope="col">Quantité (tout les depots)</th> --}}
                <th scope="col" >Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($products as $pd)
              <tr>
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td> <strong>{{ $pd->name }}</strong> </td>
                {{-- <td> <strong>{{ $pd->quantity }}</strong> </td> --}}
                <td>
                <a href="{{ route('products.show', $pd->id) }}"  class="mb-1 btn btn-sm btn-primary " >Plus de details</a>

                <a href="{{ route('products.edit', $pd->id) }}"  class="mb-1 btn btn-sm btn-info ">Modifier</a>
                @can('delete', Auth::user(), Product::class)
                <form action="{{ route('products.destroy', $pd->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="supprimer" class="mb-1 btn btn-sm btn-danger ">
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
