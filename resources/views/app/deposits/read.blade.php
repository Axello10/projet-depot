@extends('app')
@section('page', 'depots')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Dépot </h1>
    </div>
    @if ( count($deposits) <= 0)
        <p class="alert alert-info text-dark  mt-5 mb-3 shadow p-3 mb-5 brounded ">Aucun dépot trouvé</p>
    @else
    <div class="card  shadow p-3 mb-5 brounded ">
      <div class="card-header  text-center text-dark alert-primary ">
        <h3> Liste de dépots </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped " id="table_id">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du dépot</th>
                <th scope="col">type de dépot</th>
                <th scope="col" >Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($deposits as $dp)
              <tr>
                
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td> <strong>{{ $dp->name }} </strong> </td>
                <td> <strong>{{ $dp->grade }} </strong> </td>
                <td>
                <a href="{{ route('deposits.show', $dp->id) }}"  class="mb-1 btn btn-sm btn-primary " >Plus de details</a>

                <a href="{{ route('deposits.edit', $dp->id) }}"  class="mb-1 btn btn-sm btn-info ">Modifier</a>
                @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                <form action="{{ route('deposits.destroy', $dp->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit"  class="mb-1 btn btn-sm btn-danger " value="Supprimer">
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
