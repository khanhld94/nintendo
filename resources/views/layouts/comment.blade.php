<div class="col-sm-12" id="comment-panel">
  @foreach ($comments as $comment)
  <div>
    <div class="col-sm-2">
       <div class="thumbnail">
          <img class="img-responsive user-photo" src="/resource/upload/user_avatar/{{ $comment->user->avatar }}">
       </div>
       <!-- /thumbnail -->
    </div>
    <!-- /col-sm-1 -->
    <div class="col-sm-10">
       <div class="panel panel-default" style="width: 560px;">
          <div class="panel-heading">
             <strong>{{ $comment->user->name}}</strong> <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
             <i class="fa fa-trash-o" style="float: right;"></i>
          </div>
          <div class="panel-body">
             {{ $comment->body }}
          </div>
          <!-- /panel-body -->
       </div>
       <!-- /panel panel-default -->
    </div>
  </div>
    <!-- /col-sm-5 -->
  @endforeach
</div>
<div id="pagination_link" style="text-align: center;">{{ $comments->links() }}</div>