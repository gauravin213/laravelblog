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



    public static function get_post_category_menu(){

      $query = DB::table('categories')->where('parent', '=', 0);
      $categories = $query->get();

      //echo "<pre>"; print_r($categories->toArray()); echo "</pre>"; die();

      //
      

      echo self::get_main_category_cus_fun($categories->toArray());

      //die();

      //

      ?>

      <!-- <ul class="parent">
        Root node
        <ul class="child">
          <li>Node 1</li>
          <li>Node 3
            <ul class="child">
              <li>Node 4</li>
              <li>Node 5</li>
            </ul>
          </li>
        </ul>
      </ul> -->


      <ul class="navbar-nav">
          <li class="nav-item dropdown">

            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Root node</a>
            

            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Node 1</a></li>
            
              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Node 3</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li><a href="#" class="dropdown-item">Node 4</a></li>
                  <li><a href="#" class="dropdown-item">Node 5</a></li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
          
        </ul>



      <!-- <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>

            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

             <?php foreach ($categories->toArray() as $data) { ?>

              <?php if ($data->parent) { ?>
                
              <?php }else{ ?>

              <?php } ?>

               <li><a href="http://127.0.0.1/laravelblog/<?php echo $data->slug;?>" class="dropdown-item"><?php echo $data->title.'--'.$data->parent;?></a></li>
               
             <?php } ?>

            </ul>
          </li> -->
      <?php

    }


      public static function get_sub_category_cus_fun($term_id){
      
        $query = DB::table('categories')->where('parent', '=', $term_id);
        $categories = $query->get();

        $categories_sub = $categories->toArray();

        $html = "";
        
        if(count($categories_sub)!=0){
            
            $html .= '<li>';
            
                $html = '<ul class="child">';
            
                foreach($categories_sub as $categorie){
                    
                    $html .='<li>';
                       $html .= $categorie->title; 
                      $html .= self::get_sub_category_cus_fun($categorie->id);
                    $html .='</li>';
                    
                }
                
                $html .= '</ul>';
            
            $html .= '</li>';
            
        }
        
        return $html;
    }

    public static function get_main_category_cus_fun($categories){
        

      $html = "";
       
      foreach($categories as $categorie){
          
          $html .= '<ul class="navbar-nav">';

              $html .= $categorie->title;

              $html .= self::get_sub_category_cus_fun($categorie->id);
              
          $html .= '</ul>';
      }
      
      return $html;

      //return '111';
        
    }







}










