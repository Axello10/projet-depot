@extends('app')
@section('page', 'mettre a jour un employer')
@section('content')
    <h2>metter a jour un employer</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('employes.update', $employe->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="">
            <label for="user_id">nom de l'employer</label>
            <select name="user_id" id="">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ ($user->id === $employe->user_id) ? "selected" : "" }}>{{ $user->fullname }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <label for="salary">salaire mensuel</label>
            <input type="number" name="salary" value="{{ $employe->salary }}">
        </div>
        <div class="">
            <label for="adress">adresse</label>
            <input type="text" name="adress" value="{{ $employe->adress }}">
        </div>
        <div class="">
            <label for="mobile_number">numero de telephone</label>
            <input type="text" name="mobile_number" value="{{ $employe->mobile_number }}">
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection