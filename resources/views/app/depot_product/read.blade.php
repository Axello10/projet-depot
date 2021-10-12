@extends('app')
@section('page', 'Nouveau produit relie au depot')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="my-2"> Produit par dépot </h1>
    </div>
    @if ( count($depotproducts) <= 0)
        <p class="alert alert-info text-dark  mt-5 mb-3 shadow p-3 mb-5 brounded ">Aucun produit trouvé</p>
    @else
    <div class="card  shadow p-3 mb-5 brounded ">
      <div class="card-header  text-center text-dark alert-primary ">
        <h3> Liste de tout les produits reliés aux dépots </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du produit</th>
                <th scope="col" >Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($depotproducts as $gd)
              <tr>
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td> <strong> {{ $gd->product_id }} </strong> </td>
                <td>
                <a href="{{ route('depotproducts.show', $gd->id) }}"  class="mb-1 btn btn-sm btn-primary " >Plus de details</a>

                <a href="{{ route('depotproducts.edit', $gd->product_id) }}"  class="mb-1 btn btn-sm btn-info ">Modifier</a>
                
                <form action="{{ route('depotproducts.destroy', $gd->id) }}s" method="POST">
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

