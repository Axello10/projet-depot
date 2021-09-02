@extends('app')
@section('page', 'Login')
@section('content')
    <div class="">
        <h1>Ajouter un utilisateur...</h1>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        @endif
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="">
                <label for="username">username</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="">
                <label for="fullname">fullname</label>
                <input type="text" name="fullname" id="fullname">
            </div>
            <div class="">
                <label for="email">email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="">
                <label for="image">profile pic</label>
                <input type="file" name="image" id="image">
            </div>
            <div class="">
                <label for="deposit_id">depot associe</label>
                <select name="deposit_id" id="deposit_id">
                    @foreach ($deposits as $dp)
                    <option value="{{ $dp->id }}">{{ $dp->name }}</option>                    
                    @endforeach
                </select>
            </div>
            <div class="">
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">Ajouter</button>
        </form>
    </div>
@endsection