@extends('layouts.app')

@section('title', 'Rayons')

@section('sidebar')
    @parent

   


@endsection

@section('content')
    <h1>MODIFIER MON MOT DE PASSE</h1>
    <form action="{{ url("/modifMotpasse") }}" method="post">
        @csrf
        <br/>
        <table>
            <tr>
                <td><label id="labelNom">Nouveau mot de passe</label></td>
                <td><input id="inputNom" type="password" name="password"/></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Modifier mon mot de passe"/></td>
              </tr>
        </table>

    </form>

    @endsection