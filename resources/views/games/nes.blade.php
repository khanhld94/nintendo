@extends ('master')
@section ('content')
  <style type="text/css">
    /* nes - snes game page */
    .game-content {
        background-image: url('/dummy/tv.png');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        width: 695px;
        height: 550px;
        display: block;
        margin: 0px auto;
        padding: 5px 0 0px 10px;
    }
    #emulator {
        margin-top: 27px;
        margin-left: 29px;
    }
  </style>
  <main class="main-content">
   <div class="container">
      <div class="page">
         <div class="top_breakcum">
            <i class="fa fa-gamepad fa-3x"></i>
            @if (App::getLocale() == 'en')
              <a href="#">{{ $game->system->fullname }}</a>
              <span>> {{ $game->name }}</span>
            @else
              <a href="#">{{ $game->system->japanese_name }}</a>
              <span>> {{ $game->japanese_name }}</span>
            @endif
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
            
            <div class="panel-group" style="margin-top: 30px;margin-left: 12px;margin-right: 12px;margin-bottom: 20px;">
                <div class="panel panel-primary" style="text-align: center;">
                  <div class="panel-heading" style="background-color: #339966">{{ trans('translate.description')}}</div>
                  <div class="panel-body" style="text-align: justify;">
                    @if(App::getLocale() == 'en')
                      {{ $game->description }}
                    @else 
                      {{ $game->japanese_description }}
                    @endif
                  </div>
                </div>
            </div>
            <div>
              <div>
                <form action="{{ route('games.comment', $game->id) }}" method="POST" enctype="multipart/form-data" style="margin-left: 15px; margin-right: 15px;">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="game_id" value="{{ $game->id }}">
                  <div class="form-group">
                        <label>{{ trans('translate.commenthere') }}</label>
                        <textarea class="form-control" rows="3" name="body" style="width: 688px;"></textarea>
                  </div>
                  @if( Auth::user())
                    <button type="submit" id="submit">{{ trans('translate.submit')}}</button>
                  @else
                    <a href=" {{ route('login') }}"><button>{{ trans('translate.logintocomment')}}</button></a>
                  @endif
                </form>
              </div>
              <div class="col-sm-12" style="margin-top: 30px;">
                   <h3>{{ trans('translate.comment') }}</h3>
              </div>
                <!-- /col-sm-12 -->
             <!-- /row -->
              @if (count($games) > 0)
                  <section class="comments">
                      @include('layouts.comment')
                  </section>
              @endif
            </div>
          </div>
          <div class="col-md-4"> 
              <div class="row">
                  <table class="table table-hover topgame_table">
                      <tbody>
                          <tr id="top_game" style="background-color: #222222;color: white"><td><h4 style="text-align: center; font-family: fipps" >{{ trans('translate.topgame') }}</h4></td></tr>
                          @foreach ($top_vote_games as $vote)
                              <tr class="col-md-12" id="top_game">
                                  <td class="col-md-3" id="top_game_image">
                                      <img src="/resource/upload/game_image/{{ $vote->game->image }}"></td>
                                  <td class="col-md-9" id="top_game_title">
                                     <div id="game_name">
                                       @if(App::getLocale() == 'en')
                                         <a href="{{ route('games.show', $vote->game->id )}}">{{ $vote->game->name }}</a>
                                       @else
                                         <a href="{{ route('games.show', $vote->game->id )}}">{{ $vote->game->japanese_name }}</a>
                                       @endif
                                     </div>
                                     <div>
                                       <i class="icon disabled outline laravelLike-icon thumbs up"></i>
                                       {{ $vote->total_like }}
                                     </div>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
              <div class="panel-group">
                  <div class="panel panel-primary" style="text-align: center;">
                    <div class="panel-heading" style="background-color: #339966">{{ trans('translate.like')}}</div>
                    <div class="panel-body">
                      @include('laravelLikeComment::like', ['like_item_id' => $game->id ])
                    </div>
                  </div>
              </div>

              <div class="panel-group">
                  <div class="panel panel-primary" style="text-align: center;">
                    <div class="panel-heading" style="background-color: #339966">{{ trans('translate.share') }}</div>
                    <div class="panel-body">
                      @include('layouts.share', [
                          'url' => request()->fullUrl(),
                          'description' => 'This is really cool link',
                          'image' => '{{ $game->image }}'
                      ])
                    </div>
                  </div>
              </div>
              
              
          </div>
      </div>
   </div>
   <!-- .container -->

