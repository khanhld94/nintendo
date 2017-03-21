@extends ('admin.master')
@section ('content')
<section id="main-content">
   <section class="wrapper">
      <!--overview start-->
      <div class="row">
      @include ('admin.layouts.error')
      <div class="col-lg-12">
         <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
         <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-laptop"></i>List Game</li>
         </ol>
      </div>
      <div class="game-tab">
         <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
            @foreach ($systems as $system)
            <li><a data-toggle="tab" href="#{{$system->id}}">{{ $system->name }}</a></li>
            @endforeach
         </ul>
         <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
               <h3>All Games</h3>
               <div class="col-lg-12">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                     <thead>
                        <tr align="center">
                           <th>ID</th>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Image</th>
                           <th>Delete</th>
                           <th>Edit</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($games as $game)
                        <tr class="odd gradeX" align="center">
                           <td>{!! $game->id !!}</td>
                           <td>
                              <div>{!! $game->name !!}</div>
                              <div>
                                 <div class="row" style="display: inline-block;">
                                    <a class="internal-link" data-toggle="modal" data-target="#myModalHorizontal"><button class="btn btn-primary play-button" data-sys="{{$game->system->name}}" data-resource="{{ $game->resource }}">Play</button></a>
                                 </div>
                              </div>
                           </td>
                           <td>{!! $game->description !!}</td>
                           <td><img src="/resource/upload/game_image/{!! $game->image !!}" style="max-height: 100px; max-width: 100px;"></td>
                           <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.game.destroy', $game->id )}}"> Delete</a></td>
                           <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
            @foreach ($systems as $system)
            <div id="{{$system->id}}" class="tab-pane fade">
               <h3>{{ $system->name }}</h3>
               <div class="col-lg-12">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                     <thead>
                        <tr align="center">
                           <th>ID</th>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Image</th>
                           <th>Delete</th>
                           <th>Edit</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($system->games as $systemgame)
                        <tr class="odd gradeX" align="center">
                           <td>{!! $systemgame->id !!}</td>
                           <td>
                              <div>{!! $systemgame->name !!}</div>
                              <div>
                                 <div class="row" style="display: inline-block;">
                                    <a class="internal-link" data-toggle="modal" data-target="#myModalHorizontal"><button class="btn btn-primary play-button" data-sys="{{$systemgame->system->name}}" data-resource="{{ $systemgame->resource }}">Play</button></a>
                                 </div>
                              </div>
                           </td>
                           <td>{!! $systemgame->description !!}</td>
                           <td><img src="/resource/upload/game_image/{!! $systemgame->image !!}" style="max-height: 100px; max-width: 100px;"></td>
                           <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.game.destroy', $systemgame->id )}}"> Delete</a></td>
                           <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
            @endforeach
         </div>
      </div>
      <div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
         aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <button type="button" class="close" 
                     data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel" style="color: Black;">
                     Play
                  </h4>
               </div>
               <!-- Modal Body -->
               <div class="modal-body">
                  <div id="emulator">
                     <p>To play this game, please, download the latest Flash player!</p>
                     <br>
                     <a href="http://www.adobe.com/go/getflashplayer">
                     <img src="//www.adobe.com/images/shared/download_buttons/get_adobe_flash_player.png" alt="Get Adobe Flash player"/>
                     </a>
                  </div>
               </div>
               <!-- Modal Footer -->
            </div>
         </div>
      </div>
   </section>
</section>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script type="text/javascript">
   var resizeOwnEmulator = function(width, height)
   {
       var emulator = $('#emulator');
       emulator.css('width', width);
       emulator.css('height', height);
   }
   $(document).ready(function() {
     $(".play-button").click(function(){
         var emulator = $('#emulator');
         if(emulator)
         {
             var link = '/roms/'+ $(this).data('resource');
             var syslink = $(this).data('sys');
             var flashvars = 
             {
                 system : syslink,
                 url : encodeURI(link)
             };
             var params = {};
             var attributes = {};
             params.allowscriptaccess = 'sameDomain';
             params.allowFullScreen = 'true';
             params.allowFullScreenInteractive = 'true';
   
             swfobject.embedSWF('{{ asset('flash/Nesbox.swf') }}', 'emulator', '640', '480', '11.2.0', 'flash/expressInstall.swf', flashvars, params, attributes);
         }
     }); 
   });
   
   
</script>
@endsection