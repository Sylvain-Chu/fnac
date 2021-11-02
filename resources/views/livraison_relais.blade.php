@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent




@endsection




@section('content')
    {{-- COMPTER LE NOMBRE DE RELAIS 
        @foreach ($relais as $relai)
        @foreach ($relai->acheteur as $ach)
            {{dd(count($ach->ach_id))}}

        @endforeach
    @endforeach --}}

    @if (count($relais) >= 1)
        <h2>Veuillez choisir un point relais</h2>
        <form action="{{ url('/livraison/relais/paiement') }}" method="POST">
            @csrf
            @foreach ($relais as $relai)
                @foreach ($relai->acheteur as $ach)
                    @if ($ach->ach_id == Auth::user()->ach_id)
                        <input type="hidden" name="ach_id" value="{{ Auth::user()->ach_id }}">

                        <input type="radio" id="{{ $relai->rel_id }}" name="relais" value="{{ $relai->rel_id }}">

                        <label for="{{ $relai->rel_id }}">{{ $relai->rel_nom }} - {{ $relai->rel_ville }}</label><br>

                    @endif
                @endforeach
            @endforeach

            <button>Valider</button>
        </form>
    @else
        test
    @endif
@endsection

</body>

</html>
