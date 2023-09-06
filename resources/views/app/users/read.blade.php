@extends('app')
@section('page', 'utilisateur')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="display-4">
                Utilisateurs
            </h1>
        </div>
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Ajouter un 
            @if(Auth::user()->role_id == 1)
                gerant
            @elseif(Auth::user()->role_id == 2)
                caissier
            @endif
        </a>
        @if (count($users) <= 0)
            <p class="alert alert-info">Aucun utilisateur trouvé</p>
        @else
            <div class="card  shadow p-3 mb-5 brounded ">
                <div class="card-header   text-center text-dark ">
                    <h3>Liste des utilisateurs</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped display" id="table_id">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Pseudo</th>
                                    <th scope="col">Depot</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($users as $us)
                                    <tr>

                                        <th scope="row"><?php $i++;
                                        echo "$i"; ?></th>
                                        <td> <strong>{{ $us->fullname }} </strong> </td>
                                        <td class="col-lg-1">{{ $us->username }}</td>
                                        <td class="col-lg-1">{{ $us->deposit->name }}</td>
                                        <td class="col-lg-1">{{ $us->role->name }}</td>
                                        <td>
                                            
                                            <a href="{{ route('users.show', $us->id) }}"
                                                class="btn btn-sm btn-primary mb-1">Plus de details</a>

                                            @if(Auth::user()->role_id == 1 && $us->role_id == 2)    
                                                <a href="{{ route('users.edit', $us->id) }}"
                                                    class="btn btn-sm btn-info  mb-1">Modifier</a>
                                                    
                                            <form action="{{ route('users.destroy', $us->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-sm btn-danger mb-1" value="supprimer">
                                            </form>
                                            @endif
                                            
                                            
                                            @if(Auth::user()->role_id == 2 && $us->role_id == 3 && Auth::user()->deposit_id == $us->deposit_id)    
                                            <a href="{{ route('users.edit', $us->id) }}"
                                                class="btn btn-sm btn-info  mb-1">Modifier</a>

                                            <form action="{{ route('users.destroy', $us->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-sm btn-danger mb-1" value="supprimer">
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
