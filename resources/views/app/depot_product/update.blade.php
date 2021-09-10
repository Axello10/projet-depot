@extends('app')
@section('page', 'mettre a jour un produit relie au depot')
@section('content')
    <h2>metter a jour produit relie au depot</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('grades.update', $grade->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="">
            <label for="name">nom de la grade</label>
            <input type="text" name="name" id="name" value="{{ $grade->name }}">
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection