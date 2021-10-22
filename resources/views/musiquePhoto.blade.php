@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent

   


@endsection




@section('content')
<form action="{{ url('/photoMusique') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="photo" id="photo" accept="image/png, image/jpeg" required>
    <input type="hidden" name="url" value="{{ substr(url()->current(), 24);}}">
    <select name="musique">
        <option>Selectionez une musique</option>
        @foreach ($musiques as $musique)
            <option value="{{$musique->mus_id}}">{{$musique->mus_titre}}</option>
        @endforeach
    </select>
   <button type="submit">Envoyer</button>
</form>
    
@endsection



