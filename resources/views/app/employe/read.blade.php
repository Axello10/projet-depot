@extends('app')
@section('page', 'employes')
@section('content')

    <h2>liste de employés</h2>
    <a href="{{ route('employes.create') }}">ajouter un employe</a>
    @if ( count($employes) <= 0)
        <p>aucun employé trouvé</p>
    @else
    <ul>
        @foreach ($employes as $employe)
            <div style="margin: 20px 0px">
                <li> <strong> nom de l'employe </strong> : {{ $employe->user->fullname }} </li>
                <div>
                    <a href="{{ route('employes.show', $employe->id) }}">plus de details</a>

                    <a href="{{ route('employes.edit', $employe->id) }}">modifier</a>

                    <form action="{{ route('employes.destroy', $employe->id) }}" method="POST">
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