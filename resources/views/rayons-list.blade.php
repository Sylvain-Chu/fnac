@extends('layouts.app')

@section('title', 'FNAC - Rayons')

@section('sidebar')
    @parent

   


@endsection




@section('content')



    <div class="col-size">
        <div id="touslesray">
            @foreach ($rayons as $rayon)
            <div id="zaza">
                <a class="titreray" href="rayon/{{$rayon->ray_nom}}">{{$rayon->ray_nom}}</a>
            </div>
            @endforeach
        </div>
    </div>

    
@endsection

</body>
</html>
