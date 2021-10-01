@extends('app')
@section('page', 'Nouveau employe')
@section('content')
    <h2>Ajouter un employer</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('employes.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="user_id">nom de l'employer</label>
            <select name="user_id" id="">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <label for="salary">salaire mensuel</label>
            <input type="number" name="salary">
        </div>
        <div class="">
            <label for="adress">adresse</label>
            <input type="text" name="adress">
        </div>
        <div class="">
            <label for="mobile_number">numero de telephone</label>
            <input type="text" name="mobile_number">
        </div>
        
        <button type="submit">ajouter</button>
    </form>
@endsection