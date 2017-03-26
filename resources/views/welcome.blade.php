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
                    <a href="index.html" id="branding">
                        <img src="images/logo.png" alt="" class="logo">
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
                        <div class="row">
                            <div class="col-md-9">
                                <div class="slider">
                                    <ul class="slides">
                                        <li><a href="#"><img src="{{ asset('dummy/slide-1.png') }}" alt="Slide 1"></a></li>
                                        <li><a href="#"><img src="{{ asset('dummy/slide-2.jpg') }}" alt="Slide 2"></a></li>
                                        <li><a href="#"><img src="{{ asset('dummy/slide-3.jpg') }}" alt="Slide 3"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <h2 style="text-align: center">Top games</h2>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <tbody>
                                            @foreach ($top_games as $game)
                                                <tr class="col-md-12" id="top_game">
                                                    <td class="col-md-4" id="top_game_image">
                                                        <img src="/resource/upload/game_image/{{ $game->image }}"></td>
                                                    <td class="col-md-8" id="top_game_title">
                                                       <div id="game_name">
                                                         {{ $game->name }}
                                                       </div>
                                                       <div>
                                                         System: {{ $game->system->name }}
                                                       </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- .row -->
                        <div class="row">
                            <div class="movie-list">
                                @foreach ($games as $game)
                                    <div class="movie">
                                        <figure class="movie-poster"><img src="/resource/upload/game_image/{{ $game->image }}" alt="#"></figure>
                                        <div class="movie-title"><a href="#">{{ $game->name }}</a></div>
                                    </div>
                                @endforeach
                            </div> <!-- .movie-list -->
                        </div> <!-- .row -->
                        
                        <div class="row">
                            <div class="col-md-4">
                                <h2 class="section-title">December premiere</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                <ul class="movie-schedule">
                                    <li>
                                        <div class="date">16/12</div>
                                        <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                                    </li>
                                    <li>
                                        <div class="date">16/12</div>
                                        <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                                    </li>
                                    <li>
                                        <div class="date">16/12</div>
                                        <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                                    </li>
                                    <li>
                                        <div class="date">16/12</div>
                                        <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                                    </li>
                                </ul> <!-- .movie-schedule -->
                            </div>
                            <div class="col-md-4">
                                <h2 class="section-title">November premiere</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                <ul class="movie-schedule">
                                    <li>
                                        <div class="date">16/12</div>
                                        <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                                    </li>
                                    <li>
                                        <div class="date">16/12</div>
                                        <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                                    </li>
                                    <li>
                                        <div class="date">16/12</div>
                                        <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                                    </li>
                                    <li>
                                        <div class="date">16/12</div>
                                        <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                                    </li>
                                </ul> <!-- .movie-schedule -->
                            </div>
                            <div class="col-md-4">
                                <h2 class="section-title">October premiere</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                <ul class="movie-schedule">
                                    <li>
                                        <div class="date">16/12</div>
                                        <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                                    </li>
                                    <li>
                                        <div class="date">16/12</div>
                                        <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                                    </li>
                                    <li>
                                        <div class="date">16/12</div>
                                        <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                                    </li>
                                    <li>
                                        <div class="date">16/12</div>
                                        <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                                    </li>
                                </ul> <!-- .movie-schedule -->
                            </div>
                        </div>
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
        


        <script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        
    </body>

</html>