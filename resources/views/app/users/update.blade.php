@extends('app')
@section('page', 'modifier un utilisateur')
@section('content')
    <main class="col-md-7 ms-sm-auto col-lg-9 px-md-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="display-4"> Utilisateur </h1>
        </div>
        <div class="card mt-5 shadow p-3 mb-5 brounded">
            <div class="card-header alert-primary text-center text-dark">
                <h1>Modifier un utilisateur</h1>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form class="row g-6" action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="col-md-12 ">
                        <label class="form-label" for="fullname">Nom complet</label>
                        <input class="form-control" type="text" name="fullname" id=""
                            value="{{ $user->fullname }}">
                    </div>
                    <div class="col-md-12 ">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="text" name="email" id=""
                            value="{{ $user->email }}">
                    </div>
                    <div class="col-md-12 ">
                        <label class="form-label" for="fullname">Nom d'utilisateur</label>
                        <input class="form-control" type="text" name="username" id=""
                            value="{{ $user->username }}">
                    </div>
                    <div class="col-md-12 ">
                        <label class="form-label" for="password">Mot de passe</label>
                        <input class="form-control" type="text" name="password" placeholder="***********">
                    </div>
                    <div class="col-md-6 ">
                        <label class="form-label" for="role_id">Rôle</label>
                        <select name="role_id" class="form-select" aria-label="Default select example">
                            @foreach ($roles as $rl)
                                <option value="{{ $rl->id }}" {{ $rl->id === $user->role_id ? 'selected' : '' }}>
                                    {{ $rl->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 ">
                        <label class="form-label" for="fullname">Nom du dépot</label>
                        <select name="deposit_id" id="" class="form-select" aria-label="Default select example">
                            @foreach ($deposits as $dp)
                                <option value="{{ $dp->id }}" {{ $dp->id === $user->deposit_id ? 'selected' : '' }}>
                                    {{ $dp->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
