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
                        <li><i class="fa fa-laptop"></i>Edit Category</li>
                     </ol>
                  </div>
                  <div class="col-lg-12">
                    <div class="col-lg-7" style="padding-bottom:120px">
                     @include ('admin.layouts.error')
                        <form action="{!! route('admin.category.update',$category->id) !!}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                               <label>Name (en)</label>
                               <input class="form-control" name="name" placeholder="Please Enter System Name" value="{!! old('name'),isset($category) ? $category['name'] : null !!}" />
                            </div>
                            <div class="form-group">
                               <label>Name (ja)</label>
                               <input class="form-control" name="japanese_name" placeholder="Please Enter System Name" value="{!! old('japanese_name'),isset($category) ? $category['japanese_name'] : null !!}" />
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                     </div>
                  </div>
               </div>
            </section>
         </section>
@endsection

