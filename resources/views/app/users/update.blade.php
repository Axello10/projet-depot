@extends('app')
@section('page', 'mettre a jour un utilisateur')
@section('content')
    <h2>metter a jour un utilisateur</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="fullname">nom complet</label>
            <input type="text" name="fullname" id="" value="{{ $user->fullname }}">
        </div>

        <div>
            <label for="email">email</label>
            <input type="text" name="email" id="" value="{{ $user->email }}">
        </div>

        <div>
            <label for="password">mot de passe</label>
            <input type="text" name="password" placeholder="***********">
        </div>

        <div>
            <label for="role_id">role</label>
            <select name="role_id" id="">
                @foreach ($roles as $rl)
                    <option value="{{ $rl->id }}">{{ $rl->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="fullname">nom d'utilisateur</label>
            <input type="text" name="username" id="" value="{{ $user->username }}">
        </div>

        <div>
            <label for="fullname">nom du depot</label>
            <select name="deposit_id" id="">
                @foreach ($deposits as $dp)
                    <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection