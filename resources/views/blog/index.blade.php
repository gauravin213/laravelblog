@extends('layouts.appadmin')

@section('content')

<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Blog Page <a href="{{ route('blog.create') }}" class="btn btn-primary">Add</a> </h1>
          
      			@if ($message = Session::get('success'))
      		    <div class="modal fade" id="modal-success">
      		        <div class="modal-dialog">
      		          <div class="modal-content bg-success">
      		            <div class="modal-header">
      		              <h4 class="modal-title">Success Modal</h4>
      		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      		                <span aria-hidden="true">&times;</span></button>
      		            </div>
      		            <div class="modal-body">
      		             <p>{{ $message }}</p>
      		            </div>
      		            <div class="modal-footer justify-content-between">
      		              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
      		              <button type="button" class="btn btn-outline-light">Save changes</button>
      		            </div>
      		          </div>
      		        </div>
      		    </div>
              <script type="text/javascript">
                jQuery(document).ready(function(){
                  toastr.success('<p>{{ $message }}</p>');
                });
              </script>
      		  @endif
        </div>
      </div>
    </div>
  </div>

  <section class="content">

    <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">Custom Elements</h3>
      </div>
      <div class="card-body">
        <form role="form">
          <input type="hidden" name="fl" value="1">
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>id</label> 
                {{ Helper::select_filter_by_column_val('id', 'blogs')}}
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>title</label>
                {{ Helper::select_filter_by_column_val('title', 'blogs')}}
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>status</label>
                {{ Helper::select_filter_by_column_val('status', 'blogs')}}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <button class="btn btn-block btn-default">Filter</button>
              </div>
            </div>
          </div>
          <div class="form-group">
          </div>
        </form>
      </div>
    </div>



    <div class="row">

      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>Img</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>description</th>
                <th>status</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

        		@foreach ($blogs as $blog)
        		    <tr>
        		        <td>{{ $blog->id }}</td>
                    <td><img style="width:95px;" src="{{ url('uploads', $blog->image) }}"></td>
                    <td>{{ $blog->author}}</td>
        		        <td>{{ $blog->title}}</td>
                    <td>{{ $blog->category->title}}</td>
        		        <td>{{ $blog->description}}</td>
        		        <td>{{ $blog->status}}</td>
        		        <td>
        		          <a class="btn btn-primary" href="{{ route('blog.edit',$blog->id) }}">Edit</a>
                      <a class="btn btn-primary" href="{{ route('blog.show',$blog->id) }}">View</a>
          						{!! Form::open(['method' => 'DELETE','route' => ['blog.destroy', $blog->id],'style'=>'display:inline']) !!}
          						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          						{!! Form::close() !!}
        		        </td>
        		    </tr>
        		@endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
@endsection