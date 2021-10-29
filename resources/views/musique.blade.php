@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent

   


@endsection




@section('content')
@foreach ($laMusique as $musique)
    <div>
        <h2>{{$musique->mus_titre}}</h2>
        <p>
            @if (count($musique->interpretes) > 1 )
                Various
            @else
                @foreach ($musique->interpretes as $interprete)
                    {{$interprete->inr_nom}}
                @endforeach            
            @endif
            @php
                setlocale(LC_TIME, 'fr_FR.utf8','fra');
                $datetemp = $musique->mus_dateparution;
                $timestamp = strtotime($datetemp); 
                $date = strftime("%d %B %G", $timestamp );
            @endphp

            (Interprète) - Paru le {{ $date }} - 
            {{ $musique->editeur->edi_nom}}
        </p>

        @php
            $url = $musique->mus_urlphoto
        @endphp

        <img src="{{asset($url)}}">
        <p>{{$musique->mus_prixttc}} €</p>  
            
        @if(Auth::user())
            <form method="post" action="/commander">
                @csrf
                <input type="hidden" name="mus_stock" value="{{$musique->mus_stock}}">
                <input type="hidden" name="mus_id" value="{{$musique->mus_id}}"   />
                <input type="submit" value="Ajouter au panier">
            </form>
            @error('errorStock')
                <div class="error">{{$message}}</div>
            @enderror
        @endif

        @if(Auth::user())
            <form action="{{ url('/ajouteFav') }}" method="POST">  
                @csrf        
                <input type="hidden" name="mus_id" value="{{$musique->mus_id}}">    
                <button>Ajouter au favoris</button>
            </form>
        @endif

        @if(Auth::user())
            <form action="{{ url('/ajouteFav') }}" method="GET">  
                @csrf        
                <input type="hidden" name="mus_id" value="{{$musique->mus_id}}">    
                <button>Ajouter au comparateur</button>
            </form>
        @endif
            
    </div>


    @if ($moyenneAvis != null )
        <h2>Moyenne des avis : {{$moyenneAvis}}/5</h2>
        <h2>Avis clients : {{$avis->count()}}</h2>
    @else
        <h2>Aucun avis pour cette article</h2>
    @endif



    @foreach ($avis as $avi)
        <h3>{{$avi->acheteur->ach_pseudo}}</h3>
        <h4>{{$avi->avi_titre}}</h4>
        @php
            $dateAvis = strtotime($avi->avi_date);
            $dateAAfficher = strftime("%d %b %Y");
        @endphp
        <p>Avis posté le {{$dateAAfficher}}</p>
        <p>{{$avi->avi_detail}}</p>
        <p>Note : {{$avi->avi_note}}/5</p>

        <form action="{{ url('/nbutileOui') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $avi->avi_id }}">
            <p>{{$avi->avi_nbutileoui}} <button type="submit" name="nbutileoui">👍</button></p>
        </form>
        <form action="{{ url('/nbutileNon') }}" method="post">  
            @csrf          
            <input type="hidden" name="id" value="{{ $avi->avi_id }}">
            <p>{{$avi->avi_nbutilenon}} <button type="submit" name="nbutilenon">👎</button></p>
        </form>


        @php        
            $avisAbusifs = DB::table('t_j_avisabusif_ava')
            ->where('ach_id', Auth::user()->ach_id)
            ->where('avi_id', $avi->avi_id)
            ->get();
        @endphp

        @if (Auth::user() != null && count($avisAbusifs) == 0)
            <form action="{{url('/signalement')}}" method="POST">
            @csrf
                <input type="hidden" name="id_ach" value="{{Auth::user()->ach_id}}">   
                <input type="hidden" name="id_avi" value="{{$avi->avi_id}}">
                <button type="submit">Signaler</button>
            </form>
        @endif
        



    @endforeach

    @if (Auth::user() != null)
        <form action="{{ url("/avis") }}" method="post">
            @csrf
            <p>Deposez votre avis :</p>
            <input type="hidden" name="id_ach" value="{{ Auth::user()->ach_id }}">
            <input type="hidden" name="id_mus" value="{{$musique->mus_id}}">
            <p><input type="text" name="titre" placeholder="Titre"></p>
            <p><input type="number" name="note" id="" min="1" max="5" placeholder="Note"></p>
            <p><textarea name="avis" rows="7" cols="50" placeholder="Entrez votre avis ici"></textarea></p>
            <input type="submit" value="Valider">
        </form>
    @else
        <p>Connetez-vous pour nous laisser votre avis !</p>
    @endif

@endforeach
@endsection

</body>

</html>

