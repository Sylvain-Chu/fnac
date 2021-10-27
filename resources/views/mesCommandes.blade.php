@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent




@endsection




@section('content')


    <h1>Mes commandes : </h1>
    <br>
    @php
        $nbCommandes = count($mesCommandes);
    @endphp
    @if ($nbCommandes > 0)
        @foreach ($mesCommandes as $commande)
            @php                
                $datetemp = $commande->aca_date;
                $timestamp = strtotime($datetemp); 
                $date = strftime("%d %B %G", $timestamp );
            @endphp

            <h3>Commande du {{ $date }} :</h3>
            <input type="hidden" name="dateCommande" value="{{ $date }}">
            <ul>
                @foreach ($commande->ligneachat as $c)
                    <li>{{ $c->mus_titre }} <br> Nombre d'article : {{ $c->pivot->lea_quantite }}</li><br>
                    <input type="hidden" name="musTitre" value="{{ $c->mus_titre }}">
                    <input type="hidden" name="musTitre" value="{{ $c->mus_titre }}">
                @endforeach
            </ul>

            <br>
            <br>
        @endforeach
    @else
        <p>Aucune commande n'a encore été effectuer</p>
    @endif

@endsection

</body>

</html>
