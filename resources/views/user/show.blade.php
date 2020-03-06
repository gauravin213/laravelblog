@extends('layouts.appadmin')

@section('content')

 <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Page</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
	<div class="row">
		<div class="col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">General Elements</h3>
          </div>

          <div class="card-body">

            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <h3>{{ $user->name }}</h3>
                    <p>{{ $user->email }}</p>
                    <p>{{ $user->id }}</p>
                     <p>{{ $user->user_type }}</p>
                  </div>
                </div>
            </div>
          
          </div>

        </div>
      </div> 
  </div>
</section>




</div>

@endsection
