@extends('app')
@section('page', $deposit->name)
@section('content')

        <h2> nom de la grade : {{ $deposit->name }} </h2>
        <ul>
                @foreach ($deposit->products as $pd)
                    {{ $pd->name }}
                @endforeach
        </ul>
@endsection