</main>
@include ('layouts.footer')

<!-- Emulator javascript -->
<script src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
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
  
  <!-- Emulator javascript -->

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
    
    <!-- Comment javascript -->

    $(document).ready(function(){
        $("#submit").click(function(e){
            $.ajaxSetup({
               headers: { 'X-CSRF-Token' : $('input[name=_token]').attr('value') }
            });
            var body = $('textarea[name=body]').val();
            var game_id = $('input[name=game_id]').val();
            var uri = '{{ route('games.show', $game->id) }}'
            var html = `<div class="col-sm-2">
                             <div class="thumbnail">
                                @if (Auth::user())
                                  <img class="img-responsive user-photo" src="/resource/upload/user_avatar/{{ Auth::user()->avatar }}">
                                @endif
                             </div>
                             <!-- /thumbnail -->
                          </div>
                          <!-- /col-sm-1 -->
                          <div class="col-sm-10">
                             <div class="panel panel-default" style="width: 560px";>
                                <div class="panel-heading">
                                   <strong>
                                     @if (Auth::user())
                                       {{ Auth::user()->name }}
                                     @endif
                                   </strong> <span class="text-muted">1 second a go</span>
                                   <i class="fa fa-trash-o" style="float: right;"></i>
                                </div>
                                <div class="panel-body">` +
                                  body
                                +`</div>
                             </div>
                          </div>`;
             e.preventDefault();
             $.ajax({
                url: uri ,
                type: "post",
                data: {'body':body,'game_id': game_id},
                success: function(msg){
                  $("#comment-panel").prepend(html);
                  $('textarea[name=body]').val("");
                },
                error: function(data){
                  alert('Comment cant be blank');
                }
              }); 
        });

    });

    $(function() {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();

            $('.pagination').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="{{ asset('/images/loading.gif')}}" />');

            var url = $(this).attr('href');  
            getArticles(url);
            window.history.pushState("", "", url);
        });

        function getArticles(url) {
            $.ajax({
                url : url  
            }).done(function (data) {
                $('.comments').html(data);  
            }).fail(function () {
                alert('Comments could not be loaded.');
            });
        }
    });

    <!-- delete_comment -->
    $(document).on('click', '.delete_button', function(e){

        var confirmation = confirm("are you sure");

        if (confirmation) {
          comment_id = $(this).val();
          var delete_url = '{{ route('games.comment.delete', ['id'=>$game->id,'comment_id'=> 0 ]) }}'
          e.preventDefault();
           $.ajax({
              url: delete_url.replace(/0/, comment_id) ,
              type: "get",
              success: function(msg){
                $("#"+ comment_id).remove();
              },
              error: function(data){
                alert('Cant not delete comment');
              }
            }); 
      }
    });


    // $(document).on('click', '.delete_button', function(e){
    //     comment_id = $(this).val();
    //     var delete_url = '{{ route('games.comment.delete', ['id'=>$game->id,'comment_id'=> 0 ]) }}'
    //     e.preventDefault();
    //      $.ajax({
    //         url: delete_url.replace(/0/, comment_id) ,
    //         type: "get",
    //         success: function(msg){
    //           $("#"+ comment_id).remove();
    //         },
    //         error: function(data){
    //           alert('Cant not delete comment');
    //         }
    //       }); 
    // });

</script>
@endsection