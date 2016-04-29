<?php $month2 = ""; ?>

@extends('layouts.mainLayout')

@section('title')
    Brew Region
@endsection
    
@section('banner')
    Local Events
@endsection

@section('content')
<br />
<br />
<!--Display Update Message if Exists-->
<?php 
    if (session()->has('message')) {
        echo session('message');
    }
?>

<div class="event-list">

@if(!(Auth::guest()) && Auth::user()->admin == 1)
<span class="edit-event-toggle">
    <?php 
    echo 
        '<form action="events" method="POST">'
            . '<input type="hidden" name="enableEdit" value="'.(!$toggleEdit).'" />'
            . '<input type="hidden" name="_token" value=' . csrf_token() . '>'
            . '<input type="submit" value="Toggle Editable"/>'
        . '</form>';
    ?>
</span>
@endif

<!--Cycle through all current Events-->    
@foreach($events as $event)
    <!--if the next event starts in a different month, print month name-->
    @if (isNewMonth($event['date'], $month2))
        <h1> {{ date("F", strtotime($event['date'])) }} Events</h1><br />
    @endif

    <div class="event-item">
        <div class="event-bubble">
            <div class="event-img-wrap">
                <img src="{{ "/img/" . $event['descImg'] }}" height="250px" />
            </div>
            <div class="event-bubble-detail">
                <div class="event-date2">
                    <strong>{{ date("F, d", strtotime($event['date'])) }}</strong>
                    
                    <!--Toggle Edit-->
                    <?php
                        if($toggleEdit || (!(Auth::guest()) && $event['uploaderID'] == Auth::user()->id)) {
                            //echo '<br /><a href="/editEvent/40">Edit</a>';
                            echo 
                            '<form action="editEvent" method="POST">'
                                . '<input type="hidden" name="id" value="'.$event['id'].'" />'
                                . '<input type="hidden" name="_token" value=' . csrf_token() . '>'
                                . '<input type="submit" value="Edit"/>'
                            . '</form>';
    
                        }
                    ?>
                </div>
                <h3>{{ $event['title'] }}</h3>
                <p>{{ $event['description'] }}</p>
                <p><a href="{{ "//" . $event['link'] }}">{{ $event['link'] }}</a></p>
            </div>
        </div>
    </div>

    <?php $month2 = $event['date']; ?>
    
@endforeach

@endsection



<?php

//Determine wether a new month has begun
function isNewMonth($monthA, $monthB) {
    $monthA = dateToMonth($monthA);
    $monthB = dateToMonth($monthB);
    
    if(strcmp ($monthA, $monthB)) {
        return 1;
    } else {
        return 0;
    }
}

//convert string date to month
function dateToMonth($date) {
    return date("F", strtotime($date));
}

?>