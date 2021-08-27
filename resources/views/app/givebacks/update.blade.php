@extends('app')
@section('page', 'mettre a jour une dette de vide')
@section('content')
    
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    <form action="{{ route('givebacks.update', $giveback->id) }}" method="post">
        @csrf
        @method('put')
        <div class="">
            <select name="vendor_id" id="vendor_id">
                @foreach ($vendors as $vd)
                    <option value="{{ $vd->id }}">{{ $vd->name }}</option>
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

        <input type="number" name="quantity" id="quantity" value="{{ $giveback->quantity }}">

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