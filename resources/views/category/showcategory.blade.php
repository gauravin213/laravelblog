<div class="card">
  <div class="card-body">
    <div id="jstree_demo"></div>
  </div>
</div>

<script type="text/javascript">
var APP_URL = {!! json_encode(url('/')) !!}
</script>

<script type="text/javascript">
var catejstree = $('#jstree_demo');

catejstree.jstree({
  'core' : {
    "animation" : 0,
    "check_callback" : true,
    //"themes" : { "stripes" : true },
    "themes": {
                'name': 'proton',
                'responsive': true
            },
    'data' : {
      'url' : function (node) { 
         return APP_URL+"/getTreeData";
      },
      'dataType' : "json",
      'data' : function (node) {
        return { 'id' : node.id };
      }
    }
  },
  "types" : {
    "#" : {
      "max_children" : 1,
      "max_depth" : 4,
      "valid_children" : ["root"]
    },
    "root" : {
      "icon" : "/static/3.3.9/assets/images/tree_icon.png",
      "valid_children" : ["default"]
    },
    "default" : {
      "valid_children" : ["default","file"]
    },
    "file" : {
      "icon" : "glyphicon glyphicon-file",
      "valid_children" : []
    }
  },
  "plugins" : [
  //"checkbox",
  //"contextmenu",
  "dnd",
  "massload",
  "search",
  //"sort",
  "state",
  "types",
  "unique",
  //"wholerow",
  "changed",
  "conditionalselect"
  ]
});

catejstree.bind("move_node.jstree", function(e, data) {

   console.log("Drop node " + data.node.id + " to " + data.parent);

   var parent_node = data.parent;

   var child_node = data.node.id;

   jQuery.ajax({
         url: APP_URL+'/ajaxRequest',
        type: "POST",
        data: {_token: "{{ csrf_token() }}", parent_node: parent_node, child_node: child_node},
        cache: false,
        dataType: 'json',
        beforeSend: function(){
        },
        complete: function(){
        },
        success: function (response) {  //console.log(response);
        }
    });

});

catejstree.on("changed.jstree", function (e, data) {
  //console.log(data.changed.selected); // newly selected
  //console.log(data.changed.deselected); // newly deselected

  var cate_id = data.changed.selected;

  var cate_id_deselected = data.changed.deselected

  if (cate_id != "" && cate_id_deselected!="") {

     var url = APP_URL+'/category/'+cate_id+'/edit';

    console.log('url: '+url);

    setTimeout(function(){ 

      window.location.href = url;

  }, 500);



  }

 

    /*jQuery.ajax({
        url: APP_URL+'/ajaxeditirlRequest',
        type: "POST",
        data: {_token: "{{ csrf_token() }}", cate_id: cate_id},
        cache: false,
        dataType: 'json',
        beforeSend: function(){
        },
        complete: function(){
        },
        success: function (response) {  console.log(response);

          //window.location.href;
        }
    });*/


});
</script>