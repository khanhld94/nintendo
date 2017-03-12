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
                              <a class="internal-link" data-toggle="modal" data-target="#myModalHorizontal"><button class="btn btn-primary">Play</button></a>
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
                                       <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
                                       <script src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
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
                                                          system : 'nes',
                                                          url : '{{ asset('roms/Super Mario Bros.zip') }}'
                                                      };
                                                      var params = {};
                                                      var attributes = {};
                                          
                                                      params.allowscriptaccess = 'sameDomain';
                                                      params.allowFullScreen = 'true';
                                                      params.allowFullScreenInteractive = 'true';
                                          
                                                      swfobject.embedSWF('{{ asset('flash/Nesbox.swf') }}', 'emulator', '640', '480', '11.2.0', 'flash/expressInstall.swf', flashvars, params, attributes);
                                                  }
                                              }
                                          
                                              embed();
                                          });
                                          
                                       </script>
                                    </div>
                                    <!-- Modal Footer -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </td>
                     <td>{!! $game->description !!}</td>
                     <td><img src="/resource/upload/game_image/{!! $game->image !!}" style="max-height: 100px; max-width: 100px;"></td>
                     <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                     <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </section>
</section>
@endsection