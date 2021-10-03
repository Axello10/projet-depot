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
    <form action="{{ route('depotproducts.update', $depotproduct->id) }}" method="POST">
        @csrf
        @method('put')
    
        <h3>vous modifiez le produit {{ $product->name }} (seulement la quantité)</h3>

        <p>choisissez le type de modification a faire <strong>*important!</strong></p>
        <select name="choice" id="">
            <option value="add">augmenter</option>
            <option value="subtract">diminuer</option>
        </select>
        
        <div class="">
            <label for="quantity">Quantité</label>
            <input type="number" name="quantity" value="{{ $depotproduct->quantity }}">
        </div>
        
        <button type="submit">modifier</button>
    </form>
@endsection