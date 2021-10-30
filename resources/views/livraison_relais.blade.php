@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent




@endsection




@section('content')
<h2>Veuillez choisir un point relais</h2>
<form action="{{ url("/livraison/relais/paiement") }}" method="POST">
    @csrf
    @foreach ($relais as $relai)
        
        <input type="hidden" name="ach_id" value="{{Auth::user()->ach_id}}">


        <input type="radio" id="{{$relai->rel_id}}" name="relais" value="{{$relai->rel_id}}">

        <label for="{{$relai->rel_id}}">{{$relai->rel_nom}} - {{$relai->rel_ville}}</label><br>
    @endforeach

    <button>Valider</button>
</form>

@endsection

</body>

</html>
