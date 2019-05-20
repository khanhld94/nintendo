@extends ('admin.master')
@section ('content')
<style type="text/css">
    .help {
      display: block;
      font-size: 1.25rem;
      margin-top: 5px;
    }
    .help.is-danger {
      color: #ff3860;
    }
    .popover-title {
      color: black;
      text-align: center;
    }
    .popover-content {
      color: black;
    }
    .active {
      border-bottom: 2px solid white;
    }
</style>
<section id="main-content">
  <section class="wrapper" id="app">
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
                      <th>Japanese Name</th>
                      <th>Delete</th>
                      <th>Edit</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($categories as $category)
                      <tr class="even gradeC" align="center">
                          <td>{{ $category->id }}</td>
                          <td>{{ $category->name }}</td>
                          <td>{{ $category->japanese_name }}</td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.category.destroy',$category->id) }}"> Delete</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.category.edit', $category->id) }}">Edit</a></td>
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
                     <form action="{!! route('admin.category.store') !!}" method="POST" @submit.prevent ="onSubmit" @keydown="errors.clear($event.target.name)">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                          <label>Name (en)</label>
                          <input class="form-control" name="name" placeholder="Please Enter Category Name" v-model="name"/>
                          <span class="help is-danger" v-if="errors.has('name')" v-text="errors.get('name')"></span>
                          <label>Name (ja)</label>
                          <input class="form-control" name="japanese_name" placeholder="Please Enter Category Name" v-model="japanese_name"/>
                          <span class="help is-danger" v-if="errors.has('japanese_name')" v-text="errors.get('japanese_name')"></span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.1/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.js"></script>
<script type="text/javascript">
  var postUri = "{{ route('admin.category.store') }}";
</script>
<script type="text/javascript">
  class Errors {
      constructor() {
          this.errors = {};
      }
      get(field) {
          if(this.errors[field]){
              return this.errors[field][0];
          }
      }
      any() {
          return Object.keys(this.errors).length > 0;
      }
      has(field) {
          return this.errors.hasOwnProperty(field);
      }
      record(errors){
          this.errors = errors;
      }
      clear(field){
          delete this.errors[field];
      }
  };

  new Vue({

    el: '#app',

    data: {
      name: '',
      japanese_name: '',
      errors: new Errors()
    },

    methods: {
      onSubmit(e) {
        e.preventDefault();
        axios.post(postUri,this.$data)
          .then(this.onSuccess)
          .catch(error => this.errors.record(error.response.data))
      },
      onSuccess(response, e) {
        $('#myModalHorizontal').modal('toggle');
        $('#dataTables-example').append($('<tr class="even gradeC" align="center">'+
          '<td>'+{{$categories->count() + 1 }}+'</td>'+
          '<td>'+this.name+'</td>'+
          '<td>'+this.name+'</td>'+
          '<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>'+
          '<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>'));
      }
    }
  });

</script>         
@endsection