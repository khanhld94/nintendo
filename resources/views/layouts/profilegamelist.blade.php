@foreach ($user_votes as $vote)
 <div class="col-sm-6 col-md-3">
	<div class="image_container">
		<a href="{{ route('games.show', $vote->game->id )}}"><img src="/resource/upload/game_image/{{ $vote->game->image }}" alt="{{ $vote->game->name}}"></a>
		<div class="overlay">
		  <div class="text">{{ $vote->game->name }}</div>
		</div>
	</div>
</div>
@endforeach
<div class="col-md-12" style="text-align: center;" id="paginate_link">{{ $user_votes->links() }}</div>