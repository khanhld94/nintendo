@extends ('master')
@section ('content')
  <style type="text/css">
    /* gameboy game page */
    .game-content {
        background-image: url('/dummy/gameboy2.jpg');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        width: 682px;
        height: 394px;
        display: block;
        margin: 0px auto;
        padding: 5px 0 0px 10px;
    }
    #emulator {
        margin-top: 12px;
        margin-left: 90px;
    }
  </style>
@include('layouts.systemgame')
@include ('layouts.footer')

<!-- Emulator javascript -->
<script src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
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
  
  <!-- Emulator javascript -->

    var image = '<img src="{{ asset('images/hint.png') }}>';
    $(function () {
      $('#popover').popover({placement: 'bottom', content: '<img src="{{ asset('images/hint.png') }}" style="max-width:100%; width: 100%;max-height:100%; height:100%;">', html: true});
    });


    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
    
    <!-- Comment javascript -->

    $(document).ready(function(){
        $("#submit").click(function(e){
            $.ajaxSetup({
               headers: { 'X-CSRF-Token' : $('input[name=_token]').attr('value') }
            });
            var body = $('textarea[name=body]').val();
            var game_id = $('input[name=game_id]').val();
            var uri = '{{ route('games.show', $game->id) }}'
            var html = `<div class="col-sm-2">
                             <div class="thumbnail">
                                @if (Auth::user())
                                  <img class="img-responsive user-photo" src="/resource/upload/user_avatar/{{ Auth::user()->avatar }}">
                                @endif
                             </div>
                             <!-- /thumbnail -->
                          </div>
                          <!-- /col-sm-1 -->
                          <div class="col-sm-10">
                             <div class="panel panel-default" style="width: 560px";>
                                <div class="panel-heading">
                                   <strong>
                                     @if (Auth::user())
                                       {{ Auth::user()->name }}
                                     @endif
                                   </strong> <span class="text-muted">1 second a go</span>
                                   <i class="fa fa-trash-o" style="float: right;"></i>
                                </div>
                                <div class="panel-body">` +
                                  body
                                +`</div>
                             </div>
                          </div>`;
             e.preventDefault();
             $.ajax({
                url: uri ,
                type: "post",
                data: {'body':body,'game_id': game_id},
                success: function(msg){
                  $("#comment-panel").prepend(html);
                  $('textarea[name=body]').val("");
                },
                error: function(data){
                  alert('Comment cant be blank');
                }
              }); 
        });

    });

    $(function() {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();

            $('.pagination').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="{{ asset('/images/loading.gif')}}" />');

            var url = $(this).attr('href');  
            getArticles(url);
            window.history.pushState("", "", url);
        });

        function getArticles(url) {
            $.ajax({
                url : url  
            }).done(function (data) {
                $('.comments').html(data);  
            }).fail(function () {
                alert('Comments could not be loaded.');
            });
        }
    });

    <!-- delete_comment -->
    $(document).on('click', '.delete_button', function(e){

        var confirmation = confirm("are you sure");

        if (confirmation) {
          comment_id = $(this).val();
          var delete_url = '{{ route('games.comment.delete', ['id'=>$game->id,'comment_id'=> 0 ]) }}'
          e.preventDefault();
           $.ajax({
              url: delete_url.replace(/0/, comment_id) ,
              type: "get",
              success: function(msg){
                $("#"+ comment_id).remove();
              },
              error: function(data){
                alert('Cant not delete comment');
              }
            }); 
      }
    });


    // $(document).on('click', '.delete_button', function(e){
    //     comment_id = $(this).val();
    //     var delete_url = '{{ route('games.comment.delete', ['id'=>$game->id,'comment_id'=> 0 ]) }}'
    //     e.preventDefault();
    //      $.ajax({
    //         url: delete_url.replace(/0/, comment_id) ,
    //         type: "get",
    //         success: function(msg){
    //           $("#"+ comment_id).remove();
    //         },
    //         error: function(data){
    //           alert('Cant not delete comment');
    //         }
    //       }); 
    // });

</script>
@endsection