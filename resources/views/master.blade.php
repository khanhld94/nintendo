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
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('css/client-side-style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <style type="text/css">
            @font-face {
                font-family: fipps;
                src: url('{{ asset('/fonts/Fipps-Regular.otf') }}');
            }
            .example3 {
                font-family: fipps;
            }
        </style>
        <!--[if lt IE 9]>
        <script src="js/ie-support/html5.js"></script>
        <script src="js/ie-support/respond.js"></script>
        <![endif]-->

    </head>
    <body>
        <div class="example3">
          <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('/images/gamepad.png')}}" alt="Nintendo World">
                </a>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Nintendo World</a></li>
                </ul>
              </div>
              <div id="navbar3" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href="#">Home</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">System <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      @foreach ($systems as $system)
                         <li><a href="{{ route('systems.show', $system->id) }}">{{ $system->name }}</a></li>
                         <li class="divider"></li>
                      @endforeach
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      @foreach ($categories as $category)
                         <li><a href="#">{{ $category->name }}</a></li>
                         <li class="divider"></li>
                      @endforeach
                    </ul>
                  </li>
                  @if (Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ route('login') }}">Login</a></li>
                          <li class="divider"></li>
                          <li><a href="{{ route('register') }}">Registers</a></li>
                        </ul>
                    </li>
                  @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Profile</a></li>
                          <li class="divider"></li>
                          <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        </ul>
                    </li>    
                  @endif
                </ul>
              </div>
              <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
          </nav>
        </div>
        <div id="site-content">
            
            @yield('content')

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
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>   
    </body>

</html>