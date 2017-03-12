@extends ('admin.master')
@section ('content')
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">System
                            <small>List</small>
                        </h1>
                    </div>
                    @include ('admin.layouts.flash_message')
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($systems as $system)
                                <tr class="even gradeC" align="center">
                                    <td>{!! $system->id !!}</td>
                                    <td>{!! $system->name !!}</td>
                                    <td>{!! $system->description !!}</td>
                                    <td><img src="/resource/upload/system_image/{!! $system->image !!}" style="max-height: 100px; max-width: 100px;"></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.system.destroy', $system['id']) !!}""> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection