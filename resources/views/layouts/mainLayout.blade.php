<?php if(!isset($menuSelect)) {$menuSelect = 0;}?>
<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        
        <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon">
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="styles.css" />
        
        
    </head>
    <body>
        <div class="header">
            <div class="header-wrap">
            <span class='login-head' style='margin-right: 40px;'>
                    @if (Auth::guest())
                        <a href="{{ url('/login') }}">Login</a><br />
                        <a href="{{ url('/subscribe') }}">Register</a>
                        
                    @else
                    <span class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" style='margin-left: -110px;'>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-btn fa-dashboard"></i>Dashboard</a></li>
                        </ul>
                    </span>
                    @endif
                    
                </span>
            
            <div class="headMenu">
                <span class="headLogo">
                    <img src="img/logo.png" alt="logo" height="60" width="200"/>
                </span>
                <span class="<?php if($menuSelect == 0) {echo "headerMenuSelected";}?>">
                    <a href='/'><span class="HeadText">Home</span></a>
                </span>
                <span class="<?php if($menuSelect == 1) {echo "headerMenuSelected";}?>">
                    <a href="/events"><span class="HeadText">Events</span></a>
                </span>
                <span class="<?php if($menuSelect == 2) {echo "headerMenuSelected";}?>">
                    <a href=''><span class="HeadText">News</span></a>
                </span>
                <span class="<?php if($menuSelect == 3) {echo "headerMenuSelected";}?>">
                    <a href='/about'><span class="HeadText">About</span></a>
                </span>
                <span class="<?php if($menuSelect == 4) {echo "headerMenuSelected";}?>">
                    <a href='releases'><span class="HeadText">Releases</span></a>
                </span>
                <span class="<?php if($menuSelect == 5) {echo "headerMenuSelected";}?>">
                    <a href='/subscribe'><span class="HeadText">Subscribe</span></a>
                </span>    
                
                <!--Auth control-->
                
            </div>
            </div>
            
        </div>
            <div class="entire">
            <div class="whole">
                <div class="mainContent">
                    <div id="bodyTitle">
                        <div id="bodyTitleContentWrap">
                            <div class="body-title-img-wrap">
                                <img src="img/coneGrey.png" alt="cone" height="180" width="120"/>
                           </div>
                            <h3>@yield('banner')</h3>
                        </div>
                    </div>
                    <div id="underMainContent">
                        @yield('content')
                    </div>
                </div>
            </div>
            </div>
        <div class="footer">
            <div class="footerContent">
                <div class="footerMenu">
                    <span class="footer-logo"><img src="img/logo-footer.png" alt="footerLogo" height="40" width="150" /></span>
                    <div class="footerTextContent">
                       <span class="footerText">Contact us</span>
                        <span class="footerText">Join Us</span>
                        <span class="footerText">About Us</span>
                        <span class="footerText">Why Us</span>
                    </div>
                </div>

            </div>
        </div>
         <!-- JavaScripts -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    </body>
</html>