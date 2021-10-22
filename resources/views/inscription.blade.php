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
            <h1>Création du compteeee</h1>
            <p id="soustitre">Il ne vous reste plus qu'à renseigner vos informations</p>

            <div class="formulaire">
                <form action="{{ url("/inscription") }}" method="post">
                    @csrf
                    
                    
                    <input id="genrecocher" type="radio" name="gender" value="Mme" {{ old('gender')=="Mme" ? 'checked='.'"'.'checked'.'"' : '' }}> 
                    <label id="genrecocher" for="female">Madame</label>

                    <input id="genrecocher" type="radio" name="gender" value="M." {{ old('gender')=="M." ? 'checked='.'"'.'checked'.'"' : '' }}> 
                    <label id="genrecocher" for="male">Monsieur</label>

                    <label id="labelform">Nom :</label> <input type ="text" name="nom" value="{{ old('nom')}}"/>

                    @if($errors->has('nom'))
                        <p class="error">Veuillez vérifier le champ ci dessus</p>
                    @endif

                    <label id="labelform">Prenom :</label> <input type="text" name="prenom" value="{{ old('prenom')}}"/>
                    @if($errors->has('prenom'))
                        <p class="error">Veuillez vérifier le champ ci dessus</p>
                    @endif

                    <label id="labelform">Mail :</label> <input type ="text" name="mail" value="{{ old('mail')}}"/>
                    @if($errors->has('mail'))
                        <p class="error">Veuillez vérifiez le champ ci dessus</p>
                    @endif

                    <label id="labelform">Mot de passe:</label> <input type ="password" name="password" />
                    @if($errors->has('password'))
                        <p class="error">Veuillez vérifier le champ ci dessus</p>
                    @endif

                    <br>

                    <button class="valider" type="submit">Valider </button>
                </form>
                <p id="lienInscription"> <a href="/connexion">Vous avez déjà un compte ?</a><br /></p>

            </div>

        </div>

        
</body>
</html>

