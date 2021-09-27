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
            input
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection