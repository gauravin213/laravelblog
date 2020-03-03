@extends('layouts.appadmin')

@section('content')

<div class="content-wrapper">
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Create Page</h1>
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
            <form class="form-horizontal" role="form" method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}


              <input type="hidden" name="author" id="author" value="1">


              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>slug</label>
                    <input type="text" name="slug" id="slug" class="form-control">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Category</label>
                    {{Helper::get_post_categories2('')}}
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
                      <img id="output_left" style="width:95px;" src="">    
                    </div>

                    <script>
                      jQuery(document).ready(function(){

                         jQuery(document).on('click', ".file_remove_img", function(){ 
                            jQuery('#file_remove').val('file_remove_img');
                            jQuery('#image_box').remove();
                            jQuery(this).remove();
                         });

                         jQuery(document).on('change', "#upload_post_image", function(event){ 
                            var img_src = URL.createObjectURL(event.target.files[0]);
                            jQuery('#image_box').html('<img src="'+img_src+'" style="width:95px;"><a href="javascript://" class="file_remove_img">Remove</a>');
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
                        <option value="publish">Publish</option>
                        <option value="draft">Draft</option>
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
