
@extends('layouts.app')

@section('title', 'Genres')

@section('sidebar')
    @parent

   


@endsection




@section('content')

<h2>Résultat de la recherche pour {{$_GET['q']}}</h2>
@foreach($resultats as $res) 
    <ul>
        <li><a href="{{url("musique/".$res->mus_id)}}">{{$res->inr_nom}} - {{$res->mus_titre}}</a></li>
    </ul>
@endforeach

@endsection







