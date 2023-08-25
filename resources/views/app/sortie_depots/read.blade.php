@extends('app')
@section('page', 'sortie')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="display-4"> Sortie pour les depots </h1>
        </div>
        <a href="{{ route('sdeposits.create') }}" class="btn btn-primary mb-3">Fournir un depot</a>
        @if (count($sdeposits) <= 0)
            <p class="alert alert-info">Aucun sortie trouvé</p>
        @else
            <div class="card  shadow p-3 mb-5 brounded ">
                <div class="card-header  text-center text-dark alert-primary ">
                    <h3> Liste de sortie </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped " id="table_id">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom du produit</th>
                                    <th scope="col">source</th>
                                    <th scope="col">nom du depot</th>
                                    <th scope="col">utilisateur</th>
                                    <th scope="col">quantité</th>
                                    <th scope="col">date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($sdeposits as $sd)
                                    <tr>
                                        <th scope="row"><small><?php $i++;
                                        echo "$i"; ?></small></th>
                                        <td> <strong> {{ $sd->product->name }}</strong> </td>
                                        <td> <strong> {{ $sd->from_deposit->name }}</strong> </td>
                                        <td> <strong> {{ $sd->deposit->name }}</strong> </td>
                                        <td> <strong> {{ $sd->user->fullname }}</strong> </td>
                                        <td> <strong> {{ $sd->quantity }}</strong> </td>
                                        <td> <strong> {{ $sd->created_at->format('d M') }}</strong> </td>
                                        <td>
                                            @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2 || Auth::user()->id === $sd->user_id)
                                                <a href="{{ route('sdeposits.edit', $sd->id) }}"
                                                    class="btn btn-sm btn-info  mb-1">Modifier</a>
                                            @endif
                                            @if (Auth::user()->role_id === 1)
                                                <form action="{{ route('sdeposits.destroy', $sd->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-sm btn-danger  mb-1"
                                                        value="Supprimer">
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
