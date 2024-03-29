@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent




@endsection




@section('content')

 
    <h1>Mes commandes : </h1>
    <br>
    @php
        $total = 0;
        $nbCommandes = count($mesCommandes);
    @endphp
    @if ($nbCommandes > 0)

    
        @foreach ($mesCommandes as $commande)

            
                @php           
                    $date = strftime("%d %B %G", strtotime($commande->aca_date));                
                @endphp

                <h3>Commande du {{ $date }} :</h3>
                <input type="hidden" name="dateCommande" value="{{ $date }}">
                <ul>   
                    

                    @foreach ($commande->ligneachat as $c)

                        @php   
                            $prixArticle = 0;
                            $prixArticle = $c->mus_prixttc * $c->pivot->lea_quantite;
                            $total += $prixArticle;
                        @endphp

                        <li>{{ $c->mus_titre }} <br> Nombre d'article : {{ $c->pivot->lea_quantite }}</li><br>
                        <p>Prix de l'article : {{$prixArticle}} €</p>
                        <input type="hidden" name="musTitre" value="{{ $c->mus_titre }}">
                    @endforeach
                </ul>
                <p>Prix de la commande : {{$total}} €</p>
                <br>
                <br>
                    @php
                        $total = 0;
                    @endphp
        @endforeach
    @else
        <p>Aucune commande n'a encore été effectuer</p>
    @endif 

@endsection

</body>

</html>
