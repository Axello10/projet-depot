@extends('app')
@section('page', 'grades')
@section('content')

    @if ( count($grades) <= 0)
        <p>aucun grade trouvé</p>
    @else
    <h2>liste de grades</h2>
    <ul>
        @foreach ($grades as $gd)
            <div style="margin: 20px 0px">
                <li> <strong> nom de la grade </strong> : {{ $gd->name }} </li>
                <div>
                    <a href="{{ route('grades.show', $gd->id) }}">plus de details</a>

                    <a href="{{ route('grades.edit', $gd->id) }}">modifier</a>

                    <form action="{{ route('grades.destroy', $gd->id) }}" method="POST">
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