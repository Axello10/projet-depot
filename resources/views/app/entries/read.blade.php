@extends('app')
@section('page', 'entree')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="display-4"> Entrees </h1>
        </div>
        <a href="{{ route('entries.create') }}" class="btn btn-primary mb-3">Ajouter une entree</a>
        @if (count($entries) <= 0)
            <p class="alert alert-info">Aucun entree trouvé</p>
        @else
            <div class="card  shadow p-3 mb-5 brounded ">
                <div class="card-header  text-center text-dark alert-primary ">
                    <h3> Liste des entrées </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped " id="table_id">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom du produit </th>
                                    <th scope="col">prix totale</th>
                                    <th scope="col">utilisateur</th>
                                    <th scope="col">vendeur</th>
                                    <th scope="col">payé</th>
                                    <th scope="col">date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($entries as $et)
                                    <tr>

                                        <th scope="row"><small><?php $i++;
                                        echo "$i"; ?></small></th>
                                        <td> <strong>{{ $et->product->name }}</strong> </td>
                                        <td> <strong> {{ $et->price }} Fbu</strong> </td>
                                        <td> <strong> {{ $et->user->fullname }}</strong> </td>
                                        <td> <strong> {{ $et->vendor->name }}</strong> </td>
                                        <td> <strong> {{ $et->payer }}</strong> </td>
                                        <td> <strong> {{ $et->created_at->format('d M') }}</strong> </td>
                                        <td>
                                            <a href="{{ route('entries.show', $et->id) }}"
                                                class="mb-1 btn btn-sm btn btn-primary ">Plus de details</a>
                                            @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2 || Auth::user()->id === $et->user_id)
                                                <a href="{{ route('entries.edit', $et->id) }}"
                                                    class="mb-1 btn btn-sm btn btn-info ">Modifier</a>
                                            @endif
                                            @if (Auth::user()->role_id === 1)
                                                <form action="{{ route('entries.destroy', $et->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="mb-1 btn btn-sm btn btn-danger "
                                                        value="Supprimer">
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
