@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent




@endsection




@section('content')


    <h2>Veuillez choisir un domicile</h2>
    <form action="{{ url('/livraison/domicile/paiement') }}" method="POST">
        @csrf
        @foreach ($adresses as $adresse)

            <input type="hidden" name="ach_id" value="{{ Auth::user()->ach_id }}">


            <input type="radio" id="{{ $adresse->adr_id }}" name="adresses" value="{{ $adresse->adr_id }}">

            <label for="{{ $adresse->adr_id }}">{{ $adresse->adr_nom }}</label><br>
        @endforeach

        <button>Valider</button>
    </form>

    <form action="{{ url('#') }}" method="POST">
        <h2>Vous pouvez rajouter une adresse ici !</h2>
        <button>Enregistre une nouvelle adresse</button>
    </form>
@endsection

</body>

</html>
