@extends ('admin.master')
@section ('content')
<section id="main-content">
   <section class="wrapper">
      <!--overview start-->
      <div class="row">
         <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
               <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
               <li><i class="fa fa-laptop"></i>Edit</li>
            </ol>
         </div>
         <div class="col-lg-12">
            <form action="{!! route('admin.game.update', $game->id) !!}" method="POST" enctype="multipart/form-data">
            <div class="col-lg-7" style="padding-bottom:120px">
            @include ('admin.layouts.error')
               <input type="hidden" name="_token" value="{!! csrf_token() !!}">
               <div class="form-group">
                  <label>System</label>
                  <select class="form-control" name="system_id">
                     <option value="0">Please Choose System</option>
                     @foreach ($systems as $item)
                     <option value="{!! $item['id'] !!}" {!! $game->system->id == $item->id ? "selected":"" !!}>{!! $item['name'] !!}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" name="name" placeholder="Please Enter Gamename" 
                     value="{!! old('name'),isset($game) ? $game['name'] : null !!}" />
               </div>
               <div class="form-group">
                  <label>Japanese Name</label>
                  <input class="form-control" name="japanese_name" placeholder="Please Enter Gamename" 
                     value="{!! old('japanese_name'),isset($game) ? $game['japanese_name'] : null !!}"/>
               </div>
               <div>
                  <label>Game Category</label><br>
                  @foreach ($categories as $category)
                  <label class="checkbox-inline">
                  <input type="checkbox" name="categories[]" id="{{ $category->id }}" value="{{ $category->id }}" {{ $game->categories->contains($category->id) ? "checked" : ""}}>{{ $category->name }}
                  </label>
                  @endforeach
               </div>
               <br>
               <div class="form-group">
                  <label>Game Description</label>
                  <textarea class="form-control" rows="3" name="description">
                  {!! old('description'),isset($game) ? $game['description'] : null !!}
                  </textarea>
               </div>
               <div class="form-group">
                  <label>Japanese Description</label>
                  <textarea class="form-control" rows="3" name="japanese_description">
                  {!! old('japanese_description'),isset($game) ? $game['japanese_description'] : null !!}
                  </textarea>
               </div>
               <button type="submit" class="btn btn-default">Update</button>
               <button type="reset" class="btn btn-default">Reset</button>
            </div>
            <div class="col-lg-5">
               <div class="form-group">
                  <label>Images</label>
                  <input type="file" name="fImages" value="{!! old('fImages'),isset($game) ? $game['image'] : null !!}">
               </div>
               <div class="form-group">
                  <label>Resources</label>
                  <input type="file" name="gResource" value="{!! old('gResource'),isset($game) ? $game['resource'] : null !!}">
               </div>
               <button type="button" class="btn btn-info" data-toggle="modal" data-target="#my_{{$game->id}}">Old Image</button>
               <a class="internal-link" data-toggle="modal" data-target="#myModalHorizontal"><button class="btn btn-primary play-button">Preview Resource</button></a>
               <!-- Modal -->
               <div id="my_{{$game->id}}" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                     <!-- Modal content-->
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">Image</h4>
                        </div>
                        <div class="modal-body">
                           <p><img src="/resource/upload/game_image/{!! $game->image !!}" style="max-height: 100%; max-width: 100%;"></p>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn{!! $game->description !!}-default" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <form>
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
               var emulator = $('#emulator');
               if(emulator)
               {
                   var flashvars = {};
                   var params = {};
                   var attributes = {};
                   params.allowscriptaccess = 'sameDomain';
                   params.allowFullScreen = 'true';
                   params.allowFullScreenInteractive = 'true';
                   swfobject.embedSWF('{{ asset('flash/Nesbox.swf') }}', 'emulator', '540', '480', '11.2.0', 'flash/expressInstall.swf', flashvars, params, attributes);
               }
           });
           
      </script>
   </section>
</section>
@endsection