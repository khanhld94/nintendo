@extends ('admin.master')
@section ('content')
<section id="main-content">
   <section class="wrapper">
      <!--overview start-->
      <div class="row">
      @include ('admin.layouts.flash_message')
      <div class="col-lg-12">
         <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
         <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-laptop"></i>Feedbacks</li>
         </ol>
      </div>
       <div class="col-lg-12">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
             <thead>
                <tr align="center">
                   <th>ID</th>
                   <th>Game Id</th>
                   <th>Content</th>
                   <th>Delete</th>
                </tr>
             </thead>
             <tbody>
                @foreach ($feedbacks as $feedback)
                <tr class="odd gradeX" align="center">
                   <td>{{ $feedback->id }}</td>
                   <td>
                     {{ $feedback->game_id }}
                   </td>
                   <td>
                     {{ $feedback->content }}
                    </td>
                   <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                </tr>
                @endforeach
             </tbody>
          </table>
       </div>
   </section>
</section>
<script type="text/javascript">
   $(document).ready(function() {
      $('#dataTables-example').DataTable();
   });
</script>
@endsection