@extends('app')
@section('page', 'vendeurs')
@section('content')

    @if ( count($vendors) <= 0)
        <p>aucun vendeur trouvé</p>
    @else
    <h2>liste de vendeurs</h2>
    <ul>
        @foreach ($vendors as $vd)
            <div style="margin: 20px 0px">
                <li> <strong> nom du vendeur </strong> : {{ $vd->name }} </li>
                <li> <strong> adress </strong> : {{ $vd->adress }} </li>
                <div>
                    <a href="{{ route('vendors.show', $vd->id) }}">plus de details</a>

                    <a href="{{ route('vendors.edit', $vd->id) }}">modifier</a>

                    <a href="{{ route('vendors.destroy', $vd->id) }}">supprimer</a>
                </div>
                
            </div>
        @endforeach
    </ul>
    @endif
    
@endsection