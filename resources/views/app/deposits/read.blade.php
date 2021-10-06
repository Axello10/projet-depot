@extends('app')
@section('page', 'depots')
@section('content')

    @if ( count($deposits) <= 0)
        <p>aucun depot trouvé</p>
    @else
    <h2>liste de depots</h2>
    <ul>
        @foreach ($deposits as $dp)
            <div style="margin: 20px 0px">
                <li> <strong> nom du depot </strong> : {{ $dp->name }} </li>
                <div>
                    <a href="{{ route('deposits.show', $dp->id) }}">plus de details</a>

                    <a href="{{ route('deposits.edit', $dp->id) }}">modifier</a>
                    
                    <form action="{{ route('deposits.destroy', $dp->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="supprimer">
                    </form>
                </div>
                
            </div>
        @endforeach
    </ul>
    @endif
    
@endsection