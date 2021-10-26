<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}" type="image/x-icon">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/css/topbar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/styleRayons.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/formulaire.css') }}">




</head>

<body>

    <header>
        <div>
            <h2>Panier</h2>
            <?php
                var_dump(session("panier"));
            ?>
        </div>

    </header>

    @section('nav')
        <div id="menu">
            <script src="{{asset('/js/tab.js')}}"></script>
            <ul id="menuoptions">
                <li class="menuli"><a id="jaunelink" href="{{ url('/') }}">Accueil</a></li>
                <li class="menuli"><a id="jaunelink" href="{{ url('/rayon') }}">Rayons</a></li>
                <li class="menuli"><a id="jaunelink" href="{{ url('/genre') }}">Genre</a></li>
                @if (Auth::user() != null)
                    @if (Auth::user()->ach_id == 1)
                        <li class="menuli"><a id="jaunelink" href="{{ url('/ajoutRayon') }}">Ajouter un rayon</a>
                        </li>
                        <li class="menuli"><a id="jaunelink" href="{{ url('/avisAbusifs') }}">Voir les avis
                                signaler</a></li>
                        <li class="menuli"><a id="jaunelink" href="{{ url('/enregistrerPhoto') }}">Enregistrer une
                                photo</a></li>
                        <li class="menuli"><a id="jaunelink" href="{{ url('/commandes') }}">Consulter les
                                commandes</a></li>
                    @endif
                @endif
                <li class="menuli">
                    <form method="GET" action="/recherche">
                        @csrf
                        Rechercher :
                        <input type="text" name="q">
                        <input type="submit" value="🔎" value="Recherche...">
                    </form>

                </li>
                <li id="titre">
                    <h1>@yield('title')</h1>
                </li>


                @if (Auth::user() == null)
                    <li class="login menuli"><a id="jaunelink" href="{{ url('/inscription') }}">S'inscrire</a></li>
                    <li class="login menuli"><a id="jaunelink" href="{{ url('/connexion') }}">Se connecter</a></li>
                @else

                    <li class="login menuli"><a id="jaunelink" href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="login menuli"><a id="jaunelink" href="{{ url('/favoris') }}">Favoris</a>
                    <li class="login menuli"><a id="jaunelink" href="{{ url('/formDeconnexion') }}">Se déconnecter</a>
                    <li class="login menuli"><a id="jaunelink" href="{{ url('/mesCommandes') }}">Mes commandes</a></li>
                    </li>
                @endif



            </ul>
        </div>
    @show

    <div class="container">
        @yield('content')
    </div>

</body>

</html>








































<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}" type="image/x-icon">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/css/topbar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/styleRayons.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/formulaire.css') }}">




</head>

<body>

    <header>
        <div>
            <h2>Panier</h2>
            <?php
                var_dump(session("panier"));
            ?>
        </div>

    </header>

    @section('nav')
        <script src="{{asset('/js/tab.js')}}"></script>
        <div id="menu">
            <div class="sec1">
                <h1 id="title">@yield('title')</h1>
                <form id="form" method="GET" action="/recherche">
                    @csrf
                    Rechercher :
                    <input class="border" type="text" name="q">
                    <input class="border" type="submit" value="🔎" value="Recherche...">
                </form>
            </div>
            <div class="sec2">
                <div>
                    <h4 class="items"><a href="{{ url('/') }}">Accueil</a></h4>
                    <h4 class="items"><a href="{{ url('/rayon') }}">Rayons</a></h4>
                    <h4 class="items"><a href="{{ url('/genre') }}">Genres</a></h4>
                </div>
            </div>
            @if (Auth::user() == null)
            @else
            <div class="sec3">
                <div>
                    <h4 class="items"><a href="{{ url('/mesCommandes') }}">Mes Commandes</a></h4>
                    <h4 class="items"><a href="{{ url('/formDeconnexion') }}">Se Déconnecter</a></h4>
                    <h4 class="items"><a href="{{ url('/favoris') }}">Favoris</a></h4>
                    <h4 class="items"><a href="{{ url('/dashboard') }}">Dashboard</a></h4>
                </div>
            </div>
            @endif
        </div>





        {{--<div id="menu">
                <li class="menuli"><a id="jaunelink" href="{{ url('/') }}">Accueil</a></li>
                <li class="menuli"><a id="jaunelink" href="{{ url('/rayon') }}">Rayons</a></li>
                <li class="menuli"><a id="jaunelink" href="{{ url('/genre') }}">Genre</a></li>
                @if (Auth::user() != null)
                    @if (Auth::user()->ach_id == 1)
                        <li class="menuli"><a id="jaunelink" href="{{ url('/ajoutRayon') }}">Ajouter un rayon</a>
                        </li>
                        <li class="menuli"><a id="jaunelink" href="{{ url('/avisAbusifs') }}">Voir les avis
                                signaler</a></li>
                        <li class="menuli"><a id="jaunelink" href="{{ url('/enregistrerPhoto') }}">Enregistrer une
                                photo</a></li>
                        <li class="menuli"><a id="jaunelink" href="{{ url('/commandes') }}">Consulter les
                                commandes</a></li>
                    @endif
                @endif
                <li class="menuli">
                    <form method="GET" action="/recherche">
                        @csrf
                        Rechercher :
                        <input type="text" name="q">
                        <input type="submit" value="🔎" value="Recherche...">
                    </form>

                </li>
                <li id="titre">
                    <h1>@yield('title')</h1>
                </li>


                @if (Auth::user() == null)
                    <li class="login menuli"><a id="jaunelink" href="{{ url('/inscription') }}">S'inscrire</a></li>
                    <li class="login menuli"><a id="jaunelink" href="{{ url('/connexion') }}">Se connecter</a></li>
                @else

                    <li class="login menuli"><a id="jaunelink" href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="login menuli"><a id="jaunelink" href="{{ url('/favoris') }}">Favoris</a>
                    <li class="login menuli"><a id="jaunelink" href="{{ url('/formDeconnexion') }}">Se déconnecter</a>
                    <li class="login menuli"><a id="jaunelink" href="{{ url('/mesCommandes') }}">Mes commandes</a></li>
                    </li>
                @endif
        </div>--}}
    @show

    <div class="container">
        @yield('content')
    </div>

</body>

</html>
