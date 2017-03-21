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
                        <li><i class="fa fa-laptop"></i>System List</li>
                     </ol>
                  </div>
                  <div class="col-lg-12">
                    
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="even gradeC" align="center">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if($user->is_admin)
                                      <td>
                                        Admin
                                      </td>
                                      <td class="center"><a href="#"> </a></td>
                                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                    @else
                                      <td>
                                        User
                                      </td>
                                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
               </div>
               
            </section>
         </section> 
@endsection