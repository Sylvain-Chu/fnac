@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent




@endsection




@section('content')
<h2>Veuillez choisir un magasin</h2>

<form action="{{ url("/livraison/magasin/paiement") }}" method="POST">
    @csrf
    @foreach ($magasins as $magasin)
        
        <input type="hidden" name="ach_id" value="{{Auth::user()->ach_id}}">


        <input type="radio" id="{{$magasin->mag_id}}" name="magasins" value="{{$magasin->mag_id}}">

        <label for="{{$magasin->mag_id}}">{{$magasin->mag_nom}} - {{$magasin->mag_ville}}</label><br>
    @endforeach

    <button>Valider</button>
</form>


@endsection

</body>

</html>
