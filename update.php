<?php
require('header.php');
if(!isset($_SESSION['id'])){
  header('location:index.php');
}
if($_GET['id'])
{
    $img = $_GET['id'];
    $query = "SELECT `id`,`editor_code`,`flowchart_name`,`flowchart_category`,`flowchart_description`,`flowchart_iframe` FROM `images` WHERE `id`=$img";
    $res = mysqli_query($con,$query);
    $fetch = mysqli_fetch_array($res);
    $new_img_id=$img;
}




?>

<script src="http://gojs.net/latest/release/go.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css"
    href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css"/>
  <script type="text/javascript" src="html2canvas.js"></script>
      <link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
        <script src="js/fileinput.min.js" type="text/javascript"></script>
        <script src="js/fileinput_locale_es.js" type="text/javascript"></script>
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
  border: 1px solid #62767E;
  }
  textarea{
  width: 100%;
  margin: 5px auto;
  padding: 5px;
  height: 85px;
  border-radius: 5px;
  border: 1px solid #62767E;
  }
  .btn-file{
  width: 100%;
}
.fileinput-remove-button{
  width: 100%;
  margin-bottom: 10px;
}</style>
<script id="code">
  function init() {
    if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
    var $ = go.GraphObject.make;  // for conciseness in defining templates
    myDiagram =
      $(go.Diagram, "myDiagram",  // must name or refer to the DIV HTML element
        {
          initialContentAlignment: go.Spot.Center,
          allowDrop: true,  // must be true to accept drops from the Palette
          "LinkDrawn": showLinkLabel,  // this DiagramEvent listener is defined below
          "LinkRelinked": showLinkLabel,
          "animationManager.duration": 800, // slightly longer than default (600ms) animation
          "undoManager.isEnabled": true  // enable undo & redo
        });
    // when the document is modified, add a "*" to the title and enable the "Save" button
    myDiagram.addDiagramListener("Modified", function(e) {
      var button = document.getElementById("SaveButton");
      if (button) button.disabled = !myDiagram.isModified;
      var idx = document.title.indexOf("*");
      if (myDiagram.isModified) {
        if (idx < 0) document.title += "*";
      } else {
        if (idx >= 0) document.title = document.title.substr(0, idx);
      }
    });
    // helper definitions for node templates
    function nodeStyle() {
      return [
        // The Node.location comes from the "loc" property of the node data,
        // converted by the Point.parse static method.
        // If the Node.location is changed, it updates the "loc" property of the node data,
        // converting back using the Point.stringify static method.
        new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
        {
          // the Node.location is at the center of each node
          locationSpot: go.Spot.Center,
          //isShadowed: true,
          //shadowColor: "#888",
          // handle mouse enter/leave events to show/hide the ports
          mouseEnter: function (e, obj) { showPorts(obj.part, true); },
          mouseLeave: function (e, obj) { showPorts(obj.part, false); }
        }
      ];
    }
    // Define a function for creating a "port" that is normally transparent.
    // The "name" is used as the GraphObject.portId, the "spot" is used to control how links connect
    // and where the port is positioned on the node, and the boolean "output" and "input" arguments
    // control whether the user can draw links from or to the port.
    function makePort(name, spot, output, input) {
      // the port is basically just a small circle that has a white stroke when it is made visible
      return $(go.Shape, "Circle",
               {
                  fill: "transparent",
                  stroke: null,  // this is changed to "white" in the showPorts function
                  desiredSize: new go.Size(8, 8),
                  alignment: spot, alignmentFocus: spot,  // align the port on the main Shape
                  portId: name,  // declare this object to be a "port"
                  fromSpot: spot, toSpot: spot,  // declare where links may connect at this port
                  fromLinkable: output, toLinkable: input,  // declare whether the user may draw links to/from here
                  cursor: "pointer"  // show a different cursor to indicate potential link point
               });
    }
    // define the Node templates for regular nodes
    var lightText = 'whitesmoke';
    myDiagram.nodeTemplateMap.add("",  // the default category
      $(go.Node, "Spot", nodeStyle(),
        // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
        $(go.Panel, "Auto",
          $(go.Shape, "Rectangle",
            { fill: "#62767E", stroke: null },
            new go.Binding("figure", "figure")),
          $(go.TextBlock,
            {
              font: "bold 11pt Helvetica, Arial, sans-serif",
              stroke: lightText,
              margin: 8,
              maxSize: new go.Size(160, NaN),
              wrap: go.TextBlock.WrapFit,
              editable: true
            },
            new go.Binding("text").makeTwoWay())
        ),
        // four named ports, one on each side:
        makePort("T", go.Spot.Top, false, true),
        makePort("L", go.Spot.Left, true, true),
        makePort("R", go.Spot.Right, true, true),
        makePort("B", go.Spot.Bottom, true, false)
      ));
    myDiagram.nodeTemplateMap.add("Start",
      $(go.Node, "Spot", nodeStyle(),
        $(go.Panel, "Auto",
          $(go.Shape, "Circle",
            { minSize: new go.Size(40, 40), fill: "#2E4957", stroke: null }),
          $(go.TextBlock, "Start",
            { font: "bold 11pt Helvetica, Arial, sans-serif", stroke: lightText },
            new go.Binding("text"))
        ),
        // three named ports, one on each side except the top, all output only:
        makePort("L", go.Spot.Left, true, false),
        makePort("R", go.Spot.Right, true, false),
        makePort("B", go.Spot.Bottom, true, false)
      ));
    myDiagram.nodeTemplateMap.add("End",
      $(go.Node, "Spot", nodeStyle(),
        $(go.Panel, "Auto",
          $(go.Shape, "Circle",
            { minSize: new go.Size(40, 40), fill: "brown", stroke: null }),
          $(go.TextBlock, "End",
            { font: "bold 11pt Helvetica, Arial, sans-serif", stroke: lightText },
            new go.Binding("text"))
        ),
        // three named ports, one on each side except the bottom, all input only:
        makePort("T", go.Spot.Top, false, true),
        makePort("L", go.Spot.Left, false, true),
        makePort("R", go.Spot.Right, false, true)
      ));
    myDiagram.nodeTemplateMap.add("Comment",
      $(go.Node, "Auto", nodeStyle(),
        $(go.Shape, "File",
          { fill: "#000", stroke: null }),
        $(go.TextBlock,
          {
            margin: 5,
            maxSize: new go.Size(200, NaN),
            wrap: go.TextBlock.WrapFit,
            textAlign: "center",
            editable: true,
            font: "bold 12pt Helvetica, Arial, sans-serif",
            stroke: '#FFF'
          },
          new go.Binding("text").makeTwoWay())
        // no ports, because no links are allowed to connect with a comment
      ));
    // replace the default Link template in the linkTemplateMap
    myDiagram.linkTemplate =
      $(go.Link,  // the whole link panel
        {
          routing: go.Link.AvoidsNodes,
          curve: go.Link.JumpOver,
          corner: 5, toShortLength: 4,
          relinkableFrom: true,
          relinkableTo: true,
          reshapable: true,
          resegmentable: true,
          // mouse-overs subtly highlight links:
          mouseEnter: function(e, link) { link.findObject("HIGHLIGHT").stroke = "rgba(30,144,255,0.2)"; },
          mouseLeave: function(e, link) { link.findObject("HIGHLIGHT").stroke = "transparent"; }
        },
        new go.Binding("points").makeTwoWay(),
        $(go.Shape,  // the highlight shape, normally transparent
          { isPanelMain: true, strokeWidth: 8, stroke: "transparent", name: "HIGHLIGHT" }),
        $(go.Shape,  // the link path shape
          { isPanelMain: true, stroke: "gray", strokeWidth: 2 }),
        $(go.Shape,  // the arrowhead
          { toArrow: "standard", stroke: null, fill: "gray"}),
        $(go.Panel, "Auto",  // the link label, normally not visible
          { visible: false, name: "LABEL", segmentIndex: 2, segmentFraction: 0.5},
          new go.Binding("visible", "visible").makeTwoWay(),
          $(go.Shape, "RoundedRectangle",  // the label shape
            { fill: "#F8F8F8", stroke: null }),
          $(go.TextBlock, "Yes",  // the label
            {
              textAlign: "center",
              font: "10pt helvetica, arial, sans-serif",
              stroke: "#333333",
              editable: true
            },
            new go.Binding("text", "text").makeTwoWay())
        )
      );
    // Make link labels visible if coming out of a "conditional" node.
    // This listener is called by the "LinkDrawn" and "LinkRelinked" DiagramEvents.
    function showLinkLabel(e) {
      var label = e.subject.findObject("LABEL");
      if (label !== null) label.visible = (e.subject.fromNode.data.figure === "Diamond");
    }
    // temporary links used by LinkingTool and RelinkingTool are also orthogonal:
    myDiagram.toolManager.linkingTool.temporaryLink.routing = go.Link.Orthogonal;
    myDiagram.toolManager.relinkingTool.temporaryLink.routing = go.Link.Orthogonal;
    load();  // load an initial diagram from some JSON text
    // initialize the Palette that is on the left side of the page
    myPalette =
      $(go.Palette, "myPalette",  // must name or refer to the DIV HTML element
        {
          "animationManager.duration": 800, // slightly longer than default (600ms) animation
          nodeTemplateMap: myDiagram.nodeTemplateMap,  // share the templates used by myDiagram
          model: new go.GraphLinksModel([  // specify the contents of the Palette
            { category: "Start", text: "Start" },

            { text: "Step" },
            { text: "???", figure: "Diamond" },
            { category: "End", text: "End" },
            { category: "Comment", text: "Comment" }
          ])
        });
  }
  // Make all ports on a node visible when the mouse is over the node
  function showPorts(node, show) {
    var diagram = node.diagram;
    if (!diagram || diagram.isReadOnly || !diagram.allowLink) return;
    node.ports.each(function(port) {
        port.stroke = (show ? "white" : null);
      });
  }
  // Show the diagram's model in JSON format that the user may edit
  function save() {
    document.getElementById("mySavedModel").value = myDiagram.model.toJson();
    myDiagram.isModified = false;
  }
  function load() {
    myDiagram.model = go.Model.fromJson(document.getElementById("mySavedModel").value);
  }
  // add an SVG rendering of the diagram at the end of this page
  
