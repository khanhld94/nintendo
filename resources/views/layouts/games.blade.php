@foreach ($games as $game)
	<div class="col-sm-6 col-md-3">
		<div class="image_container">
			<a href="{{ route('games.show', $game->id )}}"><img src="/resource/upload/game_image/{{ $game->image }}" alt="{{ $game->name}}"></a>
			<div class="overlay">
			  @if (App::getLocale() == 'en')
			    <div class="text">{{ $game->name }}</div>
			  @else
			  	<div class="text">{{ $game->japanese_name }}</div>
			  @endif
			</div>
		</div>
	</div>
@endforeach
<div class="col-md-12" style="text-align: center;" id="paginate_link">{{ $games->links() }}</div>
