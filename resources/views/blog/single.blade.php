@extends('layouts.appfront')

@section('content')


<div class="content-wrapper">


<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Blog</h1>
          </div><!-- /.col -->
     
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
         
          <!-- /.col-md-6 -->
          <div class="col-lg-12">


		    <div class="card card-primary card-outline">
		      <div class="card-header">
		        <h5 class="card-title m-0">{{ $post->title }}</h5>
		      </div>
		      <div class="card-body">
		        <p>{!! $post->description !!}</p>
		        <hr>
				<p>Posted In: {{ $post->category->title }}</p>
		      </div>
		    </div>

           
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->



</div>


@endsection