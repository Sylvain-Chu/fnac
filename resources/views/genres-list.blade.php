@extends('layouts.app')

@section('title', 'Fnac')

@section('sidebar')
    @parent


@endsection



@section('content')

@php
    $id = 0;        
@endphp
<div class="col-size">
@foreach ($genres as $genre)
    <div id="zaza{{$id}}">
        <a href="genre/{{$genre->gen_libelle}}">{{$genre->gen_libelle}}</a>
    </div>
    @php
        $id++;
    @endphp
@endforeach
</div>

@endsection

</body>
</html>
