@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent




@endsection




@section('content')
<h2>Selectionner un mode de livraison</h2>
    <ul>
        <li><a href="{{url("livraison/domicile")}}">Livraison à domicile</a></li>
        <li><a href="{{url("livraison/relais")}}">Livraison en relais colis</a></li>
        <li><a href="{{url("livraison/magasin")}}">Livraison en magasin</a></li>

    </ul>
@endsection

</body>

</html>
