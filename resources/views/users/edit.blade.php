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
            
            <div class="container">
             <div class="col-lg-12">
                      <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('users.update', $user->id ) }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter Name" 
                                  value="{!! old('name'),isset($user) ? $user['name'] : null !!}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Please Enter Email" 
                                  value="{!! old('email'),isset($user) ? $user['email'] : null !!}" />
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="avatar" value="{!! old('avatar'),isset($user) ? $user['avatar'] : null !!}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                  </div>
           </div>
           </div>
    </div>
  </div>
</div>
@include ('layouts.footer')
@endsection

