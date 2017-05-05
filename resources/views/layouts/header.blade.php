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
            <li><a href="{{ route('home') }}">{{ trans('translate.webtitle') }}</a></li>
        </ul>
      </div>
      <div id="navbar3" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li style="padding-top: 26px;padding-right: 10px; display: block;">
            <form action="{{ route('games.search') }}" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-default pull-right" style="padding: 3px 12px; margin-left: 5px;">
                <span class="fa fa-search"></span>
              </button>
              <input type="text" class="form-control" name="search" id="search" placeholder="search" style="width:200px;">
            </form>
          </li>
          <li>
            <form action="{{ route('language') }}" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <select name="locale" onchange="this.form.submit()">
                <option value="en" {{ App::getLocale() == 'en' ? 'selected' : ''}}>en</option>
                <option value="ja" {{ App::getLocale() == 'ja' ? 'selected' : ''}}>ja</option>
              </select>
            </form>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('translate.system')}}<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              @foreach ($systems as $system)
                @if ( App::getLocale() == 'en')
                 <li><a href="{{ route('systems.show', $system->id) }}">{{ $system->fullname }}</a></li>
                 <li class="divider"></li>
                @else 
                 <li><a href="{{ route('systems.show', $system->id) }}">{{ $system->japanese_name }}</a></li>
                 <li class="divider"></li>
                @endif
              @endforeach
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('translate.category')}}<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              @foreach ($categories as $category)
                @if ( App::getLocale() == 'en')
                 <li><a href="{{ route('categories.show', $category->id )}}">{{ $category->name }}</a></li>
                 <li class="divider"></li>
                @else
                 <li><a href="{{ route('categories.show', $category->id )}}">{{ $category->japanese_name }}</a></li>
                 <li class="divider"></li>
                @endif
              @endforeach
            </ul>
          </li>
          @if (Auth::guest())
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('translate.account')}}<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ route('login') }}">{{ trans('translate.login')}}</a></li>
                  <li class="divider"></li>
                  <li><a href="{{ route('register') }}">{{ trans('translate.register')}}</a></li>
                  <li class="divider"></li>
                </ul>
            </li>
          @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><div class="header-userpic">
                  <img src="/resource/upload/user_avatar/{{ Auth::user()->avatar }}" class="img-responsive" alt="">
                </div> 
                <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ route('users.show', Auth::user()->id )}}">{{ trans('translate.profile') }}</a></li>
                  <li class="divider"></li>
                  <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        {{ trans('translate.logout') }}
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