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

              <form class="form-horizontal" role="form" method="POST" action="{{ route('user.update', ['id' => $user->id]) }}" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('PUT')}}


              <input type="hidden" name="author" id="author" value="1">


              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Email</label>
                       <input type="text" name="email" id="email" class="form-control" value="{{ $user->email}}">
                  </div>
                </div>
              </div>

              <a href="javascript://" id="admin_change_pass">change password</a>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group" id="pass_field">
                    
                  </div>
                </div>
              </div>

              <script type="text/javascript">
                jQuery(document).ready(function(){

                  jQuery(document).on('click', '#admin_change_pass', function(){

                    var htm = '<label>Password</label>';
                    htm += '<input type="text" name="password" id="password" class="form-control">';
                    jQuery('#pass_field').html(htm);

                  });

                });
              </script>


              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                      <label>Role</label>
                      <select class="form-control" name="user_type" id="user_type">
                        <option value="admin" {{'admin' == $user->user_type ? 'selected' : ''}}>admin</option>
                        <option value="author" {{'author' == $user->user_type ? 'selected' : ''}}>Author</option>
                        <option value="user" {{'user' == $user->user_type ? 'selected' : ''}}>User</option>
                      </select>
                    </div>
                </div>
              </div>

          
              <div class="row">
                <div class="col-sm-2">
                  <div class="form-group">
                      <button class="btn btn-block btn-default">Submit</button>
                    </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div> 
  </div>
</section>




</div>

@endsection
