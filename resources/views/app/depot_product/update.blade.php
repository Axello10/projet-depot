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
    <form action="{{ route('depotproducts.update', $prod->id) }}" method="POST">
        @csrf
        @method('put')
    
        <h3>vous modifiez le produit {{ $prod->name }} (seulement la quantité)</h3>
        
        <div class="">
            <label for="quantity">Quantité</label>
            <input type="number" name="quantity" value="{{ $prod->quantity }}">
        </div>

        <button type="submit">modifier</button>
    </form>
@endsection







{{-- {{($pt->id === ) ? "selected" : "" }} --}}