</script>
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
  height: 600px;
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
</style>
</head>
<body onload="init()">
<div class="container-fluid"  style="padding-top:100px;width:95%;margin:0 auto;">
 
   <div class="row">
     <!--
    <div class="col-sm-2" style="padding:0;">
      <div id="side_area">
        <h3>Images Panel</h3>
       <span style="display: inline-block; vertical-align: top;width:100% ">
        <h5 >Doodles</h5>
        <div id="myPalette" style="min-height: 300px;margin-top:20px;"></div>
      </span>
    <hr>
    <h5>Upload Doodles</h5>
      <form id="form1" runat="server">
         <div class="fileupload fileupload-new" data-provides="fileupload">
    <span class="btn btn-primary btn-file" style="width:100%;"><i class="glyphicon glyphicon-plus"></i><span class="fileupload-new">Upload image</span>
         <input type="file" id="imgInp" class="upload" />
   
  </div>
      </form>
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Search Doodles
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
  <form method="post" id="form_search">
        <input type="text" placeholder="Search" name="search" id="search" autocomplete="off"> 
      </form>
      <div id="result1">
          <?php
          $my_query="select * from custom_images";
          $my_result=mysqli_query($con,$my_query);
          while($my_row=mysqli_fetch_array($my_result)){
            $image=$my_row['image_name'];
             echo '<div class="addme drag" style="z-index: 9999999999" ><img class="custom-img" src="custom_images/'.$image.'" ></div>';
          } 
          ?></div>
           </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
          Arrows
        </a>
      </h4>
    </div>
    <div id="collapsetwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
 <div class="addme drag" style="z-index: 9999999999;position:relative;" ><img class="custom-img" src="custom_images/arrow-left.png" ></div>
 <div class="addme drag" style="z-index: 9999999999;position:relative;" ><img class="custom-img" src="custom_images/arrow-up.png" ></div>
 <div class="addme drag" style="z-index: 9999999999;position:relative;" ><img class="custom-img" src="custom_images/arrow-right.png" ></div>
 <div class="addme drag" style="z-index: 9999999999;position:relative;" ><img class="custom-img" src="custom_images/arrow-down.png" ></div>
 
      
           </div>
    </div>
  </div>
  <?php 
  $i=1;
  $query12="select DISTINCT `tags` from custom_images";
  $result12=mysqli_query($con,$query12);
  while($row12=mysqli_fetch_array($result12)){
  ?>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
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
             echo '<div class="addme drag" style="z-index: 9999999999" ><img class="custom-img" src="custom_images/'.$image.'" ></div>';
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
    <div class="col-sm-8">
      <div id="result"></div>
         <span  class="editor-bound editor" style="display: inline-block; vertical-align: top; padding: 5px; width:100%">
            <div class="" id="myDiagram" style="position: relative; border: 1px solid; height: 600px;border-radius: 5px;border:2px solid #62767E;"></div>
        </span>
             
      
    </div>
  -->
    <div class="col-sm-6 col-sm-offset-3" style="padding:0;">
      <div id="result"></div>
         <form id="flowchart_details" method="post" enctype="multipart/form-data">
      <h5>Flowchart Name</h5>
       <input type="text" name="flowchart_name" id="flowchart_name" placeholder="Flow Chart Name" value="<?php echo $fetch['flowchart_name'];?>" style="width:100%;" required>
       <h5 >Flowchart Tag/Category</h5>
        <input type="text" name="flowchart_category" id="flowchart_category" value="<?php echo $fetch['flowchart_category'];?>" placeholder="Flow Chart Category" style="width:100%;" required>
<input type="hidden" name="flowchart_id" id="flowchart_id" value="<?php echo $fetch['id'];?>" style="width:100%;" required>
        <h5>Flowchart Description</h5>
       <textarea name="flowchart_description" placeholder="Flowchart Description" required><?php echo $fetch['flowchart_description'];?></textarea>
       <h5>Upload Image 1</h5>

         <input type="file" class="upload2" id="file-3" accept="image/*" name="image1" />
 <h5>Upload Image 2</h5>
         <input type="file" class="upload3" id="file-4" accept="image/*" name='image2'/>
 <h5>Upload Pdf File</h5>
         <input type="file" class="upload3" id="file-5" name='pdf' accept=".pdf"/>
   
   <h5>Youtube/Vimeo Iframe</h5>
   <textarea name="flowchart_iframe" placeholder="Youtube/Vimeo Iframe"><?php echo $fetch['flowchart_iframe'];?></textarea>
   <input type="hidden" value="<?php echo $new_img_id;?>" name="img_id">
     <textarea id="mySavedModel" name="flowchart_code" style="height:300px;display:none;"><?php echo $fetch['editor_code'];?></textarea>
 
   
    <input type="submit" class="btn btn-success" id="btnSave" value="Update Flowchart" style="text-align:center;margin:20px auto;display:block;width:100%;height:60px;"/>
      </form>
<textarea style="display:none;" name="flowchart_data" id="flowchart_data"></textarea>
    </div>
    
    
    
  </div>
  </div>




<div id="img-out"></div>
</div>
</body>
</html>
<script>
var selected ="";
var new_save = 0;
var img_id = 0;
var data ="";
var editor_code="";
var user_id="<?php echo $_SESSION['id'];?>";
$(document).ready(function(e) { 
    $("#flowchart_details").submit(function(e) { 
     e.preventDefault();
        run_waitMe('body');
        /*
        $(".editor").css('overflow','visible','important');
        html2canvas($(".editor"), {
            onrendered: function(canvas) {
                theCanvas = canvas;
                data = canvas.toDataURL("image/png");
                editor_code=myDiagram.model.toJson();
        document.getElementById("mySavedModel").value = myDiagram.model.toJson();
        myDiagram.isModified = false;
      //  $('#flowchart_data').val(data);
         //alert($('#flowchart_data').val());
         console.log('1');

             }
            
   
  
        });
*/
        var my_data=new FormData(this);
        //my_data.append('flowchart_data', data);
        setTimeout(function(){ 
  //        my_data.append('flowchart_data', data);
    //      my_data.append('flowchart_code', editor_code);
        $.ajax({

        url: 'update_img.php',
        type: 'POST',
        data: my_data,
        processData: false,
        contentType: false,
        
        success: function (response) {
            //your success code
            console.log(response);
      img_id = response;

      new_save = 1;
      console.log(img_id);
        $('body').waitMe('hide');
      $('#result').html("<div class='alert alert-success'>Your Flowchart has been updated Successfully.<a href='show_flowchart.php?id="+img_id+"'>Click here to View Your Flowchart</a></div>");
      $('#btnSave').attr('disabled','disabled');
      },
        error: function () {
            //your error code
      console.log("Sorry");
        }
    }); 
       
        ///save in db////
       }, 6000);
    });
 });
 
  function update_img(data,code){
    run_waitMe('body');
    var flowchart_name=$('#flowchart_name').val();
    $.ajax({
        url: 'update_img.php',
        type: 'POST',
      data: { user_id: user_id, image_id: img_id, image_path : data, image_code : code,flowchart_name:flowchart_name} ,
        success: function (response) {
            $('body').waitMe('hide');
            //your success code
      console.log(response);
        },
        error: function () {
            //your error code
      console.log("Sorry");
        }
    }); 
    
  }
  
  function convertCanvasToImage(canvas) {
  var image = new Image();
  image.src = canvas.toDataURL("image/png");
  return image;
}

  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                console.log(e.target.result);
        $('.editor').prepend('<div class="dragme drag" style="z-index: 9999999999" ><img class="custom-img" src="'+e.target.result+'" ></div>');
        var clear = $(".upload");
         clear.replaceWith( clear = clear.clone( true ) );
            
    $('.dragme')
    .draggable({
    containment: 'parent'    
})
    .resizable();
      }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $(document).ready(function(){
  $(document.body).on('change','#imgInp',function(){
        readURL(this);
    });
  /*
  $('.dragme')
    .draggable({
    containment: 'parent'    
})
    .resizable();
  
     $(document.body).on('click','.addme',function(){
    var newImg = $(this).clone().prependTo(".editor").addClass("dragme").removeClass("addme");
  $('.dragme')
    .draggable(
  {
    containment: 'parent'    
})
    .resizable();
  });
*/
  });
