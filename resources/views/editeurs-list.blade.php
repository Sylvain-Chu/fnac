{{$editeurs}}


@foreach ($editeurs as $editeur)
    {{$editeur->edi_nom}}
    {{$editeur->musiques}}
@endforeach