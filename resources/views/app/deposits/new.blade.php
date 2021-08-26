@extends('app')
@section('page', 'Nouveau Depot')
@section('content')
    <h2>Ajouter un depot</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('deposits.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="name">nom de la grades</label>
            <input type="text" name="name" id="name">
        </div>
        
        <button type="submit">ajouter</button>
    </form>
@endsection