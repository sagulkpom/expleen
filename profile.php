<?php
 require('header.php');
 
$profile_url = $_GET["profile_name"]
//$profile_url = "testing"

?>

<?php	
		include("config.php");
		$query2 = "SELECT * FROM flowchart_users WHERE profile_url = '$profile_url' LIMIT 1";
		$result = mysqli_query($con, $query2);
		while($row = mysqli_fetch_assoc($result))
		{
		$user_id=$row['id'];
		}
?> 

<?php	
		include("config.php");
		$query2 = "SELECT count(*) AS likes_count FROM flowchart_likes WHERE user_id = '$user_id'";
		$result = mysqli_query($con, $query2);
		while($row = mysqli_fetch_assoc($result))
		{
		$likes_count=$row['likes_count'];
		}
?> 

<?php	
		include("config.php");
		$query2 = "SELECT count(*) AS expleen_count FROM images WHERE user_id = '$user_id'";
		$result = mysqli_query($con, $query2);
		while($row = mysqli_fetch_assoc($result))
		{
		$expleen_count=$row['expleen_count'];
		}
?>

<?php

	include("config.php");
	$query = "SELECT * FROM `flowchart_users` WHERE id = '$user_id' LIMIT 1";
	//echo $query;
	$q = mysqli_query($con, $query);
	while($row = mysqli_fetch_assoc($q)){
			$name = $row['name'];
			$last_name = $row['last_name'];
			$profile_description = $row['profile_description'];
			$profile_url =  $row['profile_url'];
			
			if($row['profile_pic_url'] == NULL){
				$profile_pic_url = 'profile_pictures/default.jpg';
			} else {
				$profile_pic_url = $row['profile_pic_url'];
			}
	}
	
?>



<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 

<script src="http://jointjs.com/js/vendor/lodash/lodash.min.js"></script>
<script src="http://jointjs.com/js/vendor/backbone/backbone-min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jointjs/0.9.7/joint.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jointjs/0.9.7/joint.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jointjs/0.9.7/joint.shapes.devs.js"></script>
<script src="http://jointjs.com/js/vendor/graphlib/dist/graphlib.core.js"></script>
<script src="http://jointjs.com/js/vendor/dagre/dist/dagre.core.js"></script>
<script src="http://jointjs.com/js/rappid/v1.7/rappid.min.js"></script>




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


.heading{
  margin: 50px;
  margin-bottom: 50px;
}
.heading input[type=text]{
margin:10px auto !important;
max-width: 500px;
  }
  .heading input[type=submit]{
    margin: 0 auto !important;
    display: block;
    }
    .heading h1{
      text-align: center;
      margin-bottom: 20px;
      }
      #show_data h3{
        text-transform: capitalize;
        text-decoration: underline;
        padding: 15px;
        }


.profile-photo { 
  clear: both;
  display: block;
  max-width: 150px;
  margin: 0 auto 30px;
  border-radius: 100%;
  
    float: left;
  align-self: center;
  
  margin: 100px 150px 100px 80px;
}



.split-para      { display:block;margin:10px;}
.split-para span { display:block;float:right;width:30%;margin-left:10px;}
.split-para2 span { display:block;width:85%;margin-right:80px;}


</style>
</head>
<body>	


<div id="wrapper">
    <section>
        <img src="<?php echo $profile_pic_url?>" alt="User Profile Picture" class="profile-photo">
</div>

<div class="container-fluid" style="padding-top:70px;width:90%;margin:0 auto;">
    <h3>
		<?php echo $name, ' ', $last_name;?> 
	</h3>
	
			<p class="split-para">About Me <span style="color:#357AD2">Likes: <?php echo $likes_count?> | Expleens: <?php echo $expleen_count?></span>
		</p>
		<!--<p class="split-para"><span>Total Expleens: <?php //echo $expleen_count?></span></p>	-->

<p class="split-para2"><span><?php echo nl2br(stripslashes($profile_description));?></span><br></p>
<br>

    
<div>
    <p style="margin-top:-30px;">Profile URL: <a href="http://www.expleen.com/<?php echo $profile_url?>">www.expleen.com/<?php echo $profile_url?></a> </p>
</div>
</div>



<div id="wrap" style="padding-top:5px;">







<div id="main" class="main-full" style="min-height:80vh;">
  
<div style="clear:both"></div>
<div style="margin:0 auto;width:93%;" id="show_data">

<?php
 $query12="select `name` from tbl_categories";
  $result12=mysqli_query($con,$query12);
  while($row12=mysqli_fetch_array($result12)){
$flowchart_category=$row12['name'];
  $query13="select * from images where flowchart_category like '%$flowchart_category%' AND user_id= '$user_id' order by id DESC;";
  $result13=mysqli_query($con,$query13);
if(mysqli_num_rows($result13)>0){
?>
<h3><?php echo $row12['name'];?></h3> 

<ol class="dribbbles group">
<div id="owl-example" class="owl-carousel owl-example">
  <?php
  
   while($row=mysqli_fetch_array($result13)){
 $flowchart_id=$row['id'];
    ?>
<div class="item">
<li id="screenshot-2198341" class="group" style="width:190px;border-radius:10px;margin-right:0;    height: 150px;margin-bottom: 0;">
  <div class="dribbble" style="border-radius:10px;">
    <div class="dribbble-shot">
      <div class="dribbble-img">
        <a class="dribbble-link" href="#none" ><div data-picture="" data-alt="Sleeping">
         <object type="image/svg+xml" data="expleen_svg/<?php echo $row['image'];?>">
    </object>
        </div>
        </a>
<div class="">
  <a class="img_modal dribbble-over" href="show_flowchart.php?title=<?php echo str_replace(" ","+",$row['flowchart_name']);?>&id=<?php echo $row['id'];?>">    <strong style="text-transform:capitalize;"><?php if (strlen($row['flowchart_name']) > 35){
  $id=$row['id'];
   $str = substr($row['flowchart_name'], 0, 35) . '...'; echo $str;
}else{
    echo $row['flowchart_name'];
} ?></strong>
      <p style="line-height:1.5;">
    <?php if (strlen($row['flowchart_description']) > 80){
  $id=$row['id'];
   $str = substr($row['flowchart_description'], 0, 80) . '...'; echo $str;
}else{
    echo $row['flowchart_description'];
} ?>
</p>
<hr>
<h6 style="position:absolute;bottom:0;padding-right:0px;">
<i class="fa fa-user"></i>
    <span class="attribution-user">
      <?php 
      $user_id=$row['user_id'];
      $new="select * from flowchart_users where id='$user_id'";
      $new_result=mysqli_query($con,$new);
      $new_row=mysqli_fetch_array($new_result);
      ?>
      <?php echo $new_row['name'];?>
      
    </span>
  </h6>
<h6 style="position:absolute;bottom:0;right:10px;padding-right:0px;">
<i class="fa fa-thumbs-up"></i>
    <span class="attribution-user">
<?php
$new="select * from flowchart_likes where flowchart_id='$flowchart_id'";
      $new_resul=mysqli_query($con,$new);
      $new_ro=mysqli_num_rows($new_resul);
?>
 <?php echo $new_ro;$new_ro=0;?>
      
    </span>

  </h6>
</a>
</div>
</div>
      

    </div>
    

  </div>
</li>
</div>
<?php } ?>
</div>
</ol>
<?php } }?>



</div>
</div>


</div> <!-- /content -->

</div></div> <!-- /wrap -->

<?php require('footer.php');?>
</body>
</html>
	

