<h2>all products info---</h2>

@if (count($data) <= 0)
    <p>rien a voir ici</p>
@else
        <ul>
    @foreach ($data as $dt)    
        <li>{{ $dt->name }}</li>
    @endforeach
        </ul>
@endif