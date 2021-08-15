@extends('app')
@section('page', 'Login')
@section('content')
    <div class="">
        <h1>Indentify yourself...</h1>
        @if ( $errors->any() )
            {{ $errors }}
        @endif
        <form action="auth" method="POST">
            <input type="text" name="username" id="username">
            <input type="password" name="password" id="password">
            <button type="submit">Connection</button>
        </form>
    </div>
@endsection