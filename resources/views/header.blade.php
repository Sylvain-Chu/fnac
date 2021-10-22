<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" type="text/css" href="{{asset('/css/tab.css')}}">
    </head>
    <header>
        <script src="{{asset('/js/tab.js')}}"></script>
        <div id="topbar">
            <div id="imgdiv">
                <div>
                    <div></div>
                </div>
            </div>
            <div id="research">
                <h1>Rayons</h1>
                <input type="text" class="no-outline" placeholder="Rechercher un produit">
                <button type="button"></button>
            </div>
            <div class="tabhover">
                <div class="tabicon" id="dot"></div>
            </div>
            <div class="tabhover">
                <div class="baricon">
                    <div class ="tabicon" id="shops"></div>
                    <h1>Magasins</h1>
                </div>
            </div>
            <div class="tabhover">
                <div class="baricon">
                    <div class ="tabicon" id="connect"></div>
                    <h1>Me connecter</h1>
                </div>
            </div>
            <div class="tabhover">
                <div class="baricon">
                    <div class ="tabicon" id="cart"></div>
                    <h1>Mon panier</h1>
                </div>
            </div>
        </div>
    </header>
    <body>

 