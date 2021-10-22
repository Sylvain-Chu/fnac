@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent




@endsection




@section('content')

    <h1>Commandes : </h1>


    @foreach ($commandes as $commande)
        @php
            $temp = 0;
            $datehier = date('Y-m-d', strtotime('-1 days'));
            $dateAchat = $commande->aca_date;
            $dateCommande = strftime('%d %b %Y');
        @endphp
        @if ($datehier == $dateAchat)


            <h2>Achteur : </h2>
            <p>Commande de {{ $commande->acheteur->ach_civilite }} {{ $commande->acheteur->ach_nom }}
                {{ $commande->acheteur->ach_prenom }} le {{ $dateCommande }}: </p>


            <h3>Musiques :</h3>
            <ul>
                @foreach ($commande->ligneachat as $c)
                    <li>{{ $c->mus_titre }} <br> Nombre d'article : {{ $c->pivot->lea_quantite }}</li><br>

                @endforeach
            </ul>

            @if ($commande->adresse != null)
                <h3>Adresse de livraison :</h3>
                <p>{{ $commande->adresse->adr_rue }}, {{ $commande->adresse->adr_cp }}
                    {{ $commande->adresse->adr_ville }},
                    {{ $commande->adresse->pays->pay_nom }}</p>
            @endif


            @if ($commande->magasin != null)
                <h3>Magasin : </h3>
                <p>{{ $commande->magasin->mag_nom }}</p>
            @endif

            @if (@!empty($commande->relais))
                <h3>Relais : </h3>
                <p>{{ $commande->relais->rel_nom }}</p>
            @endif

            <br>
            <br>
        @else
            @php
                $temp++;
            @endphp
        @endif
    @endforeach

    @if ($temp>0)
        <p>Aucune commande n'a été effectuer hier</p>
    @endif
@endsection

</body>

</html>
