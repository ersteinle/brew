<?php $month2 = ""; ?>

@extends('layouts.mainLayout')

@section('title')
    Brew Region
@endsection
    
@section('banner')
   New Releases
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

<h1>April</h1>
<div style="float: left; margin: 10px; position: relative;">
    <div style=" border: gray solid 1px; padding-left: 10px; padding-right: 10px;  width: 300px">
        <h2>Dark Lord: 2016</h2>
        <i>3 Floyds Brewing &nbsp;&nbsp;&nbsp; Munster, IN &nbsp;&nbsp;&nbsp; 4/30/16</i><br />
        <a href="">www.3floyds.com</a>
        <br /><br />
        <img src="/img/18th.png" alt="img" height="200px" width="200px" />
        <p>This scotch ale is the best IPA on the market! Wait until you try our beautiful, hand crafted heffeweissen, its to die for</p>
    </div>
</div>
<div style="float: left; margin: 10px;">
    <div style=" border: gray solid 1px; padding-left: 10px; padding-right: 10px; width: 300px">
        <h2>Lake Monster Brown Ale</h2>
        <i>18th Street Brewing &nbsp;&nbsp;&nbsp; Munster, IN &nbsp;&nbsp;&nbsp; 4/30/16</i><br />
        <a href="">www.3floyds.com</a>
        <br /><br />
        <img src="/img/box1.jpg" alt="img" height="200px" width="200px" />
        <p>This scotch ale is the best IPA on the market! Wait until you try our beautiful, hand crafted heffeweissen, its to die for</p>
    </div>
</div>
<div style="float: left; margin: 10px;">
    <div style=" border: gray solid 1px; padding-left: 10px; padding-right: 10px; width: 300px">
        <h2>Fistmas!</h2>
        <i>Haley and the Three Monsters &nbsp;&nbsp;&nbsp; Munster, IN &nbsp;&nbsp;&nbsp; 4/30/16</i><br /><br />
        <a href="">www.3floyds.com</a>
        <br /><br />
        <img src="/img/rev.jpg" alt="img" height="200px" width="200px" />
        <p>This scotch ale is the best IPA on the market! Wait until you try our beautiful, hand crafted heffeweissen, its to die for</p>
    </div>
</div>
<div style="float: left; margin: 10px;">
    <div style=" border: gray solid 1px; padding-left: 10px; padding-right: 10px; width: 300px">
        <h2>Upland Sour</h2>
        <i>3 Floyds Brewing &nbsp;&nbsp;&nbsp; Munster, IN &nbsp;&nbsp;&nbsp; 4/30/16</i><br />
        <a href="">www.3floyds.com</a>
        <br /><br />
        <img src="/img/upland.png" alt="img" height="200px" width="200px" />
        <p>This scotch ale is the best IPA on the market! Wait until you try our beautiful, hand crafted heffeweissen, its to die for</p>
    </div>
</div>
<div class="clear-both"></div>
<br /><br/>
@endsection