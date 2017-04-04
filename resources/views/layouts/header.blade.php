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
                  <li class="divider"></li>
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