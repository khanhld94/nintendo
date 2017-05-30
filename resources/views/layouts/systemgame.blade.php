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
            {{-- <a id="popover" class="btn" rel="popover" data-content="" title="How To Play">
                <img src="{{ asset('images/tipicon.png') }}">
            </a> --}}
         </div>
         <div class="content">
            <!-- .row -->
          <div class="col-md-8 col-sm-12" id="left-content">
            
            <div class="game-content">
               <div id="emulator">
                  <p>To play this game, please, download the latest Flash player!</p>
                  <br>
                  <a href="http://www.adobe.com/go/getflashplayer">
                  <img src="//www.adobe.com/images/shared/download_buttons/get_adobe_flash_player.png" alt="Get Adobe Flash player"/>
                  </a>
               </div>
            </div>
            <div class="tags">
              <a id="popover" class="btn" rel="popover" data-content="" title="How To Play" style="width: 70px;">
                <img src="{{ asset('images/tipicon.png') }}">
               </a>
               <span style="margin-right: 10px;">{{ trans('translate.howtoplay')}}</span>
               @if (!Auth::guest())
                 <form action="{{ route('games.bookmark') }}" method="POST" style="display: inline;">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   @if (Auth::user()->check_bookmarked($game->id))
                     <span class="glyphicon glyphicon-heart bookmark bookmarked" style="vertical-align:middle">
                   @else
                     <span class="glyphicon glyphicon-heart bookmark unbookmarked" style="vertical-align:middle">
                   @endif
                 </form>
                 </span><span>{{ trans('translate.bookmark')}}</span>
               @endif
               @foreach( $game->categories as $category)
                <span><a href="{{ route('categories.show', $category->id )}}" class="tag">
                  @if(App::getLocale() == 'en')  
                    {{ $category->name }}
                  @else
                    {{ $category->japanese_name }}
                  @endif
                  </a>
                </span>
               @endforeach 
            </div>
            <div class="panel-group" style="margin-top: 10px;margin-left: 12px;margin-right: 12px;margin-bottom: 20px;">
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
                  <div class="content_title" style="margin-bottom: 0px;">{{ trans('translate.topgame')}}</div>
                  <table class="table table-hover topgame_table">
                      <tbody>
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
                    <div class="panel-heading" style="background-color: #339966">{{ trans('translate.feedback') }}</div>
                    <form action="{{ route('games.feedback', $game->id) }}" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="panel-body">
                        <input class="form-control" name="content" placeholder="Feedback to us"></input>
                      </div>
                      <button type="submit" class="btn btn-primary" id="feedback_submit">{{ trans('translate.send')}}</button>
                    </form> 
                  </div>
              </div>
          </div>
      </div>
   </div>
   <!-- .container -->
<script type="text/javascript">
  $(document).ready(function(){
        $("#feedback_submit").click(function(e){
            $.ajaxSetup({
               headers: { 'X-CSRF-Token' : $('input[name=_token]').attr('value') }
            });
            var content = $('input[name=content]').val();
            var game_id = $('input[name=game_id]').val();
            var feedbackurl = '{{ route('games.feedback', $game->id) }}'
             e.preventDefault();
             $.ajax({
                url: feedbackurl ,
                type: "post",
                data: {'content':content,'game_id': game_id},
                success: function(msg){
                  alert('Thank you for your feedback !!');
                  $('input[name=content]').val('');
                },
                error: function(data){
                  alert('Feedback cant be blank');
                }
              }); 
        });

        $(".bookmark").click(function(e){
          $(this).toggleClass("bookmarked");
          $.ajaxSetup({
             headers: { 'X-CSRF-Token' : $('input[name=_token]').attr('value') }
          });
          var bookmarkurl = '{{ route('games.bookmark')}}';
          var game_id = $('input[name=game_id]').val();
          e.preventDefault();
             $.ajax({
                url: bookmarkurl ,
                type: "post",
                data: {'game_id': game_id},
                success: function(msg){
                  console.log('Success !!');
                },
                error: function(data){
                  console.log('Error');
                }
              });
        });

    });
</script>
</main>