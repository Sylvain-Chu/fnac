@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent

   


@endsection




@section('content')
<form action="/ajoutRayon" method="post">
    @csrf
    <input type="hidden" name="url" value="{{ substr(url()->current(), 24);}}">


    <label for="nomRayon">Nom du rayon : </label>
    <input type="text" name="nomRayon">
    
    @foreach ($musiques as $musique)
    <div>
        <input type="hidden" name="mus_id" value="{{$musique->mus_id}}">
        <input type="checkbox" name="musiques[]" value="{{$musique->mus_id}}">
        <label for="{{$musique->titre}}">{{$musique->mus_titre}}</label>
    </div>
    @endforeach
    <button type="submit">Ajouter rayon</button>
</form>

@endsection

</body>
</html>
