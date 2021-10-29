@extends('layouts.app')

@section('title', 'Gérer comptes')

@section('sidebar')
    @parent

@endsection




@section('content')

    <table>
        <thead>
            <tr>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Mail</td>
                <td>Type de Compte</td>
                <td>Modifier type de Compte</td>
            </tr>
        </thead>
        @foreach (Auth::user()->all() as $compte) {{--a mettre dans le controlleur--}}
            <tr>
                
                    <td>{{$compte->ach_nom}}</td>
                    <td>{{$compte->ach_prenom}}</td>
                    <td>{{$compte->ach_mel}}</td>
                    <td>{{$compte->ach_typeCompte}}</td>
                
                <td>
                    <form method="post" action="/gererComptes/{{$compte->ach_id}}">
                        @csrf
                        <select name="typeCompte">
                            <option value="">--Choix type compte</option>
                            <option value="membre">Membre</option>
                            <option value="communication">Communication</option>
                            <option value="admin">Admin</option>
                        </select>
                </td>
                <td><input type="submit" value="Modifier"></td>
            </tr>
            </form>
        @endforeach

    </table>
@endsection