$(document.body).on('click',".drag",function(){
  $(this).addClass('selected');
  
    selected = $(this);
  console.log(selected);
  
});
$(".editor").click(function(){
  if(selected != ""){
    $('.selected').removeClass('selected');
    selected ="";
  console.log(selected);
  }
  
});
  
  $(document.body).keyup(function(e){
    
    if(e.keyCode == 46)
  {
    
    if(selected != ""){
      selected.remove();
      selected="";
    }
  }

  }) ;

</script>
<script type="text/javascript">
$(document).ready(function() {
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

$( ".editor" ).droppable({
    drop: function( event, ui ) {
        if(original){
             ui.helper.removeClass('ui-draggable-dragging');
             var newDiv = $(ui.helper).clone().removeClass('ui-draggable-dragging');
             newDiv.draggable({
              containment:'.editor',
              cursor : "move",
             })
             $(this).append(newDiv);
             $(newDiv).resizable();
             original = false;
        }

      }  

});
            });
        }
    }); 
});
</script>
<script type="text/javascript">
$('.collapse').collapse('hide');</script>
<script type="text/javascript">
$(document).ready(function(){
var original = false;

$('.drag').mousedown(function(){
   original = true;
});

$( ".drag" ).draggable({
    helper : "clone",
    cursor : "move",
    appendTo:'.editor'
});

$( ".editor" ).droppable({
    drop: function( event, ui ) {
        if(original){
             ui.helper.removeClass('ui-draggable-dragging');
             var newDiv = $(ui.helper).clone().removeClass('ui-draggable-dragging');
             newDiv.draggable({
              containment:'.editor',
              cursor : "move",
             })
             $(this).append(newDiv);
             $(newDiv).resizable();
             original = false;
        }

      }  

});
});
</script>
<script>
    $("#file-3").fileinput({
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-primary",
    fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
  });
  $(document).ready(function() {
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
    });
  </script>
  <script>
    $("#file-4").fileinput({
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-primary",
    fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
  });
  $(document).ready(function() {
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
    });
  </script>
<script>
    $("#file-5").fileinput({
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-primary",
    fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
  });
  $(document).ready(function() {
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
    });
  </script>
