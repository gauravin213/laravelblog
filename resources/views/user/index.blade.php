@extends('layouts.appadmin')

@section('content')

<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Blog Page <a href="{{ route('user.create') }}" class="btn btn-primary">Add</a> </h1>
          
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
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

        		@foreach ($users as $user)
        		    <tr>
        		        <td>{{ $user->id }}</td>
                    <td>{{ $user->name}}</td>
        		        <td>{{ $user->email}}</td>
        		        <td>{{ $user->user_type}}</td>
        		        <td>
        		          <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
                      <a class="btn btn-primary" href="{{ route('user.show',$user->id) }}">View</a>
          						{!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}
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
