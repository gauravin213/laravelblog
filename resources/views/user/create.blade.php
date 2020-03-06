@extends('layouts.appadmin')

@section('content')

<div class="content-wrapper">
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Create User</h1>
      </div>
    </div>
  </div>
</div>
<section class="content">
	<div class="row">
		<div class="col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">General Elements</h3>
          </div>
          <div class="card-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('user.store') }}">
              {{ csrf_field() }}


              <input type="hidden" name="author" id="author" value="1">


               <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" id="password" class="form-control" value="">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                      <label>Role</label>
                      <select class="form-control" name="user_type" id="user_type">
                        <option value="admin" >admin</option>
                        <option value="author" >Author</option>
                        <option value="user">User</option>
                      </select>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
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
