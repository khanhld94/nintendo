@extends ('master')
@section('content')
	<main class="main-content">
   <div class="container">
      <div class="page">
         <div class="breadcrumbs" style="font-family: fipps; margin-left: 25px;">
            <a href="#">Search Result</a>
         </div>

         <div class="content">
           <form class="filters" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="text" name="keyword" id="search" size="35">
              <select name="system" placeholder="Choose System">
                <option value="">{{ trans('translate.choosesystem') }}</option>
                @foreach($systems as $system)
                  <option value="{{ $system->id }}">{{ $system->name }}</option>
                @endforeach
              </select>
              <select name="category" placeholder="Choose Category">
               <option value="">{{ trans('translate.choosecategory') }}</option>
               @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
               @endforeach
              </select>
              <button type="submit">{{ trans('translate.search') }}</button>
          </form>
            <!-- .row -->
           @if ($search_results == null || $search_results->count() == 0) 
           	<h3>No result found</h3>
           @else
            <div class="col-md-9" id="left-content">
                @if (count($search_results) > 0)
                    <section class="games">
                        @include('layouts.games', ['games' => $search_results])
                    </section>
                @endif
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
