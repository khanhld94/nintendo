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
                        <li><i class="fa fa-laptop"></i>Dashboard</li>
                     </ol>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                     <div class="info-box blue-bg">
                        <i class="fa fa-gamepad"></i>
                        <div class="count">{{ $game_count }}</div>
                        <div class="title">Game</div>
                     </div>
                     <!--/.info-box-->         
                  </div>
                  <!--/.col-->
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                     <div class="info-box brown-bg">
                        <i class="fa fa-mobile"></i>
                        <div class="count">{{ $system_count }}</div>
                        <div class="title">Game System</div>
                     </div>
                     <!--/.info-box-->         
                  </div>
                  <!--/.col-->  
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                     <div class="info-box dark-bg">
                        <i class="fa fa-user"></i>
                        <div class="count">{{ $user_count }}</div>
                        <div class="title">User</div>
                     </div>
                     <!--/.info-box-->         
                  </div>
                  <!--/.col-->
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                     <div class="info-box green-bg">
                        <i class="fa fa-cubes"></i>
                        <div class="count">1.426</div>
                        <div class="title">Stock</div>
                     </div>
                     <!--/.info-box-->         
                  </div>
                  <!--/.col-->
               </div>
               <!--/.row-->
               <!-- project team & activity end -->
            </section>
         </section>
@endsection
