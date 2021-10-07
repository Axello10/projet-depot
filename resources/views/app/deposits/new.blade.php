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
            <label for="name">nom du depot</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="">
            <label for="grade_id">type de depot</label>
            <select name="grade_id" id="grade_id">
                @foreach ($grades as $gd)
                    <option value="{{ $gd->id }}">{{ $gd->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <label for="name">numero du gérant</label>
            <input type="text" name="mobile_number" id="mobile_number">
        </div>
        
        <button type="submit">ajouter</button>
    </form>
@endsection