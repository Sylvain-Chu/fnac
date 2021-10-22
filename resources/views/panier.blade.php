<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon panier</title>
    <link rel="stylesheet" href="{{asset('/css/panier.css')}}">
</head>
<body>
    <h3>PANIER (? PRODUIT)</h3>

    <section>

    <div class="blocCentre">
        <p>Vendu et expédié par ??? ★★★☆☆ depuis ????</p>

        <table class="tableProduit">
            <tr>
                <td><img class="imgPanier" src="https://static.fnac-static.com/multimedia/Images/FR/NR/ce/48/d3/13846734/1520-2/tsp20211007150230/Enna-Boost-Edition-Limitee-Exclusivite-Fnac-Coffret.jpg" alt=""></td>
                <td>
                    <p>nom du produit avec quelques précisions</p> 
                    <p class="typeProduit">type produit</p> 
                </td>
                <td class="alignLeft">15€</td>
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
                        <a href="">Supprimer</a> | <a href="">Mettre de coté</a>
                    </p>
                    
                </td>
            </tr>
        </table>
    </div>

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

</body>
</html>
<?php
