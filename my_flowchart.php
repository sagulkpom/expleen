<?php error_reporting(E_ERROR); ?>
<?php session_start();
if(!isset($_SESSION['id'])){
  header('location:index.php');
}
error_reporting(0);
 require('header.php');
require('config.php');
$query="select * from images where user_id='$id' order by id DESC";
$result=mysqli_query($con,$query);
?>


<?php
	include("config.php");
        if(isset($_POST['submit'])){
                move_uploaded_file($_FILES['file']['tmp_name'],"profile_pictures/".$_FILES['file']['name']);
				$query = "UPDATE flowchart_users SET profile_pic_url = 'profile_pictures/".$_FILES['file']['name']."' WHERE id = '".$_SESSION['id']."'";
				$result=mysqli_query($con,$query);
                //$q = mysqli_query($con,);
        }
?>


<?php	
		include("config.php");
		$query_user = "SELECT * FROM flowchart_users WHERE id = '$id' LIMIT 1";
		$result_user = mysqli_query($con, $query_user);
		while($row_user = mysqli_fetch_assoc($result_user))
		{
		$user_id=$row_user['id'];
		}
?> 

<?php	
		include("config.php");
		$query_likes = "SELECT count(*) AS likes_count FROM flowchart_likes WHERE user_id = '$user_id'";
		$result_likes = mysqli_query($con, $query_likes);
		while($row_likes = mysqli_fetch_assoc($result_likes))
		{
		$likes_count=$row_likes['likes_count'];
		}
?> 

<?php	
		include("config.php");
		$query_expleen_count = "SELECT count(*) AS expleen_count FROM images WHERE user_id = '$user_id'";
		$result_expleen_count = mysqli_query($con, $query_expleen_count);
		while($row_expleen_count = mysqli_fetch_assoc($result_expleen_count))
		{
		$expleen_count=$row_expleen_count['expleen_count'];
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

<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

<style type="text/css">
.profile-photo { 
  clear: both;
  display: block;
  max-width: 150px;
  margin: 0 auto 30px;
  border-radius: 100%;
  
  float: left;
  align-self: center;
  
  margin: 100px 150px 40px 60px;
}


div.image {
   float:left;
}

div.image{
    display: inline;
}


.split-para      { display:block;margin:10px;}
.split-para span { display:block;float:right;width:16%;margin-left:10px;}
.split-para2 span { display:block;float:right;width:47%;margin-left:0px;}

div.scroll {
    width: 820px;
    height: 70px;
    overflow: auto;
	word-wrap: break-word;
	border-style: solid;
    border-width: 1px;
	border-color: #c1c1c1;
}

</style>

<link rel="alternate" type="application/atom+xml" href="http://feeds.feedburner.com/tuupola" title="Atom feed" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="jquery.jeditable.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">

$(function() {


  $(".editable_textarea").editable("update_profile_info.php", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable",
	  cols: 10,
	  rows: 1
  });

    $("#profile_description").editable("update_profile_info.php", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable",
	  cols: 70,
	  rows: 2
  });
  
      $("#profile_url").editable("update_profile_info.php", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable",
	  cols: 25,
	  rows: 1
  });
 
});
</script>

<div class="image">
    <img src="<?php echo $profile_pic_url?>" alt="User Profile Picture" class="profile-photo">
	<div style = " margin-right: 0px; margin-left: 70px;">
		<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input class="url btn btn-success" type="submit" name="submit" value="Upload Picture">
        </form>
		</div>
	
</div>​

<div class="container-fluid" style="padding-top:70px;width:95%;margin:0 auto;">
    <h3>
		<span class="editable_textarea" id="name"><?php echo $name, ' ';?> </span>
		<span class="editable_textarea" id="last_name"><?php echo $last_name;?> </span>
	</h3>
	
	<p class="split-para">About Me <span style="color:#357AD2"> Likes: <?php echo $likes_count?> |  Expleens: <?php echo $expleen_count?></span>
	</p>
	<!--<p class="split-para"><span>Total Expleens: <?php //echo $expleen_count?> </span>	</p>	-->

<div class="scroll"><span id="profile_description"><?php echo nl2br(stripslashes($profile_description));?></span></div>

    
<div>
    <h4 style="margin-top:30px;">Profile URL: <a href="http://www.expleen.com/<?php echo $profile_url?>">www.expleen.com/</a><span id="profile_url"><?php echo $profile_url?></span> </h4>
</div>







</div>

<!--
	<a href="#" class="ui-btn ui-corner-all ui-icon-edit ui-btn-icon-notext">Edit Icon</a>
-->



<div id="wrap" style="padding-top:30px;">







<div id="main" class="main-full"  style="min-height:80vh;">
      

<ol class="dribbbles group" style="margin:0 auto;width:100%; ">
  <?php if(mysqli_num_rows($result)>0){ ?>
  <?php while($row=mysqli_fetch_array($result)){
    ?>

<li id="screenshot-2198341" class="group" style="width:190px;border-radius:10px;margin-right:0;    height: 250px;margin-bottom: 0;">
  <div class="dribbble" style="border-radius:0px;">
    <div class="dribbble-shot">
      <div class="dribbble-img">
        <a class="dribbble-link" href="#none" ><div data-picture="" data-alt="Sleeping">
         <object type="image/svg+xml" data="expleen_svg/<?php echo $row['image'];?>">
    </object>
        </div>
        </a>
   <a class="dribbble-over img_modal" href="show_flowchart.php?title=<?php echo str_replace(" ","+",$row['flowchart_name']);?>&id=<?php echo $row['id'];?>">    <strong style="text-transform:capitalize;"><?php if (strlen($row['flowchart_name']) > 40){
  $id=$row['id'];
   $str = substr($row['flowchart_name'], 0, 40) . '...'; echo $str;
}else{
    echo $row['flowchart_name'];
} ?></strong>
      
    <em class="timestamp"></em>
</a></div>

      

    </div>
    

  </div>

  <h2>
    <span class="attribution-user" style="float:right;">
      <a rel="contact" title="" href="update_new.php?id=<?php echo md5($row['id']);?>" class="url btn btn-success">Update</a>
      <a rel="contact" onclick="return confirm('Are you sure you want to delete this flowchart?')" href="delete_flowchart.php?id=<?php echo md5($row['id']);?>" class="url btn btn-danger">Delete</a>
      
      
    </span>
  </h2>
</li>

<?php } }else{
  echo '<h3><a href="create_new.php">Create Expleen</a></h3>';
}
?>
</ol>




</div>


</div> <!-- /content -->

</div></div> <!-- /wrap -->

<hr />
<?php require('footer.php');?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       <img src="" id="img_src" style="width:100%;height:300px;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript">
$('.img_modal').click(function(e){
  console.log('aoa');
  var img=$(this).attr('data-img');
  $('#img_src').attr('src',img);

});</script>
</body>
</html>
