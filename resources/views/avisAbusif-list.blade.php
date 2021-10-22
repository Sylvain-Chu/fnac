@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent

   


@endsection




@section('content')
<h2>Voici les avis signaler</h2>
<br>
<ul>
    @foreach ($avisAbusifs as $avi)
    <li>
        <p>{{$avi->avi->avi_detail}}</p>
        <p>{{$avi->acheteur->ach_nom}} {{$avi->acheteur->ach_prenom}} </p>
        <form action="{{ url('/suppresionAvisAbusif') }}" method="POST">
            @csrf
            <input type="hidden" name="url" value="{{ substr(url()->current(), 24);}}">

            <input type="hidden" name="avi_id" value="{{ $avi->avi->avi_id }}">
            <button type="submit">Supprimer avis</button>
        </form>
    </li> 
    <br>
    @endforeach
</ul>
    
    
@endsection



