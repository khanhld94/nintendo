<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
        
        <title>Nintendo World</title>

        <!-- Loading third party fonts -->
        <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Loading main css file -->
        <link rel="stylesheet" href="{{ asset('css/client-side-style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        
        <!--[if lt IE 9]>
        <script src="js/ie-support/html5.js"></script>
        <script src="js/ie-support/respond.js"></script>
        <![endif]-->

    </head>
    <body>
        <div id="site-content">
            <header class="site-header">
                <div class="container">
                    <a href="{{ route('home') }}" id="branding">
                        <img src="{{ asset('images/logo.png') }}" alt="" class="logo">
                        <div class="logo-copy">
                            <h1 class="site-title">Company Name</h1>
                            <small class="site-description">Tagline goes here</small>
                        </div>
                    </a> <!-- #branding -->

                    <div class="main-navigation">
                        <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                        <ul class="menu">
                            <li class="menu-item current-menu-item"><a href="index.html">Home</a></li>
                            <li class="menu-item"><a href="about.html">About</a></li>
                            <li class="menu-item"><a href="review.html">Movie reviews</a></li>
                            <li class="menu-item"><a href="joinus.html">Join us</a></li>
                            <li class="menu-item"><a href="contact.html">Contact</a></li>
                        </ul> <!-- .menu -->

                        <form action="#" class="search-form">
                            <input type="text" placeholder="Search...">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div> <!-- .main-navigation -->

                    <div class="mobile-navigation"></div>
                </div>
            </header>
            <main class="main-content">
                <div class="container">
                    <div class="page">
                        <div class="breadcrumbs">
                            <a href="review.html">{{ $game->system->name }}</a>
                            <span>{{ $game->name }}</span>
                        </div>

                        <div class="content">
                             <!-- .row -->
                            
                            <div class="game-content">
                                <div id="emulator">
                                 <p>To play this game, please, download the latest Flash player!</p>
                                 <br>
                                 <a href="http://www.adobe.com/go/getflashplayer">
                                 <img src="//www.adobe.com/images/shared/download_buttons/get_adobe_flash_player.png" alt="Get Adobe Flash player"/>
                                 </a>
                                </div>
                            </div>
                            <div class="sub-title">Description</div>
                            <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                        </div>
                </div> <!-- .container -->
            </main>
            <footer class="site-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="widget">
                                <h3 class="widget-title">About Us</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia tempore vitae mollitia nesciunt saepe cupiditate</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="widget">
                                <h3 class="widget-title">Recent Review</h3>
                                <ul class="no-bullet">
                                    <li><a href="#">Lorem ipsum dolor</a></li>
                                    <li><a href="#">Sit amet consecture</a></li>
                                    <li><a href="#">Dolorem respequem</a></li>
                                    <li><a href="#">Invenore veritae</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="widget">
                                <h3 class="widget-title">Help Center</h3>
                                <ul class="no-bullet">
                                    <li><a href="#">Lorem ipsum dolor</a></li>
                                    <li><a href="#">Sit amet consecture</a></li>
                                    <li><a href="#">Dolorem respequem</a></li>
                                    <li><a href="#">Invenore veritae</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="widget">
                                <h3 class="widget-title">Join Us</h3>
                                <ul class="no-bullet">
                                    <li><a href="#">Lorem ipsum dolor</a></li>
                                    <li><a href="#">Sit amet consecture</a></li>
                                    <li><a href="#">Dolorem respequem</a></li>
                                    <li><a href="#">Invenore veritae</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="widget">
                                <h3 class="widget-title">Social Media</h3>
                                <ul class="no-bullet">
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Google+</a></li>
                                    <li><a href="#">Pinterest</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="widget">
                                <h3 class="widget-title">Newsletter</h3>
                                <form action="#" class="subscribe-form">
                                    <input type="text" placeholder="Email Address">
                                </form>
                            </div>
                        </div>
                    </div> <!-- .row -->

                    <div class="colophon">Copyright 2014 Company name, Designed by Themezy. All rights reserved</div>
                </div> <!-- .container -->

            </footer>
        </div>
        <!-- Default snippet for navigation -->
        

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
        <script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script type="text/javascript">
           var resizeOwnEmulator = function(width, height)
            {
                var emulator = $('#emulator');
                emulator.css('width', width);
                emulator.css('height', height);
            }

            $(function()
            {
                function embed()
                {
                    var emulator = $('#emulator');
                    if(emulator)
                    {
                        var flashvars = 
                        {
                            system : '{{ $game->system->name }}',
                            url : '/roms/{{ $game->resource }}',
                        };
                        var params = {};
                        var attributes = {};
                        
                        params.allowscriptaccess = 'sameDomain';
                        params.allowFullScreen = 'true';
                        params.allowFullScreenInteractive = 'true';
                        
                        swfobject.embedSWF('{{asset('flash/Nesbox.swf')}}', 'emulator', '640', '480', '11.2.0', 'flash/expressInstall.swf', flashvars, params, attributes);
                    }
                }
                
                embed();
            });
        </script>
        
    </body>

</html>