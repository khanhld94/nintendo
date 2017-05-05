@extends('master')
@section('content')
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
                  <table class="table table-hover topgame_table">
                     <tbody>
                        <tr id="top_game" style="background-color: #222222;color: white">
                           <td>
                              <h4 style="text-align: center; font-family: fipps" >{{ trans('translate.topgame')}}</h4>
                           </td>
                        </tr>
                        @foreach ($top_vote_games as $vote)
                        <tr class="col-md-12" id="top_game">
                           <td class="col-md-3" id="top_game_image">
                              <img src="/resource/upload/game_image/{{ $vote->game->image }}">
                           </td>
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
         <!-- .row -->
         {{-- 
      </div>
   </div>
   <div class="container" style="margin-top: 20px;">
      <div class="page">
         --}}
         <div class="content_title">{{ trans('translate.allgame')}}</div>
         <div class="row">
            @if (count($games) > 0)
            <section class="games">
               @include('layouts.allgame')
            </section>
            @endif
         </div>
         <!-- .row -->
         <div class="content_title">{{ trans('translate.newgame')}}</div>
         <div class="row">
            @foreach ($systems as $system)
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
               <div class="box">
                  <div class="box-icon">
                     <img src="/resource/upload/system_image/{{ $system->image}}"></span>
                  </div>
                  <div class="info">
                     @if (App::getLocale() == 'en')
                     <h4 class="text-center">{{ $system->fullname }}</h4>
                     @else
                     <h4 class="text-center">{{ $system->japanese_name }}</h4>
                     @endif
                     @foreach( $system->games()->orderBy('created_at','esc')->limit(4)->get() as $key => $value)
                     <div class="well well-sm">
                        <div class="row">
                           <div class="col-xs-5 col-md-4 text-center" style="height: 50px;">
                              <a href="{{ route('games.show', $value->id )}}"><img src="/resource/upload/game_image/{{ $value->image }}" alt="{{ $value->name }}"
                                 class="img-rounded img-responsive" style="height: 100%;" />
                              </a>
                           </div>
                           <div class="col-xs-7 col-md-8 section-box">
                              <h5 style="text-align: center;">
                                 @if (App::getLocale() == 'en')
                                 {{ $value->name }}
                                 @else
                                 {{ $value->japanese_name }}
                                 @endif
                              </h5>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <a href="{{ route('systems.show',$system->id) }}"><button class="btn btn-info">{{ trans('translate.viewmore')}}</button></a>
               </div>
            </div>
            @endforeach 
         </div>
      </div>
   </div>
   </div> <!-- .container -->
</main>
<script type="text/javascript">
   $(function() {
       $('body').on('click', '.pagination a', function(e) {
           e.preventDefault();
   
           $('#pagination_link').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="{{ asset('/images/loading.gif')}}" />');
   
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
@include ('layouts.footer')
@endsection