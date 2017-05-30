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
               <li><i class="fa fa-laptop"></i>Create Game</li>
            </ol>
         </div>
         <div class="col-lg-12">
            @include('admin.layouts.error')
            <form action="{{ route('admin.game.store') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="col-lg-6" style="padding-bottom:120px">
                 <div class="form-group">
                    <label>System</label>
                    <select class="form-control" name="system_id">
                       <option value="0">Please Choose System</option>
                       @foreach ($systems as $item)
                       <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                       @endforeach
                    </select>
                 </div>
                 <div class="form-group">
                    <label>Name (en) </label>
                    <input class="form-control" name="name" placeholder="Please Enter Gamename" />
                 </div>
                 <div class="form-group">
                    <label>Name (ja) </label>
                    <input class="form-control" name="japanese_name" placeholder="Please Enter Gamename" />
                 </div>
                 <div>
                    <label>Game Category</label><br>
                    @foreach ($categories as $category)
                    <label class="checkbox-inline"><input type="checkbox" name="categories[]" id="{{ $category->id }}" value="{{ $category->id }}">{{ $category->name }}</label>
                    @endforeach
                 </div>
                 <br>
                 <div class="form-group">
                    <label>Game Description (en)</label>
                    <textarea class="form-control" rows="3" name="description"></textarea>
                 </div>
                 <div class="form-group">
                    <label>Game Description (ja)</label>
                    <textarea class="form-control" rows="3" name="japanese_description"></textarea>
                 </div>
                 <button type="submit" class="btn btn-default">Add</button>
                 <button type="reset" class="btn btn-default">Reset</button>
              </div>
              <div class="col-lg-6">
                   <div class="form-group">
                    <label>Images</label>
                    <input type="file" name="fImages">
                   </div>
                   <div class="form-group">
                    <label>Resources</label>
                    <input type="file" name="gResource">
                   </div>
                   <label>Preview Game</label>
                   <div class="game-content">
                       <div id="emulator">
                          <p>To play this game, please, download the latest Flash player!</p>
                          <br>
                          <a href="http://www.adobe.com/go/getflashplayer">
                          <img src="//www.adobe.com/images/shared/download_buttons/get_adobe_flash_player.png" alt="Get Adobe Flash player"/>
                          </a>
                       </div>
                    </div>
               </div>
            <form>
         </div>
      </div>
   </section>
</section>
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