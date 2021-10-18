@extends('app')
@section('page', 'dashboard')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-9 px-md-3">
</div>
  <div class="card-body">
    <h1 class="card-title mb-3 "><p class="time" style="display: inline"></p>cher {{ Auth::user()->username }}</h1>
    <p class="card-text note note-primary">
  <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-signpost-2" viewBox="0 0 16 16">
  <path d="M7 1.414V2H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h5v1H2.5a1 1 0 0 0-.8.4L.725 8.7a.5.5 0 0 0 0 .6l.975 1.3a1 1 0 0 0 .8.4H7v5h2v-5h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H9V6h4.5a1 1 0 0 0 .8-.4l.975-1.3a.5.5 0 0 0 0-.6L14.3 2.4a1 1 0 0 0-.8-.4H9v-.586a1 1 0 0 0-2 0zM13.5 3l.75 1-.75 1H2V3h11.5zm.5 5v2H2.5l-.75-1 .75-1H14z"/>
</svg> Utilisez les menus se trouvant sur votre gauche dans la barre de navigation verticale pour trouver l'option necessaire pour réalisez votre tache en utilisant cette application.</p>
    <button class="btn btn-primary" class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"> 👈 Commencez ici!</button>
    
  </div>
</div>
<div class="card  mt-5 mb-3 shadow p-3 mb-5 brounded">
  <div class="card-body">
  <h1 class="card-title mb-3">Tableau De Bord</h1>
  {{-- @if (Auth::user()->role_id === 2)
                
                @endif --}}
    <p class="card-text note note-primary">
      Voici les liens importantes et rapides pour pour réalisez votre tache voulue.
    </p>
    <div class="">
    <a href="{{ route('entries') }}" class="btn btn-primary mb-3">Entree</a>
    <a href="{{ route('exits') }}" class="btn btn-primary mb-3" type="button">Sortie</a>
    <a href="{{ route('products.index') }}" class="btn btn-primary mb-3" type="button">Tout les produit</a>
    @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                    <a href="{{ route('deposits.index') }}"class="btn btn-primary mb-3" type="button">Produit par depot</a>
                    <a href="{{ route('deposits.show', Auth::user()->deposit_id) }}" class="btn btn-primary mb-3" type="button">Produit dans le stock</a>
                    <a href="{{ route('employes.index') }}" class="btn btn-primary mb-3" type="button" >Employés</a>
                @elseif (Auth::user()->role_id === 3)
                   <a href="{{ route('deposits.show', Auth::user()->deposit_id) }}" class="btn btn-primary mb-3" type="button">Produit dans le stock</a>
                @endif
    </div>
  </div>
</div>

</main>

@endsection