<?php ?>

@extends('layouts.mainLayout')

@section('title')
    Brew Region
@endsection
    
@section('banner')
    Dashboard
@endsection

@section('content')
<br />
<br />

<!--Display Update Message if Exists-->
<?php if (session()->has('message')) {
        echo session('message');
    } ?>

<h1>Hello {{ Auth::user()->name }}</h1>
<hr />
<div class="dash-create">
    <h2>Create</h2>
    <br /><br />
    <form action="addEvent" method="GET">
        <input type="submit" value="Add Event" />
    </form>
    <br /><br />
    <form action="/addNews" method="POST">
        <input type="submit" value="Add News" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>

@if(!isset($editable) || $editable == 0)
<div class="dash-info">
    <div class="dash-info-left">
        <img src="/img/eric.jpg" height="150px" width="150px"/>
    </div>
    <div class="dash-info-inner">
        <h2>User Info</h2>
        <p><b>Name:</b>&nbsp; {{ Auth::user()->name }}</p>
        <p><b>Email:</b> {{ Auth::user()->email }}</p>
        <p><b>First:</b>&nbsp; {{ Auth::user()->name }}<br /><br />
           <b>Last:&nbsp;&nbsp;</b> {{ Auth::user()->name }}</p>
        @if(Auth::user()->admin)<p><strong>* You are an Administrator</strong></p>@endif
        
        <div class="clear-both">
            <form action="dashboard" method="POST">
                <p><input type="submit" value="Edit Info" /></p>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            </form>
        </div>
    </div>
</div>
@elseif(isset($editable) && $editable == 1)
<div class="dash-info">
    <form action="dashboard" method="POST">
        <div class="dash-info-left">
        <img src="/img/eric.jpg" height="150px" width="150px"/><br /><br />
        <input type="file" name="img" />
        </div>
        <div class="dash-info-inner">
            <h2>User Info</h2>
            <p><b>Name:</b> <input type="text" name="name" value="{{ Auth::user()->name }}" /></p>
            <p><b>Email:</b> <input type="text" name="email" value="{{ Auth::user()->email }}" /></p>
            <p><b>First:&nbsp;&nbsp;</b> <input type="text" name="firstName" value="{{ Auth::user()->name }}" /><br /><br />
                <b>Last:&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="text" name="lastName" value="{{ Auth::user()->name }}" /></p>
            @if(Auth::user()->admin)<p><strong>* You are an Administrator</strong></p>@endif

            <div class="clear-both">
                <p><input type="submit" value="Submit" /></p>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="_method" value="PUT" />
            </div>

        </div>
    </form>
</div>
@endif
<div class="clear-both"></div>

<!--End of Content-->
@endsection
