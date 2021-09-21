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
    <form action="" method="POST">
        @csrf
        @method('put')
        <div class="">
            {{ $oneproduct }}
            {{-- <label for="name">nom du produit</label>
            <select name="product_id" id="product_id">
                @foreach ($products as $pt)
                    <option value="{{ $pt->id }}" {{($pt->id === ) ? "selected" : "" }}>{{ $pt->name }}</option>
                @endforeach
            </select> --}}
        </div>
        
        {{-- <div class="">
            <label for="quantity">quantité</label>
            <input type="number" name="quantity" id="" value="{{ $product->quantity }}">
        </div> --}}

        <button type="submit">modifier</button>
    </form>
@endsection