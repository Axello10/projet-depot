@extends('app')
@section('page', 'erreur serveur')
@section('content')
    
    erreur le serveur ne peut repondre correctement

    <ul>
        <li>verifier le lien</li>
        <li>verifier ta connection</li>
        <li> appel l'administrateur du systeme</li>
    </ul>

    <a href="{{ route('dashboard') }}">retourner a la page d'accueil</a>
    <p>merci!</p>

@endsection