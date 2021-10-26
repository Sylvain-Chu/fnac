<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}" type="image/x-icon">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/css/topbar.css') }}">
</head>
<body>
    <script src="{{asset('/js/tab.js')}}"></script>
    <div id="menu">
        <div class="sec1">
            <h1 id="title">Fnac</h1>
            <form id="form">
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
</body>