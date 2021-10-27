<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PanierController extends Controller
{
    public function affichePanier(){
        session([ "panier" => [ ]]);
    	return view("panier");
    }

    public function commander(Request $request)
    {
        if ($request->input('mus_stock') == 0) {
            return back()->withErrors(['errorStock'=> 'Nous n\'avons plus de stock']);
        }
        session()->push("panier", $request->get("mus_id"));
        return redirect("/");
    }

    public function supprimerArticle(Request $request){
        $mus_id = $request->input("mus_id");
        
        $oldPanier = session('panier');

        foreach(session('panier') as $k => $v){
            if($v == $mus_id)
                dd($k);
                Arr::forget($oldPanier, $k);
        }

        session()->forget('panier');
        
        foreach($oldPanier as $item){
            session()->push('panier', $item);
        }

        return back();
    }

    public function modifQuantite(Request $request)
    {
        $qte = $request->input('nbrArticle');
        $idArticle = $request->input('mus_id');
        $tab = session('panier');

        foreach (session('panier') as $key => $id)
        {
            if ($id == $idArticle)
                Arr::forget($tab, $key);
        }

        session()->forget('panier');

        foreach($tab as $t)
            session()->push("panier", $t);

        while ($qte > 0)
        {
            session()->push("panier", $idArticle);
            $qte--;
        }

        return back();
    }
}
