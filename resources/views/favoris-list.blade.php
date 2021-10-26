@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent

   


@endsection




@section('content')
@foreach ($musiques as $musique)
    @if (count($musique->favoris) == 0)
        <p>Vous n'avez pas de favoris !</p>
    @else
        @foreach ($musique->favoris as $uneMusique)

            <div>
                <h2>{{$uneMusique->mus_titre}}</h2>
                <p>
                    @if (count($uneMusique->interpretes) > 1 )
                        Various
                    @else
                        @foreach ($uneMusique->interpretes as $interprete)
                            {{$interprete->inr_nom}}
                        @endforeach            
                    @endif
                    @php
                        setlocale(LC_TIME, 'fr_FR.utf8','fra');
                        $datetemp = $uneMusique->mus_dateparution;
                        $timestamp = strtotime($datetemp); 
                        $date = strftime("%d %B %G", $timestamp );
                    @endphp

                    (Interprète) - Paru le {{ $date }} - 
                    {{ $uneMusique->editeur->edi_nom}}
                </p>

                @php
                    $url = $uneMusique->mus_urlphoto;
                @endphp

                <img src="{{asset($url)}}">
                <p>{{$uneMusique->mus_prixttc}} €</p>

                <form action="/supprFav" method="POST">    
                    @csrf
                    <input type="hidden" name="url" value="{{ substr(url()->current(), 24);}}">            
                    <input type="hidden" name="mus_id" value="{{$uneMusique->mus_id}}">        
                    <button>Supprimer des favoris</button>
                </form>        
            </div>
        @endforeach
    @endif    
@endforeach



@endsection









