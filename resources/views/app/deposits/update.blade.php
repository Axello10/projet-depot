@extends('app')
@section('page', 'mettre a jour un depot')
@section('content')
    <h2>metter a jour un depot</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('deposits.update', $deposit->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="">
            <label for="name">nom du depot</label>
            <input type="text" name="name" id="name" value="{{ $deposit->name }}">
        </div>

        <div class="">
            <label for="grade_id">type de depot</label>
            <select name="grade_id" id="grade_id">
                @foreach ($grades as $gd)
                    <option value="{{ $gd->id }}" {{ ($gd->id === $deposit->grade_id) ? "selected" : "" }}>{{ $gd->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <label for="name">numero du gérant</label>
            <input type="text" name="mobile_number" id="mobile_number" value="{{ $deposit->mobile_number }}">
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection