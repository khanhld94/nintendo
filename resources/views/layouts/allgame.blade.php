<div class="movie-list">
    @foreach ($games as $game)
        <div class="movie">
            <figure class="movie-poster"><a href="{{ route('games.show', $game->id )}}"><img src="/resource/upload/game_image/{{ $game->image }}" alt="{{ route('games.show', $game->id )}}"></a></figure>
            <div class="movie-title"><a href="{{ route('games.show', $game->id )}}">{{ $game->name }}</a></div>
        </div>
    @endforeach
</div> <!-- .movie-list -->
<div  class="col-md-12" style="text-align: center;">
  {{ $games->links() }}
</div>