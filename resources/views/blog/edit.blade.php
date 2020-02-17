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

              <form class="form-horizontal" role="form" method="POST" action="{{ route('blog.update', ['id' => $blog->id]) }}" >

                {{ csrf_field() }}
                {{ method_field('PUT')}}

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description" id="description">{{ $blog->description}}</textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status" id="status">
                        <option value="publish" {{'publish' == $blog->status ? 'selected' : ''}}>Publish</option>
                        <option value="draft" {{'draft' == $blog->status ? 'selected' : ''}}>Draft</option>
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
