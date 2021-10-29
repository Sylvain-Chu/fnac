@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent

   


@endsection




@section('content')
<h2>Comparateur objets</h2>

<table>
    <tr>
        <td>Titre</td>
    </tr>
    <tr>
        <td>Date parution</td>
    </tr>
    <tr>
        <td>Photo</td>
    </tr>
    <tr>
        <td>Prix TTC</td>
    </tr>
    <tr>
        <td>Code barre</td>
    </tr>
    <tr>
        <td>Stock</td>
    </tr>

    @foreach ($musiques as $musique)
            <tr>
                <td>
                    <p>{{$musique->mus_titre}}</p>
                    <p>{{$musique->mus_dateparution}}</p>
                    <p>{{$musique->mus_prixttc}}</p>
                    <p>{{$musique->mus_codebarre}}</p>
                    <p>{{$musique->mus_stock}}</p>
                </td>
            </tr>    
        @endforeach
</table>
@endsection



