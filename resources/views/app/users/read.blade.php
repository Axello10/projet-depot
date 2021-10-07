@extends('app')
@section('page', 'utilisateur')
@section('content')

    @if ( count($users) <= 0)
        <p>aucun utilisateur trouvé</p>
    @else
    <h2>liste de utilisateurs</h2>
    <ul>
        @foreach ($users as $us)
            <div style="margin: 20px 0px">
                <li> <strong> nom de l'utilisateur </strong> : {{ $us->fullname }} || pseudo : {{ $us->username }} || role : {{ $us->role->name }}</li>
                <div>
                    <a href="{{ route('users.show', $us->id) }}">plus de details</a>

                    <a href="{{ route('users.edit', $us->id) }}">modifier</a>

                    <form action="{{ route('users.destroy', $us->id) }}" method="POST">
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