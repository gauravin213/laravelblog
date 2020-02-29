<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\Blog;
use App\Category;
use App\CategoryRelationship;
use Illuminate\Support\Facades\DB;
class Helper
{
   
    public static function select_filter_by_column_val($col_name, $tb_name){

        $query = DB::table($tb_name);

        $query->select($col_name)->get();

        $blogs = $query->get();

        ?>
        <select class="custom-select" name="<?php echo $col_name;?>" id="<?php echo $col_name;?>">
          <option value="">select</option>
           <?php foreach ($blogs as $data) { 
           	  $ifselected = (isset($_GET[$col_name]) && $_GET[$col_name] == $data->$col_name) ? "selected='selected'" : "";
           	?>
            <option value="<?php echo $data->$col_name;?>" <?php echo $ifselected;?> ><?php echo $data->$col_name;?></option>
          <?php } ?>
        </select>
        <script type="text/javascript">
        	$(function () {
        		//$('#title').select2();
        		$("#<?php echo $col_name;?>").select2({
			      theme: 'bootstrap4'
			    });
        	});
        </script>
        <?php
    }



    public static function get_post_categories(){

    /*DB::table('category_relationships')
        ->where('post_id', $request->post_id)*/
 
        $query = DB::table('categories');
        $categories = $query->get();
        ?>
        <select class="custom-select" name="category_id" id="category_id">
          <option value="">select</option>
           <?php foreach ($categories as $data) { ?>
            <option value="<?php echo $data->id;?>" ><?php echo $data->title;?></option>
          <?php } ?>
        </select>
        <script type="text/javascript">
          $(function () {
            //$('#title').select2();
            $("#category_id").select2({
            theme: 'bootstrap4'
          });
          });
        </script>
        <?php
    }



    public static function get_post_categories2($cat_id){


      $query = DB::table('categories');
        $categories = $query->get();
        ?>
        <select class="custom-select" name="category_id" id="category_id">
          <option value="">select</option>
           <?php foreach ($categories as $data) { 
            $ifselected = ($cat_id == $data->id) ? "selected='selected'" : "";
            ?>
            <option value="<?php echo $data->id;?>" <?php echo $ifselected;?> ><?php echo $data->title;?></option>
          <?php } ?>
        </select>
        <script type="text/javascript">
          $(function () {
            //$('#title').select2();
            $("#category_id").select2({
            theme: 'bootstrap4'
          });
          });
        </script>
        <?php

    }


}