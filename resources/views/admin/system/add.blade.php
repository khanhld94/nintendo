@extends ('admin.master')
@section ('content')
<div id="page-wrapper">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">System
               <small>Add</small>
            </h1>
         </div>
         <!-- /.col-lg-12 -->
         <div class="col-lg-7" style="padding-bottom:120px">
         @include ('admin.layouts.error')
            <form action="{!! route('admin.system.store') !!}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                   <label>Name</label>
                   <input class="form-control" name="name" placeholder="Please Enter System Name" />
                </div>
                <div class="form-group">
                   <label>System Description</label>
                   <textarea class="form-control" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                   <label>Images</label>
                   <input type="file" name="fImages">
                </div>
                <button type="submit" class="btn btn-default">Product Add</button>
                <button type="reset" class="btn btn-default">Reset</button>
            <form>
         </div>
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
@endsection

