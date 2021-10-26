@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent

   


@endsection




@section('content')
    @if (!empty(session('panier')))

    <h3>PANIER ({{count(session('panier'))}})</h3>

    @foreach ($musiques as $musique)
        @foreach (session('panier') as $itemPanier)            
            @if ($musique->mus_id == $itemPanier)

            <section>
                <div class="blocCentre">        
                    <table class="tableProduit">
                        <tr>
                            <td><img class="imgPanier" src="{{$musique->mus_urlphoto}}"></td>
                            <td>
                                <p>{{$musique->mus_titre}} - </p> 
                            </td>
                            <td class="alignLeft">{{$musique->mus_prixttc}} €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <select name="qte" class="qteProduit">
                                    <option value="">Qte</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5+</option>
        
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <p class="lienPanier">
                                    <a href="">Supprimer du panier</a>
                                </p>                                
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
                <td>??? €</td>
            </tr>

            <tr>
                <td>Frais de livraison</td>
                <td>??? €</td>
            </tr>
        </table>
        <input type="button" class="buttonValidate" value="Valider">
    </div>
    </section>
    @else
    <p>Votre panier est vide ! </p>
    @endif
@endsection

</body>
</html>



