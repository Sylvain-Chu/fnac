@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent




@endsection




@section('content')

@php
    var_dump(session('panier'));
@endphp

    @if (count($carteBleues) >=  1)
        
        <form action="{{ url("/commandeEffectuee") }}" method="post">
            @csrf
            @foreach ($carteBleues as $cb)
                {{$cb->cab_id}}
                <input type="hidden" name="ach_id" value="{{Auth::user()->ach_id}}">
                <input type="hidden" name="relai" value="{{$relai}}">
                <input type="radio" id="{{$cb->cab_id}}" name="cab_id" value="{{$cb->cab_id}}">
                <label for="{{$cb->cab_id}}">{{$cb->cab_titulaire}}</label><br>

            @endforeach
        
            <button>Valider</button>
        </form>
        
        <h2>Vous pouvez également en rajouter une ! </h2>
    @else
    <h2>Renseignez votre carte de paiement</h2>
    @endif
    
            <form action="{{url("/ajouterPaiement")}}" method="POST">
                @csrf
                <input type="hidden" name="ach_id" value="{{Auth::user()->ach_id}}">
                <label for="typePaiement">Type de paiement
                    <select name="typePaiement">       
                        <option value="">---------- </option>
                        <option value="Mastercard">Mastercard</option>
                        <option value="Visa">Visa</option>
                        <option value="American Express">American Express</option>
                    </select>  
                </label>    

                <label for="Titulaire">Titulaire : 
                    <input type="text" name="cab_titulaire" value="{{Auth::user()->ach_prenom}} {{Auth::user()->ach_nom}}">
                </label>  

                <label for="numero">Numéro : 
                    <input type="text" id="numCb" name="cab_numero" maxlength="16">
                </label>  

                <label for="moisExpiration">Mois d'expiration : 
                    <input type="text" id="numCb" name="cab_moisExpiration" maxlength="2">
                </label>  

                <label for="anneeExpiration">Année d'expiration : 
                    <input type="text" id="numCb" name="cab_anneeExpiration" maxlength="2">
                </label>  

                <label for="Cryptogramme">Cryptogramme : 
                    <input type="text" id="numCb" name="cab_cvs" maxlength="3">
                </label>  
                <button>Ajouter carte</button>
            </form>
@endsection

</body>

</html>
