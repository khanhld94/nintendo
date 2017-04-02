@extends ('master')
@section ('content')
	<main class="main-content">
   <div class="container">
      <div class="page">
         <div class="breadcrumbs">
            <a href="#">{{ $system->name }}</a>
         </div>
         <div class="content">
            <!-- .row -->
          <div class="col-md-9" id="left-content">
          	@foreach ($games as $game)
				<div class="col-sm-6 col-md-3">
					<div class="image_container">
						<a href="{{ route('games.show', $game->id )}}"><img src="/resource/upload/game_image/{{ $game->image }}" alt="{{ $game->name}}"></a>
						<div class="overlay">
						  <div class="text">{{ $game->name }}</div>
						</div>
					</div>
				</div>
			@endforeach
			<div class="col-md-12" style="text-align: center;">{{ $games->render() }}</div>
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
@endsection