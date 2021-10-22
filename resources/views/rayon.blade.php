@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent

   


@endsection




@section('content')

<h1>{{ $nomRayon }}</h1>
@foreach ($rayons as $rayon)    
    <ul>
        <li><a href="{{url("rayon/".$rayon->ray_nom . "/" . $rayon->mus_id )}}">{{$rayon->mus_titre}}</a></li>    
    </ul>
@endforeach

@endsection





