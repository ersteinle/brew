@extends('layouts.mainLayout')

@section('banner')
    New Event
@endsection

@section('content')
<br />
<br />
<form id='newEventForm' action="/addEvent" method='POST'>
    Title<br />
    <input type='text' size="40" name="title">
    <br /><br />
    Date<br />
    <input type='datetime-local' name="date" value='{{ date("Y-m-d", time()) }}T12:00:00'>
    <br /><br />
    Short Description
    <br />
    <textarea cols="90" rows="5" name="shortDesc"></textarea>
    <br /><br />
    Link<br />
    <input type="text" size="40" name="link">
    <br /><br />
    Image<br />
    <input type='text'  size="40" name="img"/>
    <br /><br />
    Auth Check 
    <input type="text" name="authCheck"/>
    &nbsp;
    Highlight
    <input type="checkbox" name="highlight" />
    <br><br />
    Long Description<br />
    <textarea cols="90" rows="8" name="longDesc"></textarea><br /><br />
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <input type="submit" value="Add Event"/>
    <br /><br />
</form>
@endsection
