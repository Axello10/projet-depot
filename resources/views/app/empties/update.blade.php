@extends('app')
@section('page', 'mettre a jour un vide')
@section('content')
    
    <form action="{{ route('empties.update', $emptie->id) }}" method="post">
        @csrf
        @method('put')
        <div class="">
            <select name="client_id" id="client_id">
                @foreach ($clients as $cl)
                    <option value="{{ $cl->id }}">{{ $cl->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <select name="product_id" id="product_id">
                @foreach ($products as $pd)
                    <option value="{{ $pd->id }}">{{ $pd->name }}</option>
                @endforeach
            </select>
        </div>

        <input type="number" name="quantity" id="quantity">

        <div class="">
            <select name="deposit_id" id="deposit_id">
                @foreach ($deposits as $dp)
                    <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">modifier</button>
    </form>

@endsection