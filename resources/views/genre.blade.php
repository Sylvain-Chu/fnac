@extends('layouts.app')

@section('title', 'Genres')

@section('sidebar')
    @parent

   


@endsection




@section('content')

<h1>{{$nomGenre}}</h1>
@foreach ($genres as $genre)    
    <ul>
        <li><a href="{{url("genre/" . $genre->gen_libelle . "/" . $genre->mus_id )}}">{{$genre->mus_titre}}</a></li>    
    </ul>
@endforeach

@endsection