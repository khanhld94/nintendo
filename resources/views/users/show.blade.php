@extends ('master')
@section('content')
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="/resource/upload/user_avatar/{{ $user->avatar }}" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ $user->name }}
					</div>
					<div class="profile-usertitle-job">
						{{ $user->email }}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="fa fa-user"></i>
							Overview </a>
						</li>
						<li>
							<a href="{{ route('users.edit',$user->id) }}">
							<i class="fa fa-cog"></i>
							Account Settings </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
            	<div class="panel-group">
                  <div class="panel panel-primary" style="text-align: center;">
                    <div class="panel-heading" style="background-color: #339966">Game You Like</div>
                    <div class="panel-body">
                      @if (count($user_votes) > 0)
	                    <section class="games">
	                        @include('layouts.profilegamelist')
	                    </section>
	                  @endif
                    </div>
                  </div>
              </div>
            </div>
		</div>
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript">
	$(function() {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();

            $('#pagination_link').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="{{ asset('/images/loading.gif')}}" />');

            var url = $(this).attr('href');  
            getArticles(url);
            window.history.pushState("", "", url);
        });

        function getArticles(url) {
            $.ajax({
                url : url  
            }).done(function (data) {
                $('.games').html(data);  
            }).fail(function () {
                alert('Games could not be loaded.');
            });
        }
    });
</script>
@include ('layouts.footer')
@endsection