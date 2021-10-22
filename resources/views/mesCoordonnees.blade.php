@extends('layouts.app')

@section('title', 'Rayons')

@section('sidebar')
    @parent

   


@endsection

@section('content')
@if(Auth::user())

  <h1>MES COORDONNÉES</h1>

  <form action="{{ url("/mesCoordonnees") }}" method="post">
    @csrf

    <table>
      <tr>
        <td>
          
          <input id="genrecocher" type="radio" name="gender" value="Mme" @if(auth::user()->ach_civilite == "Mme") {{auth::user()->ach_civilite}} checked @endif/> 
          <label id="genrecocher" for="female" >Madame</label>
        </td>

        <td>
          <input id="genrecocher" type="radio" name="gender" value="M." @if(auth::user()->ach_civilite == "M.") {{auth::user()->ach_civilite}} checked @endif /> 
          <label id="genrecocher" for="male">Monsieur</label>
        </td>
      </tr>

      <tr>
        <td><label id="labelNom">Nom</label></td>
        <td><input id="inputNom" type="text" name="nom" value="{{auth::user()->ach_nom}}" /></td>
      </tr>


      <tr>
        <td><label id="labelPrenom">Prénom</label></td>
        <td><input id="inputPrenom" type="text" name="prenom" value="{{auth::user()->ach_prenom}}" /></td>
      </tr>

      <tr>
        <td><label id="labelMail">Email</label> </td>
        <td><input id="inputMail" type="text" name="mail" value="{{auth::user()->ach_mel}}" /></td>
      </tr>

      <tr>
        <td><label id="labelPseudo">Pseudo</label></td>
        <td><input id="inputPseudo" type="text" name="pseudo" value="{{auth::user()->ach_pseudo}}" /></td>
      </tr>

      <tr>
        <td><label id="labelTelfixe">Téléphone fixe</label></td>
        <td><input id="inputTelfixe" type="text" name="telfixe" value="{{auth::user()->ach_telfixe}}" /></td>
      </tr>

      <tr>
        <td><label id="labelPortable">Téléphone portable</label></td>
        <td><input id="inputPortable" type="text" name="telportable" value="{{auth::user()->ach_telportable}}" /></td>
      </tr>

      <tr>
        <td></td>
        <td><input id="butEnvoyer" type="submit" value="Valider"/></td>
      </tr>
    </table>

  </form>
@endif

  @if(!Auth::user())
  Vous devez être connecté pour avoir accès à cette page ;)
  @endif
   
@endsection