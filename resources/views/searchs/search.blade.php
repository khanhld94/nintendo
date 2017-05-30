@extends ('master')
@section('content')
	<main class="main-content" style="height: 100vh;">
   <div class="container">
      <div class="page">
         <div class="breadcrumbs" style="font-family: fipps; margin-left: 25px;">
            <a href="#">Search Result</a>
         </div>
         <div class="content">
            <!-- .row -->
         @if ($search_results == null || $search_results->count() == 0) 
         	<h3>No result found</h3>
         @else
          <div class="col-md-9" id="left-content">
          	@foreach ($search_results as $game)
      				<div class="col-sm-6 col-md-3">
      					<div class="image_container">
      						<a href="{{ route('games.show', $game->id )}}"><img src="/resource/upload/game_image/{{ $game->image }}" alt="{{ $game->name}}"></a>
      						<div class="overlay">
                    @if(App::getLocale() == 'en')
        						  <div class="text">{{ $game->name }}</div>
                    @else 
                      <div class="text">{{ $game->japanese_name }}</div>
                    @endif
      						</div>
      					</div>
      				</div>
      			@endforeach
{{-- 			<div class="col-md-12" style="text-align: center;">{{ $games->render() }}</div> --}}
          </div>
          <div class="col-md-3"> 
              <div class="row">
                  <table class="table table-hover topgame_table">
                      <tbody>
                          <tr id="top_game" style="background-color: #222222;color: white"><td><h4 style="text-align: center; font-family: fipps" >Top games</h4></td></tr>
                          @foreach ($top_games as $top_game)
                              <tr class="col-md-12" id="top_game">
                                  <td class="col-md-3" id="top_game_image">
                                      <img src="/resource/upload/game_image/{{ $top_game->image }}"></td>
                                  <td class="col-md-9" id="top_game_title">
                                    @if(App::getLocale() == 'en')
                                     <div id="game_name">
                                       <a href="{{ route('games.show', $top_game->id )}}">{{ $top_game->name }}</a>
                                     </div>
                                     <div>
                                       System: {{ $top_game->system->name }}
                                     </div>
                                     @else
                                      <div id="game_name">
                                       <a href="{{ route('games.show', $top_game->id )}}">{{ $top_game->japanese_name }}</a>
                                     </div>
                                     <div>
                                       System: {{ $top_game->system->japanese_name }}
                                     </div>
                                     @endif
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
          @endif
      </div>
   </div>
   </div>
   </main>
@include ('layouts.footer')
@endsection
