@extends('app')
@section('page', 'employes')
@section('content')

    @if ( count($employes) <= 0)
        <p>aucun employé trouvé</p>
    @else
    <h2>liste de employés</h2>
    <ul>
        @foreach ($employes as $employe)
            <div style="margin: 20px 0px">
                <li> <strong> nom de l'employe </strong> : {{ $employe->user->fullname }} </li>
                <div>
                    <a href="{{ route('employes.show', $employe->id) }}">plus de details</a>

                    <a href="{{ route('employes.edit', $employe->id) }}">modifier</a>

                    <a href="{{ route('employes.destroy', $employe->id) }}">supprimer</a>
                    <form action="{{ route('employes.destroy', $st->id) }}" method="POST">
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