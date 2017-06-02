<?php
session_start();
if(!isset($_SESSION['id'])){
  header('location:index.php');
}
error_reporting(0);
 require('header.php');
if($_GET['id'])
{
    $img = $_GET['id'];
    $query = "SELECT `id`,`editor_code`,`flowchart_name`,`flowchart_category`,`flowchart_description`,`flowchart_iframe` FROM `images` WHERE md5(id)='$img'";
    $res = mysqli_query($con,$query);
    $fetch = mysqli_fetch_array($res);
    $new_img_id=$img;
}

?>



      
   
   
 

  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
   
       <script src="js/lodash.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.3.3/backbone-min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jointjs/0.9.7/joint.min.css" />
  <script src="js/joint.js"></script>
  <script src="js/graph.lib.js"></script>
    <script src="js/degre.js"></script>
     <script src="js/shapes.dev.js"></script>
    
  
 
      <script src="js/rappid.js"></script>
  
  
  
	
  
  
        <link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
        <script src="js/fileinput.min.js" type="text/javascript"></script>

         <script src="js/fileinput_locale_es.js" type="text/javascript"></script>
         <script src="js/waitMe.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap-tagsinput.css">
  <script src="css/bootstrap-tagsinput.min.js"></script>
  <link href="css/jquery.tagit.css" rel="stylesheet" type="text/css">
<link href="css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
    <script src="js/tag-it.min.js" type="text/javascript" charset="utf-8"></script>
    
           <script type="text/javascript">
  function run_waitMe(loadingin){
  $(loadingin).waitMe({
   effect: 'bounce',
   text: 'Please wait...',
   bg: 'rgba(215,215,215,0.7)',
   color:'#002040',
   sizeW:'',
   sizeH:''
  });
 }
  </script>
  
<style type="text/css">
body{
  font-family: 'Montserrat', sans-serif !important;
}
#form_search input[type=text],#flowchart_name,#flowchart_category{
  width: 100%;
  margin: 5px auto;
  padding: 5px;
  height: 35px;
  border-radius: 5px;
  margin-bottom: 0;
  border: 1px solid #62767E;
  }
  textarea{
  width: 100%;
  margin: 5px auto;
  padding: 5px;
  height: 85px;
  border-radius: 5px;
  margin-top: 0;
  border: 1px solid #62767E;
  }</style>

