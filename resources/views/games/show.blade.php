@extends ('welcome')
@section ('content')
  <main class="main-content">
   <div class="container">
      <div class="page">
         <div class="breadcrumbs">
            <a href="review.html">{{ $game->system->name }}</a>
            <span>{{ $game->name }}</span>
         </div>
         <div class="content">
            <!-- .row -->
          <div class="col-md-8" id="left-content">
            
            <div class="game-content">
               <div id="emulator">
                  <p>To play this game, please, download the latest Flash player!</p>
                  <br>
                  <a href="http://www.adobe.com/go/getflashplayer">
                  <img src="//www.adobe.com/images/shared/download_buttons/get_adobe_flash_player.png" alt="Get Adobe Flash player"/>
                  </a>
               </div>
            </div>
            <div class="sub-title">Description</div>
            <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>

          </div>
          <div class="col-md-4"> 
              <div class="row">
                  <table class="table table-hover topgame_table">
                      <tbody>
                          <tr id="top_game" style="background-color: #222222;color: white"><td><h4 style="text-align: center; font-family: fipps" >Top games</h4></td></tr>
                          @foreach ($top_games as $game)
                              <tr class="col-md-12" id="top_game">
                                  <td class="col-md-3" id="top_game_image">
                                      <img src="/resource/upload/game_image/{{ $game->image }}"></td>
                                  <td class="col-md-9" id="top_game_title">
                                     <div id="game_name">
                                       <a href="{{ route('games.show', $game->id )}}">{{ $game->name }}</a>
                                     </div>
                                     <div>
                                       System: {{ $game->system->name }}
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript">
   var resizeOwnEmulator = function(width, height)
    {
        var emulator = $('#emulator');
        emulator.css('width', width);
        emulator.css('height', height);
    }

    $(function()
    {
        function embed()
        {
            var emulator = $('#emulator');
            if(emulator)
            {
                var flashvars = 
                {
                    system : '{{ $game->system->name }}',
                    url : '/roms/{{ $game->resource }}',
                };
                var params = {};
                var attributes = {};
                
                params.allowscriptaccess = 'sameDomain';
                params.allowFullScreen = 'true';
                params.allowFullScreenInteractive = 'true';
                
                swfobject.embedSWF('{{asset('flash/Nesbox.swf')}}', 'emulator', '640', '480', '11.2.0', 'flash/expressInstall.swf', flashvars, params, attributes);
            }
        }
        
        embed();
    });
</script>
@endsection