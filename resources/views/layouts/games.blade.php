@foreach ($games as $game)
	<div class="col-sm-6 col-md-3">
		<div class="image_container">
			<a href="{{ route('games.show', $game->id )}}"><img src="/resource/upload/game_image/{{ $game->image }}" alt="{{ $game->name}}"></a>
			<div class="overlay">
			  @if (App::getLocale() == 'en')
			    <div class="text">{{ $game->name }}</div>
			    <div class="overlay_name">{{ trans('translate.system') }} : {{ $game->system->name }}</div>
			  @else
			  	<div class="text">{{ $game->japanese_name }}</div>
			  	<div class="overlay_name">{{ trans('translate.system') }} : {{ $game->system->japanese_name }}</div>
			  @endif
			  	<div class="overlay_like">
			  		<i class="icon disabled outline laravelLike-icon thumbs up"></i>{{ $game->total_vote->total_like }}<i class="icon  outline laravelLike-icon thumbs down" style="padding-left: 5px !important;"></i>{{ $game->total_vote->total_dislike }}
			  	</div>
			</div>
		</div>
	</div>
@endforeach
<div class="col-md-12" style="text-align: center;" id="paginate_link">{{ $games->links() }}</div>
