@extends('layouts.mainLayout')

@section('title')
    Brew Region
@endsection
    
@section('banner')
    Local Events
@endsection

@section('content')
<a href="/events2"><strong>Staggered</strong></a> <a href="/events">Inline</a>
<br />
<br />
<h2>Date is:</h2>
{{ date("M, d, Y", time()) }}
<br />
<br />
<div class="event-list">
    <div class="event-item">
        <div class="event-bubble">
            <div class="event-img-wrap"><img src="/img/beer.jpg"  height="250px"/></div>
            <div class="event-bubble-detail">
                <div class="event-date2"><strong>April 22</strong></div>
                <h3>Brew Region Goes Live!</h3>
                <p>
                The site BrewRegion.com will be going live this Saturday. We hope to make this a
                community where beer enthusiasts can have a one stop location to get up to date information on breweries
                in The Region. Feel free to subscribe in order to get full functionality, see exclusive events, and be able to contribute
                to the existence of Brew Region.
                </p>
            </div>
        </div>
    </div>
    <div class="event-item">
        <div class="event-bubble-right">
            <div class="event-img-wrap"><img src="/img/dld.jpg"  height="250px"/></div>


            <div class="event-bubble-right-detail">
                <h3>Brew Region Goes Live!</h3>
                <p>
                The site BrewRegion.com will be going live this Saturday. We hope to make this a
                community where beer enthusiasts can have a one stop location to get up to date information on breweries
                in The Region. Feel free to subscribe in order to get full functionality, see exclusive events, and be able to contribute
                to the existance of Brew Region.
                </p>
            </div>
        </div>

        <div class="event-bubble-right-date">
            <div class="date-month">Apr</div>
            <div class="date-day">16</div>
        </div>
    </div><div class="event-item">
        <div class="event-bubble">
            <div class="event-img-wrap"><img src="/img/18th.png" height="250px" /></div>


            <div class="event-bubble-detail">
                <h3>Brew Region Goes Live!</h3>
                <p>
                The site BrewRegion.com will be going live this Saturday. We hope to make this a
                community where beer enthusiasts can have a one stop location to get up to date information on breweries
                in The Region. Feel free to subscribe in order to get full functionality, see exclusive events, and be able to contribute
                to the existance of Brew Region.
                </p>
            </div>
        </div>
        <div class="event-bubble-date">
            <div class="date-month">Apr</div>
            <div class="date-day">16</div>
        </div>
    </div>
    <div class="event-item">
        <div class="event-bubble-right">
            <div class="event-img-wrap"><img src="/img/rev.jpg" height="250px" /></div>


            <div class="event-bubble-right-detail">
                <h3>Brew Region Goes Live!</h3>
                <p>
                The site BrewRegion.com will be going live this Saturday. We hope to make this a
                community where beer enthusiasts can have a one stop location to get up to date information on breweries
                in The Region. Feel free to subscribe in order to get full functionality, see exclusive events, and be able to contribute
                to the existance of Brew Region.
                </p>
            </div>
        </div>

        <div class="event-bubble-right-date">
            <div class="date-month">Apr</div>
            <div class="date-day">16</div>
        </div>
    </div>
</div>
@endsection