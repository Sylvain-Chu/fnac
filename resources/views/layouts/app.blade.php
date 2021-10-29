<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}" type="image/x-icon">
    <title>Fnac</title>

    <link rel="stylesheet" href="{{ asset('/css/topbar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/styleRayons.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/formulaire.css') }}">




</head>

<body>

    <header>
        <script src="{{asset('/js/tab.js')}}"></script>

    </header>

    @section('nav')
        <div id="menubar">
            <div class="sec1">
                <h1 id="titlebar"><a href="{{ url('/') }}">Fnac</a></h1>
                <form id="formbar" method="GET" action="/recherche">
                    @csrf
                    Rechercher :
                    <input class="borderbar" id="researchbar" type="text" name="q">
                    <input class="borderbar" id="buttonbar" type="submit" value="🔎" value="Recherche...">
                </form>
            </div>
            <div class="sec2">
                <div>
                    @if (Auth::user() != null)
                        <h4 class="items"><a href="{{ url('/') }}">Accueil</a></h4>
                        <h4 class="items"><a href="{{ url('/rayon') }}">Rayons</a></h4>
                        <h4 class="items"><a href="{{ url('/genre') }}">Genres</a></h4>
                        @if (Auth::user()->ach_typeCompte == "communication" || Auth::user()->ach_typeCompte == "admin")
                            <h4 class="items itemsbold"><a href="{{ url('/ajoutRayon') }}">Ajouter un rayon</a></h4>
                            <h4 class="items itemsbold"><a href="{{ url('/avisAbusifs') }}">Voir les avis signalés</a></h4>
                            <h4 class="items itemsbold"><a href="{{ url('/enregistrerPhoto') }}">Enregistrer une photo</a></h4>
                            <h4 class="items itemsbold"><a href="{{ url('/commandes') }}">Consulter les commandes</a></h4>
                        @endif

                        @if(Auth::user()->ach_typeCompte == "admin")
                            <h4 class="items itemsbold"><a href="{{ url('/gererComptes') }}">Gérer comptes</a></h4>
                        @endif
                    @endif
                </div>
            </div>
            <div class="sec3">
                <div>
                    @if (Auth::user() == null)
                        <h4 class="items"><a href="{{ url('/inscription') }}">S'inscrire</a></h4>
                        <h4 class="items"><a href="{{ url('/connexion') }}">Se connecter</a></h4>
                    @else
                        <h4 class="items"><a href="{{ url('/mesCommandes') }}">Mes Commandes</a></h4>
                        <h4 class="items"><a href="{{ url('/formDeconnexion') }}">Se Déconnecter</a></h4>
                        <h4 class="items"><a href="{{ url('/favoris') }}">Favoris</a></h4>
                        <h4 class="items"><a href="{{ url('/monPanier') }}">Mon panier</a></li>
                        <h4 class="items"><a href="{{ url('/dashboard') }}">Dashboard</a></h4>
                    @endif
                </div>
            </div>
        </div>
    @show

    <div class="container">
        @yield('content')
    </div>

</body>

</html>