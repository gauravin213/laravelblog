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

              <form class="form-horizontal" role="form" method="POST" action="{{ route('blog.update', ['id' => $blog->id]) }}" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('PUT')}}


              <input type="hidden" name="author" id="author" value="1">


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
                    <label>slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $blog->slug}}">
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
                    <label>Category</label>
                    <input type="hidden" name="post_id" value="{{ $blog->id}}">
                    {{Helper::get_post_categories2($blog->category_id)}}
                  </div>
                </div>
              </div>

      
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="author">Cover:</label>
                    <input type="file" id="upload_post_image" class="form-control" name="bookcover" accept="image/*">
                    <input type="hidden" name="file_remove" id="file_remove">

                    <div id="image_box">
                      @if($blog->image !='iiiii')   
                        <img id="output_left" style="width:95px;" src="{{ url('uploads', $blog->image) }}">    
                        <a href="javascript://" class="file_remove_img">Remove</a>
                      @endif
                    </div>

                    <script>
                      jQuery(document).ready(function(){

                         jQuery(document).on('click', ".file_remove_img", function(){ 
                            jQuery('#file_remove').val('file_remove_img');
                            jQuery('#output_left').remove();
                            jQuery(this).remove();
                         });


                         jQuery(document).on('change', "#upload_post_image", function(event){ 
                            var img_src = URL.createObjectURL(event.target.files[0]);
                            jQuery('#image_box').html('<img src="'+img_src+'" style="width:95px;">');
                            jQuery('#file_remove').val('');
                         });
                      });
                    </script>

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
