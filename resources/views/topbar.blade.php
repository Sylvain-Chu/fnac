<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}" type="image/x-icon">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/css/affiche.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/topbar.css') }}">
</head>
<body>
    <script src="{{asset('/js/affiche.js')}}"></script>
    <script src="{{asset('/js/tab.js')}}"></script>
    <div id="menubar">
        <div class="sec1">
            <h1 id="titlebar"><a>Fnac</a></h1>
            <form id="formbar">
                @csrf
                Rechercher :
                <input class="border" type="text" name="q">
                <input class="border" type="submit" value="🔎" value="Recherche...">
            </form>
        </div>
        <div class="sec2">
            <div>
                <h4 class="items"><a>Accueil</a></h4>
                <h4 class="items"><a>Rayons</a></h4>
                <h4 class="items"><a>Genres</a></h4>
            </div>
        </div>
        <div class="sec3">
            <div>
                <h4 class="items"><a>Mes Commandes</a></h4>
                <h4 class="items"><a>Se Déconnecter</a></h4>
                <h4 class="items"><a>Favoris</a></h4>
                <h4 class="items"><a>Dashboard</a></h4>
            </div>
        </div>
    </div>
    <h1 id="titleaffiche">Musiques à l'affiche</h1>
    <div id="sliderbox">
        <div id="slide1" class="slot1">
            <div class="sliderform">
                <div>
                    <h1>COSMOPOLITANIE</h1>
                    <h2>2020-03-10</h2>
                    <h3>Rap</h3>
                    <h4>Universal</h4>
                    <h5>Soprano</h5>
                    <h6>16,99€</h6>
                </div>
            </div>
        </div>
        <div id="slide2" class="slot2">
            <h1>Lorem2</h1>
            <h1>Ipsum2</h1>
            <h1>Dolor2</h1>
            <h1>Sit2</h1>
        </div>
        <div id="slide3" class="slot3">
            <h1>Lorem3</h1>
            <h1>Ipsum3</h1>
            <h1>Dolor3</h1>
            <h1>Sit3</h1>
        </div>
        <div id="slide4" class="slot4">
            <h1>Lorem4</h1>
            <h1>Ipsum4</h1>
            <h1>Dolor4</h1>
            <h1>Sit4</h1>
        </div>
        <div id="slide5" class="slot0">
            <h1>Lorem5</h1>
            <h1>Ipsum5</h1>
            <h1>Dolor5</h1>
            <h1>Sit5</h1>
        </div>
    </div>
</body>