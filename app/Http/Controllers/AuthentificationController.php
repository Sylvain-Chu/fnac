<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;

class AuthentificationController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function connexion(Request $request)
    {

        $credentials = $request->validate([
            'ach_mel' => ['required'],
            'ach_motpasse' => ['required'],
        ]);


        unset($credentials["ach_motpasse"]);
        $credentials["password"] = $request->ach_motpasse;

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Mauvais identifiant.',
            'password' => 'Mauvais mot de passe.',
        ]);


    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deconnexion(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        
        $request->session()->forget('panier');
        
        return redirect('/');
    }

    public function enregistrement(Request $request)
    {
        request()->validate([
            'gender' => ['required'],
            'nom' => ['required'],
            'prenom' => ['required'],
            'mail' => ['required', 'email'],
            'password' => [ 'required'],
        ]);

        $acheteur = new User;
        $acheteur->ach_nom = request('nom');
        $acheteur->ach_prenom = request('prenom');
        $acheteur->ach_mel = request('mail');

        $acheteur->ach_motpasse = Hash::make(request('password'));
        $acheteur->ach_civilite = request('gender');
        $acheteur->ach_typeCompte = request('typeCompte');
        
        $acheteur->save();
        
        Auth::login($acheteur);

        return redirect('/dashboard');

    }

}