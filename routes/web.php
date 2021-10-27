<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\MusiqueController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\AvisAbusifController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\EditeurController;
use App\Http\Controllers\FavoriController;
use App\Models\Favori;
use App\Models\Genre;
use App\Models\Musique;
use App\Models\Rayon;
use App\Models\Interprete;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
], function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    //-----------------------modif compte ----------------------------
    Route::post('/mesCoordonnees', [CompteController::class, "modifCoordonnees"]);
    Route::get('/mesCoordonnees', function () {
        return view('mesCoordonnees');
    });

    Route::post('/modifMotpasse', [CompteController::class, "modifMotpasse"]);
    Route::get('/modifMotpasse', function () {
        return view('modifMotpasse');
    });

    /*Route::get('/modifCompteAccueil', function () {
        return view('modifCompteAccueil');
    });*/
    //---------------------------------------------------------------------

    

});


Route::get('/', [MusiqueController::class, "index"]);

Route::get('/header', function () {
    return view('header');
});

//----------------------------AUTHENTIFICATION--------------------

Route::post('/formConnexion', [AuthentificationController::class, "connexion"]);

Route::get('/formDeconnexion', [AuthentificationController::class, "deconnexion"]);

Route::post('/inscription', [AuthentificationController::class, "enregistrement"]);

Route::get('/inscription', function () {
    return view('inscription');
});

Route::get('/connexion', function () {
    return view('connexion');
});

//---------------------------------------------------------------------


//--------------TRI PAR RAYON-----------------------------------------

Route::get('/rayon', [RayonController::class, "index"]);


Route::get('/rayon/{rayon}', function ($nomRayon) {
    return view('rayon', ['nomRayon' => $nomRayon, 'rayons' => Rayon::rechercheRayon($nomRayon)]);
});

Route::get('/rayon/{rayon}/{musiqueid}', function ($rayon, $musiqueid) {
    return view('musique', [
        'laMusique'       => MusiqueController::affichageMusique($musiqueid),
        'avis'          => AvisController::trouverAvis($musiqueid),
        'moyenneAvis'   => AvisController::calculMoyenneAvis($musiqueid)
    ]);
});
//---------------------------------------------------------------------



//-------------TRI PAR GENRE--------------------------------------------
//Route::get('/genre', [GenreController::class, 'afficheGenre']);

Route::get('/genre', [GenreController::class, "index"]);


Route::get('/genre/{genre}', function ($nomGenre) {
    return view('genre', ['genres' => Genre::rechercheGenre($nomGenre), 'nomGenre' => $nomGenre]);
});

Route::get('/genre/{genre}/{musiqueid}', function ($genre, $musiqueid) {
    return view('musique', [
        'laMusique'       => MusiqueController::affichageMusique($musiqueid),
        'avis'          => AvisController::trouverAvis($musiqueid),
        'moyenneAvis'   => AvisController::calculMoyenneAvis($musiqueid),
        //'verif'       =>AvisController::verificationInterpreteMusique($musiqueid)
    ]);
});
//---------------------------------------------------------------------


//----------------page resultat rercherche----------------------------------
Route::get('/recherche', function () {
    return view('recherche', ['resultats' => RechercheController::recherche()]);
});
//---------------------------------------------------------------------




//-------------MUSIQUE-------------------------------------
Route::get('/musique/{idMusique}', function ($musiqueid) {
    return view('musique', [
        'laMusique'       => MusiqueController::affichageMusique($musiqueid),
        'avis'          => AvisController::trouverAvis($musiqueid),
        'moyenneAvis'   => AvisController::calculMoyenneAvis($musiqueid),
        'url'           => '/musique/{idMusique}'
    ]);
});

//---------------------------------------------------------------------


Route::get('/musiques', [MusiqueController::class, "index"]);
Route::get('/editeurs', [EditeurController::class, "index"]);
Route::get('/rechercheMusiques', [MusiqueController::class, "cherche"]);




//----------AVIS----------

Route::post('/avis', [AvisController::class, "publieAvis"]);

Route::post('/nbutileNon', [AvisController::class, "updateUtileNon"]);

Route::post('/nbutileOui', [AvisController::class, "updateUtileOui"]);

Route::post('/signalement', [AvisController::class, "signalerAvis"]);

Route::post('/suppresionAvisAbusif', [AvisAbusifController::class, "supprimerAvis"]);

//-----------------------COMMANDES/PANIER---------------------

Route::post('/commander', [PanierController::class, "commander"]);

Route::get('/panier', function () {
    return view('panier');
});


Route::get('/monPanier', [MusiqueController::class, "panier"]);


//--------------MEMBRE COMMUNICATION--------

Route::get('/avisAbusifs', [AvisAbusifController::class, "index"])->middleware('App\Http\Middleware\Auth');
Route::get('/enregistrerPhoto', [MusiqueController::class, "musiquePhoto"])->middleware('App\Http\Middleware\Auth');
Route::get('/consulterCommande', [AvisAbusifController::class, "index"])->middleware('App\Http\Middleware\Auth');
Route::get('/ajoutRayon', [RayonController::class, "editRayon"])->middleware('App\Http\Middleware\Auth');


Route::post('/photoMusique', [MusiqueController::class, "formAjoutPhoto"]);

Route::post('/ajoutRayon', [RayonController::class, "ajoutRayon"]);


Route::get('/commandes', [CommandeController::class, "index"]);

Route::get('/mesCommandes', [CommandeController::class, "mesCommandes"]);

Route::get('/favoris', [FavoriController::class, "index"]);

Route::post('/ajouteFav', [FavoriController::class, "ajouteFav"]);
Route::post('/supprFav', [FavoriController::class, "suppFav"]);

Route::get('/topbar', function () {
    return view('topbar');
});


Route::post('/supprimerArticle', [PanierController::class, "supprimerArticle"]);
Route::post('/modifQuantite', [PanierController::class, "modifQuantite"]);
//Route::post('/validationPanier', [PanierController::class, "modifQuantite"]);
Route::get('/validationPanier', function () {
    return view('validationPanier');
});