<style>
.dragme{
height:100px;
width:100px;
 position: absolute;
}
.addme{
height:60px;
width:60px;
margin:5px;
float:left;
 
}
.custom-img{
height:100%;
width:100%;
}
.selected{
  border:4px solid #1E90FF;
  padding:3px;
}
.clearfix{*zoom:1;}.clearfix:before,.clearfix:after{display:table;content:"";line-height:0;}
.clearfix:after{clear:both;}
.hide-text{font:0/0 a;color:transparent;text-shadow:none;background-color:transparent;border:0;}
.input-block-level{display:block;width:100%;min-height:30px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
.btn-file{overflow:hidden;position:relative;vertical-align:middle;}.btn-file>input{position:absolute;top:0;right:0;margin:0;opacity:0;filter:alpha(opacity=0);transform:translate(-300px, 0) scale(4);font-size:23px;direction:ltr;cursor:pointer;}
.fileupload{margin-bottom:9px;}.fileupload .uneditable-input{display:inline-block;margin-bottom:0px;vertical-align:middle;cursor:text;}
.fileupload .thumbnail{overflow:hidden;display:inline-block;margin-bottom:5px;vertical-align:middle;text-align:center;}.fileupload .thumbnail>img{display:inline-block;vertical-align:middle;max-height:100%;}
.fileupload .btn{vertical-align:middle;}
.fileupload-exists .fileupload-new,.fileupload-new .fileupload-exists{display:none;}
.fileupload-inline .fileupload-controls{display:inline;}
.fileupload-new .input-append .btn-file{-webkit-border-radius:0 3px 3px 0;-moz-border-radius:0 3px 3px 0;border-radius:0 3px 3px 0;}
.thumbnail-borderless .thumbnail{border:none;padding:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;}
.fileupload-new.thumbnail-borderless .thumbnail{border:1px solid #ddd;}
.control-group.warning .fileupload .uneditable-input{color:#a47e3c;border-color:#a47e3c;}
.control-group.warning .fileupload .fileupload-preview{color:#a47e3c;}
.control-group.warning .fileupload .thumbnail{border-color:#a47e3c;}
.control-group.error .fileupload .uneditable-input{color:#b94a48;border-color:#b94a48;}
.control-group.error .fileupload .fileupload-preview{color:#b94a48;}
.control-group.error .fileupload .thumbnail{border-color:#b94a48;}
.control-group.success .fileupload .uneditable-input{color:#468847;border-color:#468847;}
.control-group.success .fileupload .fileupload-preview{color:#468847;}
.control-group.success .fileupload .thumbnail{border-color:#468847;}
#side_area{
  border-radius: 5px;border:2px solid #62767E;
  padding: 10px;
  margin-top: 5px;
  height: 550px;
  overflow: auto;
}
#side_area h3{
  text-align: center;
}
h5{
  margin-bottom: 5px;
}
.fileupload-new{
  margin-left: 5px;
}
canvas{
  background: white !important;
}
.btn-file{
  width: 75%;
 // float:right;
 margin-left:5px;
}
.fileinput-remove-button{
  width: 20%;
  float:left;
  margin-bottom: 10px;
}
svg{
  width: 100% !important;
}
ul.tagit input[type="text"] {width:100%;}
</style>
</head>
<body>
<div class="container-fluid"  style="padding-top:100px;width:95%;margin:0 auto;">
   <div class="row">
    <div class="col-sm-2" style="padding:0;">
      <div id="side_area">
       
     <button id="addtextbox" class="btn btn-primary" style="margin-left:5px;width:100%;margin-bottom:5px;" title="add text"><i class="fa fa-text-height"></i> Add Text</button>
     <button id="addcommentbox" class="btn btn-primary" style="margin-left:5px;width:100%;margin-bottom:5px;" title="add Comment"><i class="fa fa-text-height"></i> Add Comment</button>

<!--  <h5>Resize shapes</h5>
<input type="range" name="points" class="size" min="0" max="1000">
-->
        <h5> Search Shapes</h5>
        <form method="post" id="form_search">
        <input type="text" placeholder="Search" name="search" id="search" autocomplete="off"> 
      </form>
      <div id="result1">
          <?php
          $my_query="select * from custom_images LIMIT 4";
          $my_result=mysqli_query($con,$my_query);
          while($my_row=mysqli_fetch_array($my_result)){
            $image=$my_row['image_name'];
             echo '<div class="addme drag" style="position:relative;" ><img class="custom-img" src="custom_images/'.$image.'" ></div>';
          } 
          ?></div>
       
    <hr>
    <h5 >Upload Shapes</h5>
      <form id="forportElement" runat="server">
         <div class="fileupload fileupload-new1" data-provides="fileupload">
    <span class="btn btn-primary btn-file" style="width:100%;"><i class="glyphicon glyphicon-plus"></i><span class="fileupload-new1">Upload shapes</span>
         <input type="file" id="imgInp" class="upload" />
   
  </div>
      </form>
     



<textarea name="comment" class="comment" id="comment_box"></textarea>


      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin-top:10px;">
  
  <?php 
  $i=1;
  $query12="select DISTINCT `tags` from custom_images";
  $result12=mysqli_query($con,$query12);
  while($row12=mysqli_fetch_array($result12)){
  ?>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title" style="text-transform:capitalize;">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $i;?>" aria-expanded="false" aria-controls="collapse_<?php echo $i;?>">
          <?php echo $row12['tags'];?>
        </a>
      </h4>
    </div>
    <div id="collapse_<?php echo $i;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
      <?php
      $tags12=$row12['tags'];
       $new_query="select * from custom_images where tags='$tags12'";
       $new_result=mysqli_query($con,$new_query);
       while($new_row=mysqli_fetch_array($new_result)){
          $image=$new_row['image_name'];
             echo '<div class="addme drag" style="position:relative;" ><img class="custom-img" src="custom_images/'.$image.'" ></div>';
       }

       ?>
      </div>
    </div>
  </div>
  <?php 
$i++;
}?>
</div>
     
        
        
    </div>
  </div>
    <form id="flowchart_details" method="post" enctype="multipart/form-data">
    <div class="col-sm-8">
      
      <div style="padding:5px;">
       <div id="result"></div>
      <h5 >Expleen Title</h5>
 
       <input type="text" name="flowchart_name" id="flowchart_name" placeholder="Flow Chart Name" value="<?php echo $fetch['flowchart_name'];?>" style="width:100%;margin-bottom:10px;" required>
<button id="del_item" type="button" class="btn btn-danger" style="width:70px;margin-bottom:5px;margin-left:5px;" title="delete"><i class="fa fa-trash"></i></button>
<button id="copy_item" type="button" class="btn btn-success" style="margin-left:5px;width:70px;margin-bottom:5px;" title="copy"><i class="fa fa-files-o"></i></button>
<button id="undo-button" type="button" class="btn btn-danger" style="width:70px;margin-bottom:5px;margin-left:5px;" title="undo"><i class="fa fa-undo"></i></button>
<button id="redo-button" type="button" class="btn btn-success" style="margin-left:5px;width:70px;margin-bottom:5px;" title="redo"><i class="fa fa-repeat"></i></button>
       </div>
         <span  class="editor-bound editor" style="display: inline-block; vertical-align: top; padding: 5px; width:100%">
            <div class="" id="myDiagram" style="position: relative; border: 1px solid; height: 450px;border-radius: 5px;border:2px solid #62767E;">
  <div id="paper" class="paper"></div></div>
        </span>
          <h5>Expleen Description</h5>
       <textarea name="flowchart_description" placeholder="Flowchart Description"><?php echo $fetch['flowchart_description'];?></textarea>
   <input type="submit" class="btn btn-success" id="btnSave" value="Update Expleen" style="text-align:center;margin:20px auto;display:block;width:25%;float:right;height:60px;"/>
       
           
      
    </div>
    <div class="col-sm-2" style="padding:0;">
       <h5 >Category</h5>
 <p>
           <input type="hidden" name="tags" id="mySingleField" required  value="<?php echo $fetch['flowchart_category'];?>">
         </p>
            <ul id="singleFieldTags"></ul>
       <input type="hidden" name="flowchart_id" id="flowchart_id" value="<?php echo md5($fetch['id']);?>" style="width:100%;" required>

		<h4 style="margin-top:30px;">More References</h4>
         <h5>Upload Image 1</h5>

         <input type="file" class="upload2" id="file-3" accept="image/*" name="image1" />
 <h5 style="clear:both;">Upload Image 2</h5>
         <input type="file" class="upload3" id="file-4" accept="image/*" name='image2'/>
 <h5 style="clear:both;">Upload Pdf File</h5>
         <input type="file" class="upload3" id="file-5" name='pdf' accept=".pdf"/>
   <h5 style="clear:both;">Youtube/Vimeo Iframe</h5>
   <textarea name="flowchart_iframe" placeholder="Youtube/Vimeo Iframe"><?php echo $fetch['flowchart_iframe'];?></textarea>
  
   <textarea style="display:none;" name="flowchart_data" id="flowchart_data"></textarea>
   <textarea style="display:none;" name="flowchart_data" id="flowchart_data"></textarea>
   <textarea style="display:none;" name="svg_string" id="#svg_string"></textarea>
    
      
    </div>
    
    </form>

    
  </div>
  </div>




<div id="img-out"></div>
</div>
<?php require('footer.php');?>
</body>
</html>
<script>
var old_string="<?php echo $fetch['editor_code'];?>";

var portElement;
var image;
var jsonString;
var new_save = 0;
var img_id = 0;
var selected = '';
var data ="";
var editor_code="";
var image;
var x_axis=10;
var y_axis=10;
var image_link="";
var address="http://www.expleen.com/";
var image_source="";

 var cPushArray = new Array();
var cStep = -1;
var ctx;
var user_id="<?php echo $_SESSION['id'];?>";

var graph = new joint.dia.Graph();
$(document).ready(function(e) { 
saveJson();
$(document).keydown(function(e) {
    if (e.keyCode == 90 && e.ctrlKey) {
       undo();
    }
	if (e.keyCode == 89 && e.ctrlKey) {
        redo();
    }
	if (e.keyCode == 67 && e.ctrlKey) {
        copy_item();
       
    }
	if (e.keyCode == 46) {
        delete_item();
    }
	
	
});

console.log(graph);

var paper = new joint.dia.Paper({
    el: $('#paper'),
    width: 1000,
    height: 445,
    gridSize: 10,
    model: graph,
   defaultLink: new joint.shapes.devs.Link({
    
   router: { name: 'manhattan' },
    connector: { name: 'rounded' },
        attrs: {
           
        '.connection': {
            stroke: '#333333',
            'stroke-width': 3
        },
        '.marker-target': {
            fill: '#333333',
            d: 'M 10 0 L 0 5 L 10 10 z'
        }
        }
    }),
	validateConnection: function(cellViewS, magnetS, cellViewT, magnetT, end, linkView) {
        // Prevent loop linking
        return (magnetS !== magnetT);
    },
	snapLinks: { radius: 75 }
});

graph.fromJSON(JSON.parse(old_string));

$(document.body).on('click','#addtextbox',function(e){
	
var rectangle = new joint.shapes.devs.Model({
    position: { x: 200, y: 200 },
    size: { width: 200, height: 90 },
    inPorts: [''],
    outPorts: [''],
    attrs: {
        '.label': { text: 'Enter Text...', 'ref-x': .4, 'ref-y': .2 },
        rect: { fill: '#F0F0F0' },
        '.inPorts circle': { fill: '#FFF' },
        '.outPorts circle': { fill: '#FFF' }
    }
	
});
graph.addCell(rectangle);
selectText(rectangle);
saveJson();
});

$(document.body).on('click','#addcommentbox',function(e){
  
var rectangle = new joint.shapes.devs.Model({
    position: { x: 200, y: 200 },
    size: { width: 200, height: 20 },
    attrs: {
        '.label': { text: 'Enter comment...', 'ref-x': .4, 'ref-y': .2 },
        rect: { fill: '#fff',stroke: 'none' },

    }
  
});
graph.addCell(rectangle);
selectText(rectangle);
saveJson();
});
paper.on('cell:pointerup', 
    function(cellView, evt, x, y) { 
      
   saveJson(); 

      
  if(!(cellView.model.isLink()))
      {
        if(selected!=""){
          selected.attr({
    rect: { stroke: 'none' }});
        
        }
        selected =  cellView.model;
        var selectedEle = $("g[model-id~='"+selected.id+"']").attr('id');
        if(($('#'+selectedEle).find('rect').attr("fill"))=='#F0F0F0')
        {
          console.log("i am her");
          $(".comment").css("display", 'block');
          $('.comment').focus();
          $(".comment").val(selected.attr('.label/text'));
        }
       
       else if(($('#'+selectedEle).find('rect').attr("fill"))=='#fff')
        {
          console.log("i am her");
          $(".comment").css("display", 'block');
          $('.comment').focus();
          $(".comment").val(selected.attr('.label/text'));
        }
        else{
          $(".comment").css("display", 'none');}
    
        selected.attr({
    rect: { stroke: '#000' }});
        var w = selected.get('size');
        $('.size').val(w.width);
        $('.height').val(w.height);
        $('.width').val(w.width);
      }
    }
);
$(".size").on("input", function(){
if(selected!=""){
selected.resize(this.value, this.value);
var child = selected.getEmbeddedCells();
child[0].resize(this.value, this.value);
saveJson();
}
});
$(".height").on("input", function(){
if(selected!=""){
selected.resize($('.width').val(),this.value);
var child = selected.getEmbeddedCells();
child[0].resize($('.width').val(), this.value);
saveJson();
}
});
$(".width").on("input", function(){
if(selected!=""){
selected.resize(this.value,$('.height').val());
var child = selected.getEmbeddedCells();
child[0].resize(this.value,$('.height').val());
saveJson();
}

});
$(document.body).on('click','#del_item',function(e){
delete_item();
});
function delete_item(){if(selected!=""){
selected.remove();
saveJson();
}}
$(document.body).on('click','#copy_item',function(e){
copy_item();
});
function copy_item(){
	if(selected!=""){
var child = selected.getEmbeddedCells();
var img = child[0];
var clone = selected.clone();
var clone_img = img.clone();
clone.embed(clone_img);
graph.addCells([clone,clone_img]);
clone.translate(10, 10);
saveJson();
select(clone);
}}



   graph.on('all', function(cell) { 
  console.log(cell) 
});

  $("#flowchart_details").submit(function(e) { 
      e.preventDefault();
       run_waitMe('body');
      if($('#mySingleField').val() ==""){
        $('body').waitMe('hide');
           $('#result').html("<div class='alert alert-danger'>Please select category first.</div>");
   
      }else{
  if(selected!=""){
console.log("hello");
          selected.attr({
    rect: { stroke: 'none' }});
        
        }
      
        $(".editor").css('overflow','visible','important');
       var my_data=new FormData(this);
        $(".joint-port").hide();
  
  paper.toSVG(function(svgString) {
console.log('work');
   var canvas = svgString;
   console.log(svgString);
   my_data.append('svgString',svgString);
console.log(graph.toJSON());
//var json_string=graph.toJSON();
var json_new_string=JSON.stringify(graph); 
   my_data.append('json',json_new_string);
   $.ajax({

        url: 'model/update.php',
        type: 'POST',
         data: my_data,
        processData: false,
        contentType: false,
        
        
        success: function (response) {
            //your success code
           console.log(response);
    
 $('body').waitMe('hide');
      var flow_name=$('#flowchart_name').val();
      flow_name = flow_name.replace(' ', '+');
      $('#result').html("<div class='alert alert-success'>Your expleen has been updated.<a href='show_flowchart.php?id="+response+"&title="+flow_name+"'> Click here to view</a></div>");
      $('#btnSave').attr('disabled','disabled');
      },
        error: function () {
            //your error code
      console.log("Sorry");
        }
    }); 
   
   if(selected!=""){
          selected.attr({
    rect: { stroke: 'none' }
  });
        
        }
   
  
});

   
  }
        });




  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                console.log(e.target.result);
                image_link=e.target.result;
   
			add_image(image_link,x_axis,y_axis);

        var clear = $(".upload");
         clear.replaceWith( clear = clear.clone( true ) );
            
   
      }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
  $(document.body).on('change','#imgInp',function(){
    
		readURL(this);
		setTimeout(function(){ saveJson(); }, 500);
		 
    });
    $("#file-3").fileinput({
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-primary",
    fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
  });
        $("#test-upload").fileinput({
            'showPreview' : false,
            'allowedFileExtensions' : ['jpg', 'png','gif'],
            'elErrorContainer': '#errorBlock'
        });
        /*
        $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
            alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
        });
        */
    $("#file-4").fileinput({
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-primary",
    fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
  });
        $("#test-upload").fileinput({
            'showPreview' : false,
            'allowedFileExtensions' : ['jpg', 'png','gif'],
            'elErrorContainer': '#errorBlock'
        });
        /*
        $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
            alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
        });
        */
  
    $("#file-5").fileinput({
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-primary",
    fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
  });
        $("#test-upload").fileinput({
            'showPreview' : false,
            'allowedFileExtensions' : ['jpg', 'png','gif'],
            'elErrorContainer': '#errorBlock'
        });
        /*
        $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
            alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
        });
        */
		$('#undo-button').click(function() {
		
		undo();
			});
		
$('#redo-button').click(function() {redo(); });
function undo()
{
	 if (cStep > 0) {
        cStep--;
graph.clear();
graph.fromJSON((cPushArray[cStep]));
console.log(cStep);
    }
	


}
function redo()
{
	if (cStep < cPushArray.length-1) {
        cStep++;
		graph.clear();graph.fromJSON((cPushArray[cStep]));
console.log(cStep);
     }
	

}
$(".comment").css("display", 'none');
$('.comment').on('input', function() {
	
   // alert('Text1 changed!');
        selected.attr({
   '.label': { text: $('.comment').val()}

});
saveJson();
});

        function add_image(image_link,x_axis,y_axis){

		
			 portElement = new joint.shapes.devs.Model({
    position: { x: 10, y: 10 },
    size: { width: 90, height: 90 },
   inPorts: ['',' '],
    outPorts: ['  ','   '], 
    attrs: {
     '.label': { text: '', 'ref-x': .4, 'ref-y': .2 },
            rect: { stroke: 'none', 'fill-opacity': 0 },
             
    '.inPorts circle': { fill: '#fff' },
        '.outPorts circle': { fill: '#fff' }
    }
});

image = new joint.shapes.basic.Image({
    position : {
        x : 10,
        y : 10
    },
    size : {
        width : 90,
        height : 90
    },
    attrs : {
        image : {
            "xlink:href" : image_link,
         width : 100,
            height : 100
        }
    }
});

portElement.embed(image);
graph.addCells([portElement,image]);
portElement.toFront(true);
console.log("done");
select(portElement);
		}
		var original = false;
$( '.editor' ).on( "mousemove", function( event ) {
  x_axis=event.pageX-300;
  y_axis=event.pageY-250;
});
$('.drag').mousedown(function(){
   original = true;
});

$( ".drag" ).draggable({
    helper : "clone",
    cursor : "move",
    appendTo:'.editor'
});
 $( ".drag" ).draggable({
      start: function() {
      image_source= address+$(this).find('img').attr('src');
	}
      });
$( ".editor" ).droppable({
    drop: function( event, ui ) {
		 add_image(image_source,x_axis,y_axis);
		 image.position(x_axis,y_axis);
		 portElement.position(x_axis,y_axis);
        
      }  

});
		$("#search").keyup(function (e) {
    
        //removes spaces from username
       
        
        var search = $(this).val();
        if(search.length < 2){$("#result").html('');return;}
        
        if(search.length >= 2){
         //    run_waitMe('body');
            $.get('search_image.php', {'name':search}, function(data) {
           //   $('body').waitMe('hide');

              $("#result1").html(data);
             
			  var original = false;

$('.drag').mousedown(function(){
   original = true;
});

$( ".drag" ).draggable({
    helper : "clone",
    cursor : "move",
    appendTo:'.editor'
});
 $( ".drag" ).draggable({
      start: function() {
      image_source= address+$(this).find('img').attr('src');
	}
      });
$( ".editor" ).droppable({
    drop: function( event, ui ) {
		 add_image(image_source,x_axis,y_axis);
		 image.position(x_axis,y_axis);
		 portElement.position(x_axis,y_axis);
        
      }  

});



            });
        }
    }); 

  });
function saveJson(){
	
		cStep++;
		if (cStep < cPushArray.length) {
			cPushArray.length = cStep; }
			cPushArray.push(graph.toJSON());
			console.log(graph.toJSON());

}
function select(element){
	
	if(selected!=""){
          selected.attr({
    rect: { stroke: 'none' }});
        }
		selected=element;
	 selected.attr({
    rect: { stroke: '#000' }});
        var w = selected.get('size');
        $('.size').val(w.width);
        $('.height').val(w.height);
        $('.width').val(w.width);
	     $(".comment").css("display", 'none');}
    

function selectText(element){
	
	if(selected!=""){
          selected.attr({
    rect: { stroke: 'none' }});
        }
	selected=element;
	selected.attr({
    rect: { stroke: '#000' }});
        var w = selected.get('size');
        $('.size').val(w.width);
        $('.height').val(w.height);
        $('.width').val(w.width);
          $(".comment").css("display", 'block');
          $('.comment').focus();
          $(".comment").val(selected.attr('.label/text'));
        }
        

  </script>
<?php $newvar=array();
$new_q="select * from tbl_categories";
$new_result=mysqli_query($con,$new_q);
mysqli_num_rows($new_result);
while($new_row=mysqli_fetch_array($new_result)){
$new_name=$new_row['name'];
$newvar[]=$new_name;
}
?>
<script>
        $(function(){
            var sampleTags = <?php echo json_encode($newvar); ?>;

            //-------------------------------
            // Minimal
            //-------------------------------
           

            //-------------------------------
            // Single field
            //-------------------------------
            $('#singleFieldTags').tagit({
                availableTags: sampleTags,
                // This will make Tag-it submit a single form value, as a comma-delimited field.
                singleField: true,
                singleFieldNode: $('#mySingleField')
            });

            // singleFieldTags2 is an INPUT element, rather than a UL as in the other 
            // examples, so it automatically defaults to singleField.
           

            //-------------------------------
            // Preloading data in markup
            //-------------------------------
            

            //-------------------------------
            // Tag events
            //-------------------------------
            
            
        });
    </script>


