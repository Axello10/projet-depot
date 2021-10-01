@extends('app')
@section('page', $employe->user->fullname)
@section('content')

        <h2> nom de l'employe : {{ $employe->user->fullname }} </h2>
        <p>role dans le sys : {{ $employe->user->role->name }}</p>
        <p>salaire par mois : {{ $employe->salary }} Fbu</p>
        <p>adresse : {{ (empty($employe->adress)) ? "inconnue" : $employe->adress }}</p>
        <p>numero de telephone : {{ (empty($employe->mobile_number)) ? "inconnue" : $employe->mobile_number }}</p>

@endsection