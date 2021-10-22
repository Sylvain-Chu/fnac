<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/connexion.css')}}">
    <title>Connexion</title>
</head>
<body id ="bodyConnexion">
<div class="carreBlanc">

    <h1 id="titreh1">Connexion / inscription</h1>
    <h2 id="titreh2">Saisissez votre e-mail pour vous connecter ou créer un compte</h2>

    <div class="formulaire">
        <form method="post" action="{{ url("/formConnexion") }}">
            @csrf
            <label id="labelConnexion">Votre email :</label> 
            <input id="inputConnexion" type ="text" name="ach_mel" />
            <br>
            <label id="labelConnexion">Votre mot de passe :</label>
            <input id="inputConnexion" type="password" name="ach_motpasse" />
            <br>
            <p><input type="submit" value="Connexion" id="butConnexion"></p>
        </form>
    </div>
    <p id="lienInscription"> <a href="/inscription">Vous n'avez pas de compte ?</a><br /></p>
</div>  
</body>
</html>