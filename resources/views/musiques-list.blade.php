@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent

   


@endsection




@section('content')
    <div class="musiques">
    <h2>Musiques à l'affiche</h2>                        
    <ul>
        @foreach ($musiques as $musique)     
                <li><a href="musique/{{$musique->mus_id}}">{{$musique->mus_titre}}</a></li>
                <li>{{$musique->mus_dateparution}}</li>
                
                <li>
                @foreach ($musique->genres as $genre)
                   {{$genre->gen_libelle}}        
                @endforeach
                </li>

                <li>
                @foreach ($musique->interpretes as $interprete)
                   {{$interprete->inr_nom}}        
                @endforeach
                </li>
                
                <li>{{$musique->editeur->edi_nom}}</li>

                <li>{{$musique->mus_prixttc}} €</li> 

        @endforeach 
    </ul> 
</div>


@endsection

</body>
</html>
