@extends('app')
@section('page', 'Nouveau Grade')
@section('content')
    <h2>Ajouter une grade</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('grades.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="name">nom de la grades</label>
            <input type="text" name="name" id="name">
        </div>
        
        <button type="submit">ajouter</button>
    </form>
@endsection