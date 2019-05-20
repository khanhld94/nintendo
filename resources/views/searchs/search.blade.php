@extends ('master')
@section('content')
<main class="main-content">
   <div class="container">
      <div class="page">
         <div class="breadcrumbs" style="font-family: fipps; margin-left: 25px;">
            <a href="#">{{ trans('translate.searchresult') }}</a>
         </div>
         <div class="content">
           <div class="col-md-9" id="left-content">
              <form class="filters" action="{{ route('games.advancedsearch') }}" method="POST">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input type="text" name="keyword" id="search" size="30" value="{!! old('keyword'),isset($keyword) ? $keyword : null !!}">
                 @if(App::getLocale() == 'en')
                   <select name="system" placeholder="Choose System">
                      <option value="">{{ trans('translate.choosesystem') }}</option>
                      @foreach($systems as $system)
                        @if(isset($old_system))
                          <option value="{{ $system->id }}" {!! $old_system == $system->id ? "selected":"" !!}>{{ $system->name }}</option>
                        @else
                          <option value="{{ $system->id }}">{{ $system->name }}</option>
                        @endif
                      @endforeach
                   </select>
                   <select name="category" placeholder="Choose Category">
                      <option value="">{{ trans('translate.choosecategory') }}</option>
                      @foreach($categories as $category)
                        @if(isset($old_category))
                          <option value="{{ $category->id }}" {!! $old_category == $category->id ? "selected":"" !!}>{{ $category->name }}</option>
                        @else
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                      @endforeach
                   </select>
                  @else
                   <select name="system" placeholder="Choose System">
                      <option value="">{{ trans('translate.choosesystem') }}</option>
                      @foreach($systems as $system)
                        @if(isset($old_system))
                          <option value="{{ $system->id }}" {!! $old_system == $system->id ? "selected":"" !!}>{{ $system->japanese_name }}</option>
                        @else
                          <option value="{{ $system->id }}">{{ $system->japanese_name }}</option>
                        @endif
                      @endforeach
                   </select>
                   <select name="category" placeholder="Choose Category">
                      <option value="">{{ trans('translate.choosecategory') }}</option>
                      @foreach($categories as $category)
                        @if(isset($old_category))
                          <option value="{{ $category->id }}" {!! $old_category == $category->id ? "selected":"" !!}>{{ $category->japanese_name }}</option>
                        @else
                          <option value="{{ $category->id }}">{{ $category->japanese_name }}</option>
                        @endif
                      @endforeach
                   </select>
                  @endif
                 <button type="submit">{{ trans('translate.search') }}</button>
              </form>
                <!-- .row -->
               @if ($search_results == null || $search_results->count() == 0)
                 <h3>{{ trans('translate.noresult')}}</h3>
               @else
               @if (count($search_results) > 0)
               <section class="games">
                  @foreach ($search_results as $game)
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
               </section>
               @endif
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
   </div>
</main>
@include ('layouts.footer')
@endsection