@extends('app')
@section('page', 'Login')
@section('content')
    <div class="">
        <h1>Indentify yourself...</h1>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        @endif
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <input type="text" name="username" id="username">
            <input type="text" name="fullname" id="fullname">
            <input type="email" name="email" id="email">
            <input type="file" name="image" id="image">
            <select name="role_id" id="role">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <input type="password" name="password" id="password">
            <button type="submit">Connection</button>
        </form>
    </div>
@endsection