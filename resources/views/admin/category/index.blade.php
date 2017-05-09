@extends ('admin.master')
@section ('content')
<section id="main-content">
  <section class="wrapper">
     <!--overview start-->
     @include ('admin.layouts.flash_message')
     <div class="row">
        <div class="col-lg-12">
           <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
           <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Category List</li>
           </ol>
        </div>
        <div class="col-lg-12">
          
          <!-- /.col-lg-12 -->
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                  <tr align="center">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Delete</th>
                      <th>Edit</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($categories as $category)
                      <tr class="even gradeC" align="center">
                          <td>{!! $category->id !!}</td>
                          <td>{!! $category->name !!}</td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#""> Delete</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <div class="col-lg-12">

            <a class="internal-link" data-toggle="modal" data-target="#myModalHorizontal"><button class="btn btn-primary">Add Category</button></a>

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
                        Add Category
                     </h4>
                  </div>
                  <!-- Modal Body -->
                  <div class="modal-body">
                     <form action="{!! route('admin.category.store') !!}" method="POST">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                          <label>Name (en)</label>
                          <input class="form-control" name="name" placeholder="Please Enter Category Name" />
                          <label>Name (ja)</label>
                          <input class="form-control" name="japanese_name" placeholder="Please Enter Category Name" />
                      </div>
                      <button type="submit" class="btn btn-default">Add</button>
                      <button type="reset" class="btn btn-default">Reset</button>
                     </form>
                  </div>
                  <!-- Modal Footer -->
               </div>
            </div>
         </div>
      </div>
        </div>
     </div>
     
  </section>
</section> 
         
@endsection