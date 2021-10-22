@extends('layouts.app')

@section('title', 'Rayons')

@section('sidebar')
    @parent

   


@endsection

@section('content')

    @if(Auth::user())

    {{--@section('authentification')
    <li class="login"><a id="jaunelink" href="{{url("/dashboard")}}">Dashboard</a></li>
    @endsection--}}


        You're logged in, 

        {{ Auth::user()->ach_nom }} 
        {{ Auth::user()->ach_prenom }} 

        <p><a href="{{url("/modifMotpasse")}}">Modifier mot de passe</a></p>
        <p><a href="{{url("/mesCoordonnees")}}">Modifier mes coordoonées</a></p>
    @endif


    @if(!Auth::user())
        Vous devez être connecter pour avoir accès à cette page ;)
    @endif

@endsection

