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
            <form action="{!! route('admin.game.store') !!}" method="POST" enctype="multipart/form-data">
                <div class="col-lg-7" style="padding-bottom:120px">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label>System</label>
                        <select class="form-control" name="system_id">
                            <option value="0">Please Choose System</option>
                            @foreach ($systems as $item)
                              <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Gamename" 
                          value="{!! old('name'),isset($game) ? $game['name'] : null !!}" />
                    </div>
                    
                    <div class="form-group">
                        <label>Game Description</label>
                        <textarea class="form-control" rows="3" name="description">
                          {!! old('description'),isset($game) ? $game['description'] : null !!}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Edit</button>
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
               </div>
            <form>
          </div>
       </div>
       
    </section>
 </section>
@endsection