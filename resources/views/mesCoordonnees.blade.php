@extends('layouts.app')

@section('title', 'FNAC')

@section('sidebar')
    @parent




@endsection




@section('content')
    @foreach ($adresses as $adresse)
        @if ($adresse->acheteur->ach_id == Auth::user()->ach_id)
            <h2>Modification adresse</h2>
            <form action="{{ url('/editCoordonnees') }}" method="post">
                @csrf
                <input type="hidden" name="ach_id" value="{{ Auth::user()->ach_id }}">

                <label for="nomAdresse">Nom de l'adresse :
                    <input type="text" name="adr_nom" value="{{ $adresse->adr_nom }}" maxlength="50">
                </label>
                <br><br>

                <label for="typeAdresse">Type de l'adresse :

                    <input type="text" name="adr_type" value="{{ $adresse->adr_type }} " maxlength="15">
                </label>
                <br><br>
                <label for="rueAdresse">Rue de l'adresse :
                    <input type="text" name="adr_rue" value="{{ $adresse->adr_rue }}" maxlength="200">
                </label>
                <br><br>
                <label for="cpAdresse">Code postal de l'adresse :
                    <input type="text" name="adr_cp" value="{{ $adresse->adr_cp }}" maxlength="10">
                </label>
                <br><br>
                <label for="villeAdresse">Ville de l'adresse :
                    <input type="text" name="adr_ville" value="{{ $adresse->adr_ville }}" maxlength="100">
                </label>
                <br><br>

                <button>Valider changement</button>
                <br><br>
                <br><br>

            </form>
        @endif
    @endforeach

    <h2>Vous pouvez rajouter ou crée une adresse ici !</h2>
    <form action="{{ url('/addCoordonnees') }}" method="post">
        @csrf
        <input type="hidden" name="ach_id">

        <label for="nomAdresse">Nom de l'adresse :
            <input type="text" name="adr_nom" maxlength="50">
        </label>
        <br><br>

        <label for="typeAdresse">Type de l'adresse :
            <select name="typeAdresse">
                <option value="Facturation">Facturation</option>
                <option value="Livraison">Livraison</option>
            </select>
        </label>
        <br><br>
        <label for="rueAdresse">Rue de l'adresse :
            <input type="text" name="adr_rue" maxlength="200">
        </label>
        <br><br>
        <label for="complAdresse">Complément de l'adresse :
            <input type="text" name="adr_complementrue" maxlength="200">
        </label>
        <br><br>
        <label for="cpAdresse">Code postal de l'adresse :
            <input type="text" name="adr_cp" maxlength="10">
        </label>
        <br><br>        
        <label for="villeAdresse">Ville de l'adresse :
            <input type="text" name="adr_ville" maxlength="100">
        </label>
        <br><br>
        <label for="pays">Pays : 
            <select name="adr_pay">
                @foreach ($pays as $pay)
                    <option value="{{$pay->pay_id}}">{{$pay->pay_nom}}</option>
                @endforeach
            </select>
        </label>
        <br><br>

        <button>Ajouter l'adresse</button>
    </form>
@endsection

</body>

</html>
