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
                $datehier = date('Y-m-d', strtotime('-1 days'));
                $dateCommande = strftime('%d %b %Y');
            @endphp

            <h3>Commande du {{ $dateCommande }} :</h3>
            <ul>
                @foreach ($commande->ligneachat as $c)
                    <li>{{ $c->mus_titre }} <br> Nombre d'article : {{ $c->pivot->lea_quantite }}</li><br>

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
