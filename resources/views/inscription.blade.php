<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/inscription.css')}}">
    <title>Inscription</title>
</head>
<body>
    
    

        <div class="formpres">
            <h1>Création du compte</h1>
            <p id="soustitre">Il ne vous reste plus qu'à renseigner vos informations</p>

            <div class="formulaire">
                <form action="{{ url("/inscription") }}" method="post">
                    @csrf
                    
                    
                    <input id="genrecocher" type="radio" name="gender" value="Mme"> 
                    <label id="genrecocher" for="female">Madame</label>

                    <input id="genrecocher" type="radio" name="gender" value="M."> 
                    <label id="genrecocher" for="male">Monsieur</label>

                    <label id="labelform">Nom :</label> <input type ="text" name="nom" />

                    @if($errors->has('nom'))
                        <p class="error">Veuillez remplir le champ ci dessus</p>
                    @endif

                    <label id="labelform">Prenom :</label> <input type="text" name="prenom" />
                    @if($errors->has('prenom'))
                        <p class="error">Veuillez remplir le champ ci dessus</p>
                    @endif

                    <label id="labelform">Mail :</label> <input type ="text" name="mail"/>
                    @if($errors->has('mail'))
                        <p class="error">Veuillez vérifiez la syntaxe de votre adresse email</p>
                    @endif

                    <label id="labelform">Mot de passe (min 3 charactères):</label> <input type ="password" name="password"/>
                    @if($errors->has('password'))
                        <p class="error">Veuillez remplir le champ ci dessus</p>
                    @endif

                    <label id="labelform">Confirmation mot de passe :</label> <input type ="password" name="password_confirmation"/>
                    @if($errors->has('password_confirmation'))
                        <p class="error">Veuillez remplir le champ ci dessus</p>
                    @endif
                    <br>

                    <button class="valider" type="submit">Valider </button>
                </form>
                <p id="lienInscription"> <a href="/connexion">Vous avez déjà un compte ?</a><br /></p>

            </div>

        </div>

        
</body>
</html>

