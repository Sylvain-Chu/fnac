@extends('layouts.app')

@section('title', 'FNAC')

@section('sidebar')
    @parent
   


@endsection

@section('content')

        Vous êtes connecté, 

        {{ Auth::user()->ach_nom }} 
        {{ Auth::user()->ach_prenom }} 

        <p><a href="{{url("/modifMotpasse")}}">Modifier mot de passe</a></p>
        <p><a href="{{url("/mesInfos")}}">Modifier mes informations</a></p>
        <p><a href="{{url("/mesCoordonnees")}}">Modifier mes coordonnées</a></p>

@endsection

