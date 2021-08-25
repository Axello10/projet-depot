@extends('app')
@section('page', 'Nouveau vendeur')
@section('content')
    <h2>Ajouter un vendeur</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('vendors.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="name">nom du vendeur</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="">
            <label for="adress">adresse du vendeur</label>
            <input type="text" name="adress" id="adress"></div>
        <div class="">
            <label for="mobile_number">numero du vendeur</label>
            <input type="text" name="mobile_number" id="mobile_number">
        </div>

        <button type="submit">ajouter</button>
    </form>
@endsection