@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent




@endsection




@section('content')
    @php
    $lePanier = [];
    if (!empty(session('panier'))){
        foreach (session('panier') as $article) {
        if (array_key_exists($article, $lePanier)) {
            $lePanier[$article]++;
        } else {
            $lePanier[$article] = 1;
        }
    }
    }
    

    $total = 0;
    @endphp

    @if (!empty(session('panier')))

        <h3>PANIER ({{ count(session('panier')) }})</h3>

        @foreach ($lePanier as $k => $v)
            @foreach ($musiques as $musique)
                @if ($musique->mus_id == $k)
                    <section>
                        <div class="blocCentre">
                            <table class="tableProduit">
                                <tr>
                                    <td><img class="imgPanier" src="{{ $musique->mus_urlphoto }}"></td>
                                    <td>
                                        <p>{{ $musique->mus_titre }} - </p>
                                    </td>
                                    @php
                                        $prixArticle = $musique->mus_prixttc * $v;
                                        $total += $prixArticle;
                                    @endphp
                                    <td class="alignLeft">{{ $prixArticle }} €</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form action="/modifQuantite" method="POST">
                                            @csrf
                                            <input type="hidden" name="mus_id" value="{{ $musique->mus_id }}">
                                            <input type="number" id="nbrArticle" value="{{ $v }}"
                                                name="nbrArticle" min="0" max="{{ $musique->mus_stock }}">
                                            <button type="submit">Valider changement de quantité</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form action="/supprimerArticle" method="POST">
                                            @csrf
                                            <input type="hidden" name="mus_id" value="{{ $musique->mus_id }}">
                                            <button>Suprimer du panier</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                @endif
            @endforeach
        @endforeach

        <div class="blocRecap">
            <h3>Récapitulatif</h3>
            <table>
                <tr>
                    <td>Panier</td>
                    <td> {{ $total }} €</td>
                </tr>
            </table>
            <form action="/validationPanier">
                <button type="submit">Valider la commande</button>
            </form>
        </div>
        </section>
    @else
        <p>Votre panier est vide ! </p>
    @endif
@endsection

</body>

</html>
