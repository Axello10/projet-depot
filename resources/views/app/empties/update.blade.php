@extends('app')
@section('page', 'mettre a jour un client')
@section('content')
    <h2>metter a jour un client</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="">
            <label for="name">nom du client</label>
            <input type="text" name="name" id="name" value="{{ $client->name }}">
        </div>

        <div class="">
            <label for="adress">adresse du client</label>
            <input type="text" name="adress" id="adress" value="{{ $client->adress }}">
        </div>

        <div class="">
            <label for="mobile_number">numero du client</label>
            <input type="text" name="mobile_number" id="mobile_number" value="{{ $client->mobile_number }}">
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection