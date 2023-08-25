<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $_ENV['APP_NAME'] }} - @yield('page')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

    <link rel="stylesheet" href="app.css">

    <style>
        .feather {
            width: 16px;
            height: 16px;
            vertical-align: text-bottom
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset 2px 2px 2px rgba(0, 0, 0, .3)
        }

        @media (max-width:767.98px) {
            .sidebar {
                top: 5rem
            }
        }

        .position-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow: auto
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333
        }

        .sidebar .nav-link .feather {
            margin-right: 4px
        }

        .sidebar .nav-link.active {
            color: #2470dc
        }

        .sidebar .nav-link.active .feather,
        .sidebar .nav-link:hover .feather {
            color: inherit
        }

        .sidebar-heading {
            text-transform: uppercase
        }

        span {
            font-size: 1.1rem
        }

        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: 1.1rem
        }

        .navbar .navbar-toggler {
            top: .25rem;
            right: 1rem
        }

        .navbar .form-control {
            padding: .75rem 1rem;
            border-width: 0;
            border-radius: 0
        }

        .form-control-dark {
            color: #fff;
            background-color: #0d6efd;
            border-color: rgba(255, 255, 255, .1)
        }

        .form-control-dark:focus {
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25)
        }

        .span_title2 {
            font-size: 17px;
            text-transform: capitalize
        }

        .nav-item span:hover {
            cursor: pointer;
            width: 80%;
            border-bottom: 2px solid #0d6efd;
            color: #0d6efd
        }

        svg {
            color: inherit
        }
    </style>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    {{-- stoping site from getting indexed --}}
    <meta name="robots" content="noindex, nofollow">
    {{-- done --}}
</head>

<body>
    @auth
        <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow ">
            <a class="navbar-brand col-md-3 col-lg-2  me-0 px-3" href="{{ route('dashboard') }}">{{ $_ENV['APP_NAME'] }} -
                ({{ auth()->user()->deposit->name }})
            </a>

            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="me-3 dropdown-toggle d-flex align-items-center hidden-arrow">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-mdb-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->username }} - {{ auth::user()->role->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">dashboard</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">logout</a></li>
                </ul>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block bg-light sidebar collapse">
                    @can('create', Auth::user())
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('users.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-person-plus" viewBox="0 0 16 16">
                                        <path
                                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        <path fill-rule="evenodd"
                                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                    </svg>

                                    <span class="ml-2">Utilisateurs</span>
                                </a>
                            </li>
                            </h6>
                        @endcan
                    </ul>

                    {{-- employer --}}
                    <ul class="nav flex-column">
                        @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{ route('employes.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                        <path
                                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                    </svg>
                                    <span class="ml-2">Employer</span>
                                </a>
                            </li>
                        @endif

                    </ul>

                    {{-- entree --}}
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('entries.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                    <polyline points="13 2 13 9 20 9"></polyline>
                                </svg>
                                <span class="ml-2">Entrees</span>
                            </a>
                        </li>
                    </ul>

                    {{-- sorties --}}

                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sorties.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>
                                <span class="ml-2">Sorties</span>
                            </a>
                        </li>
                    </ul>

                    {{-- sorties simple --}}

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('simplexits.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>
                                <span class="ml-2">Sortie simples</span>
                            </a>
                        </li>
                    </ul>

                    {{-- ravittailler un depot --}}


                    <ul class="nav flex-column">
                        @if (Auth::user()->role_id === 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sdeposits.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                        <path
                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                        <path
                                            d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                    </svg>
                                    <span class="ml-2">Fournir un depot</span>
                                </a>
                            </li>
                        @endif
                    </ul>

                    {{-- vides par depot --}}

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('estocks.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>
                                <span class="ml-2">Vides dans le depot</span>
                            </a>
                        </li>
                    </ul>

                    {{-- fournisseurs --}}

                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vendors.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>
                                <span class="ml-2">Fournisseurs</span>
                            </a>
                        </li>
                    </ul>

                    {{-- clients --}}

                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('clients.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>
                                <span class="ml-2">Clients</span>
                            </a>
                        </li>
                    </ul>

                    {{-- produits --}}

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>
                                <span class="ml-2">Produits</span>
                            </a>
                        </li>

                    </ul>

                    {{-- cas rares --}}

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rarecases.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>
                                <span class="ml-2">Cas Rare</span>
                            </a>
                        </li>

                    </ul>

                    {{-- deposit --}}

                    @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('deposits.show', auth()->user()->deposit->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                        <path
                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                        <path
                                            d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                    </svg>
                                    <span class="ml-2">Voir mon dépot</span>
                                </a>
                            </li>
                        </ul>
                    @else
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('deposits.show', Auth::user()->deposit_id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                        <path
                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                        <path
                                            d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                    </svg>
                                    <span class="ml-2">Produit dans le stock</span>
                                </a>
                            </li>
                        </ul>
                    @endif

                    {{-- vides --}}

                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('empties.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>
                                <span class="ml-2">Vides</span>
                            </a>
                        </li>
                    </ul>

                    {{-- vides a rendre --}}

                    <ul class="nav flex-column">
                        <li class="nav-item mb-5">
                            <a class="nav-link" href="{{ route('givebacks.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0  1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>
                                <span class="ml-2">Vides a rendre</span>
                            </a>
                        </li>
                    </ul>
            </div>
            <br>
            </nav>
        </div>
        </div>
        @yield('content')
    @endauth
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    <!-- datatable -->


    {{-- importation of chartjs --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js" defer></script> --}}
    {{-- end of importation --}}

    {{-- <script src="app.js" defer></script> --}}

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
    <!-- fin datatable -->
    <script type="text/javascript">
        let date = new Date();
        let time_container = document.querySelector('.time');
        let word = "";
        if (date.getHours() >= 0 && date.getHours() <= 12) {
            word = "Bonjour "
        } else if (date.getHours() >= 13 && date.getHours() <= 18) {
            word = "Bon apres-midi "
        } else {
            word = "Bonsoir "
        }
        time_container.textContent = word
    </script>
</body>

</html>
