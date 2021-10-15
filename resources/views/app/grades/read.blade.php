@extends('app')
@section('page', 'grades')
@section('content')

   
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="display-4"> Grades </h1>
    </div>
    @if ( count($grades) <= 0)
        <p class="alert alert-info">Aucun grade trouvé</p>
    @else
    <div class="card  shadow p-3 mb-5 brounded ">
      <div class="card-header  text-center text-dark alert-primary ">
        <h3> Liste de grades </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped " id="table_id">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de la grade</th>
                <th scope="col" >Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @foreach ($grades as $gd)
              <tr>
                
                <th scope="row"><small><?php $i++; echo "$i" ?></small></th>
                <td> <strong>{{ $gd->name }}</strong> </td>
                <td>
                <a href="{{ route('grades.show', $gd->id) }}"  class="btn btn-sm btn-primary mb-1 " >Plus de details</a>
                
                @if(Auth::user()->role_id === 1)
                <a href="{{ route('grades.edit', $gd->id) }}"  class="btn btn-sm btn-info  mb-1">Modifier</a>
                
                <form action="{{ route('grades.destroy', $gd->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-sm btn-danger  mb-1" value="Supprimer">
                    </form>
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
