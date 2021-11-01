@extends('app')
@section('page', 'cas rare')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="my-2"> cas rare </h1>
    </div>
    <a href="{{ route('rarecases.create') }}" class="btn btn-primary mb-3" >Ajouter un cas rare</a>
    @if ( count($rarecases) <= 0)
        <p class="alert alert-info text-dark  mt-5 mb-3 shadow p-3 mb-5 brounded ">Aucun cas trouvé</p>
    @else
    <div class="card  shadow p-3 mb-5 brounded ">
      <div class="card-header  text-center text-dark alert-primary ">
        <h3> Liste des cas </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">utilisateur</th>
                <th scope="col">depot</th>
                <th scope="col">incident</th>
                <th scope="col">date</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($rarecases as $rs)
              <tr>
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td> <strong>{{ $rs->user->username }} </strong> </td>
                <td> <strong>{{ $rs->deposit->name }} </strong> </td>
                <td> <strong>{{ $rs->incident }} </strong> </td>
                <td> <strong>{{ $rs->created_at }} </strong> </td>
                <td>
                <a href="{{ route('rarecases.show', $rs->id) }}"  class="mb-1  btn btn-sm btn-primary " >Plus de details</a>

                <a href="{{ route('rarecases.edit', $rs->id) }}"  class="mb-1 btn btn-sm btn-info ">Modifier</a>
                @if(Auth::user()->role_id === 1)
                    <form action="{{ route('rarecases.destroy', $rs->id) }}"  method="POST">
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

