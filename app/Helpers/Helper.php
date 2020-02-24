<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\Blog;
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


}