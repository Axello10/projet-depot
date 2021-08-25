@extends('app')
@section('page', 'mettre a jour un vendeur')
@section('content')
    <h2>metter a jour un vendeur</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('vendors.update', $vendor->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="">
            <label for="name">nom du vendeur</label>
            <input type="text" name="name" id="name" value="{{ $vendor->name }}">
        </div>
        <div class="">
            <label for="adress">adresse du vendeur</label>
            <input type="text" name="adress" id="adress" value="{{ $vendor->adress }}">
        </div>
        <div class="">
            <label for="mobile_number">numero du vendeur</label>
            <input type="text" name="mobile_number" id="mobile_number" value="{{ $vendor->mobile_number }}">
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection