@extends ('master')
@section ('content')
  <main class="main-content">
   <div class="container">
      <div class="page">
         <div class="top_breakcum">
            <i class="fa fa-gamepad fa-3x"></i>
            <a href="#">{{ $game->system->fullname }}</a>
            <span>> {{ $game->name }}</span>
            <a id="popover" class="btn" rel="popover" data-content="" title="How To Play">
                <img src="{{ asset('images/tipicon.png') }}">
            </a>
         </div>
         <div class="content">
            <!-- .row -->
          <div class="col-md-8" id="left-content">
            
            <div class="game-content">
               <div id="emulator">
                  <p>To play this game, please, download the latest Flash player!</p>
                  <br>
                  <a href="http://www.adobe.com/go/getflashplayer">
                  <img src="//www.adobe.com/images/shared/download_buttons/get_adobe_flash_player.png" alt="Get Adobe Flash player"/>
                  </a>
               </div>
            </div>
            @include('layouts.share', [
                'url' => request()->fullUrl(),
                'description' => 'This is really cool link',
                'image' => '{{ $game->image }}'
            ])
            <div class="sub-title">Description</div>
            <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>

            <div>
              <div class="col-sm-12">
                   <h3>Comment</h3>
              </div>
                <!-- /col-sm-12 -->
             <!-- /row -->
              @foreach ($game->comments as $comment)
                <div class="col-sm-2">
                   <div class="thumbnail">
                      <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                   </div>
                   <!-- /thumbnail -->
                </div>
                <!-- /col-sm-1 -->
                <div class="col-sm-10">
                   <div class="panel panel-default">
                      <div class="panel-heading">
                         <strong>{{ $comment->user->name}}</strong> <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                      </div>
                      <div class="panel-body">
                         {{ $comment->body }}
                      </div>
                      <!-- /panel-body -->
                   </div>
                   <!-- /panel panel-default -->
                </div>
                <!-- /col-sm-5 -->
              @endforeach
            </div>
            <div>
              <form action="{{ route('games.comment', $game->id) }}" method="POST" enctype="multipart/form-data" style="margin-left: 15px; margin-right: 15px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="game_id" value="{{ $game->id }}">
                <div class="form-group">
                      <label>Leave Your Comment Here</label>
                      <textarea class="form-control" rows="3" name="body"></textarea>
                </div>
                <button type="submit">Submit</button>
              </form>
            </div>
          </div>
          <div class="col-md-4"> 
              <div class="row">
                  <table class="table table-hover topgame_table">
                      <tbody>
                          <tr id="top_game" style="background-color: #222222;color: white"><td><h4 style="text-align: center; font-family: fipps" >Top games</h4></td></tr>
                          @foreach ($top_games as $top_game)
                              <tr class="col-md-12" id="top_game">
                                  <td class="col-md-3" id="top_game_image">
                                      <img src="/resource/upload/game_image/{{ $top_game->image }}"></td>
                                  <td class="col-md-9" id="top_game_title">
                                     <div id="game_name">
                                       <a href="{{ route('games.show', $top_game->id )}}">{{ $top_game->name }}</a>
                                     </div>
                                     <div>
                                       System: {{ $top_game->system->name }}
                                     </div>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
   </div>
   <!-- .container -->

</main>
@include ('layouts.footer')

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

    var image = '<img src="{{ asset('images/hint.png') }}>';
    $(function () {
      $('#popover').popover({placement: 'bottom', content: '<img src="{{ asset('images/hint.png') }}" style="max-width:100%; width: 100%;max-height:100%; height:100%;">', html: true});
    });


    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });

</script>
@endsection