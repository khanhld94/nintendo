@extends ('master')
@section ('content')
	<main class="main-content">
   <div class="container">
      <div class="page">
         <div class="breadcrumbs" style="font-family: fipps; margin-left: 25px;">
            <i class="fa fa-gamepad fa-3x"></i>
            @if (App::getLocale() == 'en')
              <a href="#">{{ $system->fullname }}</a>
            @else
              <a href="#">{{ $system->japanese_name }}</a>
            @endif
         </div>
         <div class="content">
            <!-- .row -->
            <div class="col-md-9" id="left-content">
                @if (count($games) > 0)
                    <section class="games">
                        @include('layouts.games')
                    </section>
                @endif
            </div>
            <div class="col-md-3"> 
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
                                         <a href="{{ route('games.show', $vote->game->id )}}">
                                           @if (App::getLocale() == 'en')
                                             {{ $vote->game->name }}
                                           @else
                                             {{ $vote->game->japanese_name }}
                                           @endif
                                          </a>
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
            </div>
      </div>
   </div>
   <!-- .container -->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
   <script type="text/javascript">
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
                $('.games').html(data);  
            }).fail(function () {
                alert('Games could not be loaded.');
            });
        }
    });
   </script>
</main>
@include ('layouts.footer')
@endsection