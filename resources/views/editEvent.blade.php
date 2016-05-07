<?php use App\Event;?>

@extends('layouts.mainLayout')

@section('title')
    Brew Region
@endsection
    
@section('banner')
    Edit Event
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

<h1>Edit: <i>{{ Event::find($id)->title }}</i></h1>
<form action='/editEvent' method="POST">
    <input type="submit" value="Delete Event" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="_method" value="DELETE" />
    <input type="hidden" name="id" value="{{ $id }}" />
    
</form>
<br />

<form id='EditEventForm' action="/editEvent" enctype="multipart/form-data" method='POST' >
    Title<br />
    <input type='text' size="40" name="title" value="{{ Event::find($id)->title }}" />
    <br /><br />
    Date<br />
    <input type='datetime-local' name="date" value="{{ substr_replace(Event::find($id)->date, "T", 10, 1) }}" />
    <br /><br />
    Short Description
    <br />
    <textarea cols="90" rows="5" name="shortDesc">{{ Event::find($id)->description }}</textarea>
    <br /><br />
    Link<br />
    <input type="text" size="40" name="link" value="{{ Event::find($id)->link }}" />
    <br /><br />
    Image<br />
    <input type='file'  name="img" />
    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode((App\EventsImg::find(Event::find($id)->img)->img)).'" height="250px"/>'; ?>
    <br /><br />
    Auth Check 
    <input type="text" name="authCheck" value="{{ Event::find($id)->authCheck }}"/>
    &nbsp;
    Highlight
    <input type="checkbox" name="highlight" checked="{{ Event::find($id)->highlight }}"/>
    <br><br />
    Long Description<br />
    <textarea cols="90" rows="8" name="longDesc">{{ Event::find($id)->longDescription }}</textarea><br /><br />
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="_method" value="PUT" />
    <input type="hidden" name="id" value="{{ $id }}" />
   
    <input type="submit" value="Update Event"/>
    <br /><br />
</form>

@endsection