<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $_ENV['APP_NAME'] }} - @yield('page')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

    </style>
</head>
<body>
    @auth
    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('dashboard') }}">{{ $_ENV['APP_NAME'] }}</a>
        
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
  
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->username }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">logout</a></li>
                    </ul>
                </div>
            
        </header>
        
        <div class="dashboard-links">
            <h1>Tableau De Bord</h1>
            {{-- @if (Auth::user()->role_id === 2)
                
            @endif --}}
            <ul>
                <li><a href="{{ route('products.index') }}">tout les produit</a></li>
                <li><a href="{{ route('entries') }}">entree</a></li>
                <li><a href="{{ route('exits') }}">sortie</a></li>
                @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                    <li><a href="{{ route('deposits.index') }}">produit par depot</a></li>
                    <li><a href="{{ route('deposits.show', Auth::user()->deposit_id) }}">produit dans le stock</a></li>                
                @elseif (Auth::user()->role_id === 3)
                    <li><a href="{{ route('deposits.show', Auth::user()->deposit_id) }}">produit dans le stock</a></li>
                @endif
    
            </ul>
            {{-- <ul>
                <li>
                    <h2>utilisateur</h2>
                    <ul>
                        @can('create', Auth::user())
                            <li><a href="{{ route('users.create') }}">ajouter un utilisateur</a></li>
                            <li><a href="{{ route('users.index') }}">voir les utilisateurs</a></li>
                        @else
                            <p>t'es pas autorisé!</p>
                        @endcan
                    </ul>
                </li>
    
                <li>
                    <h2>entrees</h2>
                    <ul>
                        <li><a href="{{ route('entries.index') }}">voir les entrees</a></li>
                        <li><a href="{{ route('entries.create') }}">ajouter une entrees</a></li>
                    </ul>
                </li>
    
                <li>
                    <h2>sorties</h2>
                    <ul>
                        <li><a href="{{ route('sorties.index') }}">voir les sorties</a></li>
                        <li><a href="{{ route('sorties.create') }}">ajouter une sortie</a></li>
                    </ul>
                </li>
    
                <li>
                    <h2>vendeurs</h2>
                    <ul>
                        <li><a href="{{ route('vendors.index') }}">voir les vendeurs</a></li>
                        <li><a href="{{ route('vendors.create') }}">ajouter un vendeur</a></li>
                    </ul>
                </li>
                <li>
                    <h2>clients</h2>
                    <ul>
                        <li><a href="{{ route('clients.index') }}">voir les clients</a></li>
                        <li><a href="{{ route('clients.create') }}">ajouter un client</a></li>
                    </ul>
                </li>
                
                <li>
                    <h2>produits</h2>
                    @can(['viewAny'], [Auth::user(), Product::class])
                    <ul>
                        <li><a href="{{ route('products.index') }}">voir les produits</a></li>
                        {{-- <li><a href="{{ route('products.create') }}">ajouter un produit</a></li> --}}
                    {{-- </ul>
                    @elsecan('create', [Auth::user(), App\Models\product::class])
                        <li><a href="{{ route('products.create') }}">ajouter un produit</a></li>
                    @else
                        <p>pas autorisé!</p>
                    @endcan
                </li>
                <li>
                    <h2>depots</h2>
                    <ul>
                        <li><a href="{{ route('deposits.index') }}">voir les depots</a></li>
                        <li><a href="{{ route('deposits.create') }}">ajouter un depots</a></li>
                    </ul>
                </li>
                <li>
                    <h2>grades</h2>
                    <ul>
                        <li><a href="{{ route('grades.index') }}">voir les grades</a></li>
                        <li><a href="{{ route('grades.create') }}">ajouter une grades</a></li>
                    </ul>
                </li>
    
                <li>
                    <h2>vides</h2>
                    <ul>
                        <li><a href="{{ route('empties.index') }}">voir les vides</a></li>
                        <li><a href="{{ route('empties.create') }}">ajouter un vide</a></li>
                    </ul>
                </li>
    
                <li>
                    <h2>dettes de vides</h2>
                    <ul>
                        <li><a href="{{ route('givebacks.index') }}">voir les dettes de vides</a></li>
                        <li><a href="{{ route('givebacks.create') }}">ajouter une dette de vides</a></li>
                    </ul>
                </li>
            </ul> --}}
        
        </div>
    
    @yield('content')
    @endauth
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</body>
</html>