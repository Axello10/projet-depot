@extends('app')
@section('page', 'mettre a jour un grade')
@section('content')
    <h2>metter a jour un grade</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('grades.update', $product->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="">
            <label for="name">nom de la grade</label>
            <input type="text" name="name" id="name" value="{{ $grade->name }}">
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection