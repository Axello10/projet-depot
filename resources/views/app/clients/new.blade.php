@extends('app')
@section('page', 'Nouveau Client')
@section('content')
    <h2>Ajouter un client</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="name">nom du client</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="">
            <label for="grade_id">type de client</label>
            <select name="grade_id" id="grade_id">
                @foreach ($grades as $gd)
                    <option value="{{ $gd->id }}">{{ $gd->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <label for="adress">adresse du client</label>
            <input type="text" name="adress" id="adress">
        </div>

        <div class="">
            <label for="mobile_number">numero du client</label>
            <input type="text" name="mobile_number" id="mobile_number">
        </div>
        
        <button type="submit">ajouter</button>
    </form>
@endsection