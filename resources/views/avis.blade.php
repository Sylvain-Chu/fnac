@php
    $totalNote = 0;   

    foreach ($avis as $avi){
            $totalNote += $avi->avi_note;
    }       
    $nbrAvis = $avis->count();
    $moyenne = round($totalNote / $nbrAvis, 2);

    echo '<p>Avis clients : '.$nbrAvis.'</p>';
    
    echo '<p>Moyenne des avis : '.$moyenne.'/5</p>';

@endphp



@foreach ($avis as $avi)
    <h3>{{$avi->ach_pseudo}}</h3>
    <h4>{{$avi->avi_titre}}</h4>
    <p>{{$avi->avi_detail}}</p>
    <p>Note : {{$avi->avi_note}}/5</p>
@endforeach
