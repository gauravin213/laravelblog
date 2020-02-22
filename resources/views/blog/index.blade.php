@extends('layouts.appadmin')

@section('content')

 <div class="content-wrapper">

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
            <a href="{{ route('blog.create') }}" class="btn btn-primary">Add</a>
		    </h1>

		    <!--alert meaasge-->
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
		          <!-- /.modal-content -->
		        </div>
		        <!-- /.modal-dialog -->
		    </div>

		    <script type="text/javascript">
			jQuery(document).ready(function(){
				/*jQuery('#modal-success').modal('show');
				setTimeout(function(){ 
					jQuery('#modal-success').modal('hide');
				}, 3000);*/

				toastr.success('<p>{{ $message }}</p>');

			});
			</script>
		    @endif
			<!--alert meaasge-->

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




<section class="content">


	<!---->
	<div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Custom Elements</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">

                  <div class="row">
                    <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Custom Select</label>
                        <select class="custom-select" name="title">
                          <option value="1">option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Custom Select Disabled</label>
                        <select class="custom-select">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Custom Select Disabled</label>
                        <select class="custom-select">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Custom Select Disabled</label>
                        <select class="custom-select">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <button class="btn btn-block btn-default">Filter</button>
                      </div>
                    </div>
                    
                  </div>


                  <div class="form-group">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
	<!---->

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
		          <th>id</th>
		          <th>title</th>
		          <th>description</th>
		          <th>status</th>
		          <th>Action</th>
		        </tr>
		        </thead>
		        <tbody>

				@foreach ($blogs as $blog)
				    <tr>
				        <td>{{ $blog->id }}</td>
				        <td>{{ $blog->title}}</td>
				        <td>{{ $blog->description}}</td>
				        <td>{{ $blog->status}}</td>
				        <td>
				            <a class="btn btn-primary" href="{{ route('blog.edit',$blog->id) }}">Edit</a>
							

						{!! Form::open(['method' => 'DELETE','route' => ['blog.destroy', $blog->id],'style'=>'display:inline']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
				        </td>
				    </tr>
				@endforeach

		        </tbody>
		      </table>
		    </div>
		    <!-- /.card-body -->
		  </div>
		  <!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
<!-- /.row -->
</section>

</div>




@endsection
