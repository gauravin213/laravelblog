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


		    @foreach ($posts as $post)
			<div class="card card-primary card-outline">
		      <div class="card-header">
		        <h5 class="card-title m-0">{{ $post->title }}</h5>
		      </div>
		      <div class="card-body">
		        <h6 class="card-title">Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h6>

		        <p class="card-text">
              {{  substr(strip_tags( $post->description ), 0, 250) }} 
              {{ strlen(strip_tags( $post->description )) > 250 ? '...' : ""  }}
            </p>
		        <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Go somewhere</a>
		      </div>
		    </div>
			@endforeach

           
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->



</div>


@endsection