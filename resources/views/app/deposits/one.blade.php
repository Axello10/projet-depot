@extends('app')
@section('page', $deposit->name)
@section('content')

        <h2> nom du depot : {{ $deposit->name }} </h2>
        @if (Auth::user()->deposit_id === $deposit->id)
            <a href="{{ route('depotproducts.create') }}">ajouter un produit dans le stock</a>            
        @endif
        <ul>
            @if(count($products) <= 0)
                <p>pas de produits dans le stock!</p>
            @else
                @foreach ($products as $product)
                        <div class="" style="border: 2px dashed black">
                            <p><strong>{{ $product->name }}</strong></p>
                            <p>la quantité :
                                @foreach ($deproducts as $dp)
                                    @if ($dp->product_id === $product->id)
                                        {{ $dp->quantity }}
                                        @if (Auth::user()->deposit_id === $deposit->id)
                                            <a href="{{ route('depotproducts.edit', $dp->id) }}">modifier le produit dans le stock</a>
                                        @endif
                                    @endif
                                @endforeach
                            </p>
                        </div>
                @endforeach
            @endif
        </ul>
@endsection


{{-- {{ ($product->quantity <= 0) ? "non disponible (0)" : $product->quantity }} --}}