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
            <div class="">
                <label for="deposit_id">depot associe</label>
                <select name="deposit_id" id="deposit_id">
                    @foreach ($deposits as $dp)
                    <option value="{{ $dp->id }}">{{ $dp->name }}</option>                    
                    @endforeach
                </select>
            </div>
            <input type="password" name="password" id="password">
            <button type="submit">Connection</button>
        </form>
    </div>
@endsection