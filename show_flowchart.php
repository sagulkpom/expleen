<?php 
error_reporting(0);
require('header.php');?>
<?php 
require('config.php');
$id=$_GET['id'];
$id_num=$_GET['id'];
$query="select * from images where id='$id'";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
$id=md5($row['id']);
?>
<head>
 <link rel="stylesheet" href="css/rrssb.css" />
  <style type="text/css">
svg { cursor: pointer; }
  .image{
    //margin-top: 120px;
    }
    .image h2{
      text-transform: capitalize;
      text-decoration: none;
      }
      .image h4{
        text-transform: capitalize;
        }
        .iframe{
          margin: 20px auto !important;
        }
         iframe{
            margin:20px 0; 
          }
        .iframe iframe{
          width: 100% !important;
          height: 250px !important;
          margin: 0 auto !important;
          display: block;

          }

          
.lightbox {
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: 95% !important;
    z-index: 10000;
    font-weight: 400;
}
.cat{
margin-top:10px;
margin-bottom:30px;
}
.cat h5{background: #add;
    padding: 5px 15px;
	float:left;
	margin-top: 5px;
	margin-right: 5px;
    margin-bottom: 5px;}</style>
             <link href='css/alertify.bootstrap.css' rel='stylesheet' type='text/css'>
    <link href='css/alertify.core.css' rel='stylesheet' type='text/css'>
    <link href='css/alertify.default.css' rel='stylesheet' type='text/css'>
    <script src="js/alertify.min.js"></script>
<script src="js/lightbox.min.js"></script>
<link rel="stylesheet" href="css/lightbox.min.css">
</head>
<body>
<div class="container" style="margin-top:50px;">
  <div class="col-sm-9">
  <div class="image">


    <?php
  $flowchart_id=$row['id'];
  $like_status=0;
    $likes="select * from flowchart_likes where flowchart_id='$flowchart_id'";
            $result_likes=mysqli_query($con,$likes);
            $rows_likes=mysqli_num_rows($result_likes);
            if(isset($_SESSION['id'])){
            while($check_likes=mysqli_fetch_array($result_likes)){
              if($check_likes['user_id'] == $_SESSION['id']){
                $like_status=1;
              }
              }
            }
            ?>  

    <?php
  $flowchart_user_id=$row['user_id'];
  $query_user_name="select * from flowchart_users where id='$flowchart_user_id' LIMIT 1;";
	$result_user_info=mysqli_query($con,$query_user_name);
	$user_info=mysqli_fetch_array($result_user_info);
            ?>

<h2 style=" margin-top: 80px; width: 100%;float: left;"><?php echo $row['flowchart_name'];?></h2> <!-- <a href="http://www.expleen.com/profile.php?profile_name=<?php //echo strtolower($user_info['profile_url']); ?>" ><span style="float: right; font-size: 20px; "> <?php //echo $user_info['profile_url'] . " ";?></span></a><span style="float: right; font-size: 20px; ">Author:</span></h2>-->
    
             <ul class="rrssb-buttons" style="width: 220px;
    float: left;
    height: 42px;
    margin-top: 0;
margin-right:1px;
    padding: 0;">

      <li class="rrssb-googleplus">
        <!-- Replace href with your meta and URL information.  -->
        <a href="https://plus.google.com/share?url=Check%20out%20Expleen%20http://expleen.com/show_flowchart.php?id=<?php echo $id_num; ?>" class="popup">
          <span class="rrssb-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21 8.29h-1.95v2.6h-2.6v1.82h2.6v2.6H21v-2.6h2.6v-1.885H21V8.29zM7.614 10.306v2.925h3.9c-.26 1.69-1.755 2.925-3.9 2.925-2.34 0-4.29-2.016-4.29-4.354s1.885-4.353 4.29-4.353c1.104 0 2.014.326 2.794 1.105l2.08-2.08c-1.3-1.17-2.924-1.883-4.874-1.883C3.65 4.586.4 7.835.4 11.8s3.25 7.212 7.214 7.212c4.224 0 6.953-2.988 6.953-7.082 0-.52-.065-1.104-.13-1.624H7.614z"/></svg>            </span>
          <span class="rrssb-text">google+</span>
        </a>
      </li>
      <li class="rrssb-facebook">
        <!--  Replace with your URL. For best results, make sure you page has the proper FB Open Graph tags in header:
              https://developers.facebook.com/docs/opengraph/howtos/maximizing-distribution-media-content/ -->
        <a href="https://www.facebook.com/sharer/sharer.php?u=http://expleen.com/show_flowchart.php?id=<?php echo $id_num; ?>" class="popup">
          <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29"><path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z"/></svg></span>
          <span class="rrssb-text">facebook</span>
        </a>
      </li>

      <li class="rrssb-instagram">
        <!-- Replace href with your URL  -->
        <a href="http://instagram.com/dbox">
          <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M4.066.636h19.867c1.887 0 3.43 1.543 3.43 3.43v19.868c0 1.888-1.543 3.43-3.43 3.43H4.066c-1.887 0-3.43-1.542-3.43-3.43V4.066c0-1.887 1.544-3.43 3.43-3.43zm16.04 2.97c-.66 0-1.203.54-1.203 1.202v2.88c0 .662.542 1.203 1.204 1.203h3.02c.663 0 1.204-.54 1.204-1.202v-2.88c0-.662-.54-1.203-1.202-1.203h-3.02zm4.238 8.333H21.99c.224.726.344 1.495.344 2.292 0 4.446-3.72 8.05-8.308 8.05s-8.31-3.604-8.31-8.05c0-.797.122-1.566.344-2.293H3.606v11.29c0 .584.48 1.06 1.062 1.06H23.28c.585 0 1.062-.477 1.062-1.06V11.94h.002zm-10.32-3.2c-2.963 0-5.367 2.33-5.367 5.202 0 2.873 2.404 5.202 5.368 5.202 2.965 0 5.368-2.33 5.368-5.202s-2.403-5.2-5.368-5.2z"/></svg></span>
          <span class="rrssb-text">instagram</span>
        </a>
      </li>

      
 <li class="rrssb-pinterest">
        <!-- Replace href with your meta and URL information.  -->
        <a href="http://pinterest.com/pin/create/button/?url=http://expleen.com/show_flowchart.php?id=<?php echo $id_num; ?>&amp;media=http://expleen.com/show_flowchart.php?id=<?php echo $id_num; ?>&amp;description=Expleen">
          <span class="rrssb-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
              <path d="M14.02 1.57c-7.06 0-12.784 5.723-12.784 12.785S6.96 27.14 14.02 27.14c7.062 0 12.786-5.725 12.786-12.785 0-7.06-5.724-12.785-12.785-12.785zm1.24 17.085c-1.16-.09-1.648-.666-2.558-1.22-.5 2.627-1.113 5.146-2.925 6.46-.56-3.972.822-6.952 1.462-10.117-1.094-1.84.13-5.545 2.437-4.632 2.837 1.123-2.458 6.842 1.1 7.557 3.71.744 5.226-6.44 2.924-8.775-3.324-3.374-9.677-.077-8.896 4.754.19 1.178 1.408 1.538.49 3.168-2.13-.472-2.764-2.15-2.683-4.388.132-3.662 3.292-6.227 6.46-6.582 4.008-.448 7.772 1.474 8.29 5.24.58 4.254-1.815 8.864-6.1 8.532v.003z"
              />
            </svg>
          </span>
          <span class="rrssb-text">pinterest</span>
        </a>
      </li>
     
      <li class="rrssb-twitter">
        <!-- Replace href with your Meta and URL information  -->
        <a href="https://twitter.com/intent/tweet?text=check Expleen http://expleen.com/show_flowchart.php?id=<?php echo $id_num; ?>"
        class="popup">
          <span class="rrssb-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
              <path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62c-3.122.162-6.22-.646-8.86-2.32 2.702.18 5.375-.648 7.507-2.32-2.072-.248-3.818-1.662-4.49-3.64.802.13 1.62.077 2.4-.154-2.482-.466-4.312-2.586-4.412-5.11.688.276 1.426.408 2.168.387-2.135-1.65-2.73-4.62-1.394-6.965C5.574 7.816 9.54 9.84 13.802 10.07c-.842-2.738.694-5.64 3.434-6.48 2.018-.624 4.212.043 5.546 1.682 1.186-.213 2.318-.662 3.33-1.317-.386 1.256-1.248 2.312-2.4 2.942 1.048-.106 2.07-.394 3.02-.85-.458 1.182-1.343 2.15-2.48 2.71z"
              />
            </svg>
          </span>
          <span class="rrssb-text">twitter</span>
        </a>
      </li>
  </ul>
  
  <div class="like" style="float:right;">


     <?php 
     if($like_status==0 && isset($_SESSION['id'])){ ?>
                       <a  class="action_like btn btn-success" id="action_like_<?php echo $flowchart_id;?>" data-id="<?php echo $flowchart_id;?>"><span class="likes_count"><?php echo $rows_likes;?></span> <span class="glyphicon glyphicon-thumbs-up"></span></a>
                   
     <?php }
    else if($like_status ==1){ $like_status=0; ?>
                    <a  class="btn btn-danger"><span class="likes_count"><?php echo $rows_likes;?></span> <span class="glyphicon glyphicon-thumbs-up"></span></a>
                    <?php }
                    if(!isset($_SESSION['id'])){ ?>
                    <a  class="btn btn-success"data-toggle="modal" data-target="#forgot_modal" ><span class="likes_count"><?php echo $rows_likes;?></span> <span class="glyphicon glyphicon-thumbs-up"></span></a>
                   <?php   } ?>
  </div>
  
  
    <a  href="expleen_svg/<?php echo $row['image'];?>" data-lightbox="image-3"><object type="image/svg+xml" data="expleen_svg/<?php echo $row['image'];?>" data-lightbox="image-3" data-title="My caption" style="width:100%;height:500px;" class="img-thumbnail">
    </object></a>
    
  </div>
  <div id="chart_description">
  <h3>Description </h3>
 <p><?php echo nl2br(stripslashes($row['flowchart_description']));?></p>
   </div>
  <div class="comment">
    <h3>Comments </h3>
    <div id="show_data">
    <?php
    $user_session_id="";
    if(isset($_SESSION['id'])){
    $user_session_id=$_SESSION['id'];
  }
     $query="select * from flowchart_comments where flowchart_id='$flowchart_id'";
        $comment_result=mysqli_query($con,$query);
        if(mysqli_num_rows($comment_result)>0){
        while($comment_row=mysqli_fetch_array($comment_result)){
        $id=$comment_row['id'];
        $user_id=$comment_row['user_id'];
        echo "<div class='data_".$id."' style='margin-bottom:10px;'>";
          if($user_id == $user_session_id){
          echo '<h5 style="color:black;font-size:17px;float:right;cursor:pointer;" class="delete"  data-id="'.$id.'" id="delete_'.$id.'"><span class="glyphicon glyphicon-remove" ></span></h5>';
      }
        echo '<p style="">'.nl2br($comment_row["comment"]).'</p>';
         echo '<i class="fa fa-user"></i> '.$comment_row["name"];
        echo "</div>";
        }
    }else{
      echo "<p id='no_comment'>No Comments</p>";
    }
    ?>
</div>

        <div id="result"></div>
    <form method="Post" id="myform">
      <div class="form-group">
         <input type="hidden" value="<?php echo $_SESSION['name'];?>" class="form-control" id="name" name="name" required>
         <input type="hidden" value="<?php echo $flowchart_id;?>" class="form-control" id="name" name="flowchart_id" required>
        <br>
    <textarea class="form-control" id="comment" placeholder="Your Comment" style="height:100px;" maxlength="500" required name="comment"></textarea>
      </div>
      <?php  if(!isset($_SESSION['id'])){
   ?>
      <a href="#none" class="btn btn-danger"  data-toggle="modal" data-target="#forgot_modal" style="float:right;margin-bottom:20px;">Post Comment</a>
        <?php }else{ ?>
    <input type="submit" class="btn btn-danger" value="Post Comment" style="float:right;margin-bottom:20px;">
    <?php }?>
  </form>
  
  </div>
</div>
<div class="col-sm-3">
  <div class="image" style="margin-top:80px;">
  
 <div style="margin-top: 80px; margin-bottom: 20px; width: 100%; float: left; font-size: 20px; "> <span > <i class="fa fa-user"></i>  Author:</span> <a href="http://www.expleen.com/profile.php?profile_name=<?php echo strtolower($user_info['profile_url']); ?>" >
  <span> <?php echo $user_info['profile_url'] . " ";?></span></a> </div>
  
  
  <span style="font-size: 20px; "><i class="fa fa-tags"></i> Category</span>
  
  <div class="cat"><?php $var_cat= explode(',',$row['flowchart_category']); for($i=0;$i<sizeof($var_cat);$i++)  echo "<h5>".$var_cat[$i]."</h5>";?></div>
  <div style="clear:both;"></div>
  
  <!--**************************************************************************************************************-->
  <!--Following code displays attached PDF, two images and an embedded Youtube video-->
  <!--**************************************************************************************************************-->
	<!--<h4>Relevant Literature</h4>-->
	<?php/* 										  <!--Remove /* from the PHP tag-->
		if($row['flowchart_pdf'] != ""){
			  $pdf="attachments/".$row['flowchart_pdf'];

		echo "<iframe src=\"$pdf\" width=\"100%\" style=\"height:100%\"></iframe>";
		echo "<a href=\"$pdf\">Download Pdf</a>";
			 }?>
	<div class="clear"></div>
	<div class="row" style="margin-top:10px;">
	<?php

	if($row['flowchart_image1'] != ""){ ?>
		<a  href="attachments/<?php echo $row['flowchart_image1'];?>" data-lightbox="image-1" style="width:42%; height:110px;float:left;margin-right:10px;margin-left:15px;display:block;"><img src="attachments/<?php echo $row['flowchart_image1'];?>" data-lightbox="image-1" style="width:100%; height:110px;"></a>
		<?php }if($row['flowchart_image2'] != ""){?>
		<a  href="attachments/<?php echo $row['flowchart_image2'];?>" data-lightbox="image-2" style="width:42%; height:110px;float:left;margin-right:10px;display:block;"><img src="attachments/<?php echo $row['flowchart_image2'];?>" data-lightbox="image-2"  style="width:100%; height:110px;"></a>
		<?php }
		?>
	</div>
	<?php if($row['flowchart_iframe'] !=""){ ?>
		<div class="iframe" style="margin-top:10px;position:relative;" data-toggle="modal" data-target="#iframe_modal" style="">
		 
	<?php
	$doc = new DOMDocument();
	$doc->loadHTML(stripslashes($row['flowchart_iframe']));
	$xpath = new DOMXPath($doc);
	$src = $xpath->evaluate("string(//iframe/@src)");
	preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $src, $matches);
	echo "<img src='http://img.youtube.com/vi/".$matches[1]."/default.jpg' style='width:100%;height:200px;cursor:pointer;'><img src='images/play.png' style='position:absolute;top:0;left:0;bottom:0;right:0;margin:auto;display:block;cursor:pointer;'>";
	?>
    </div>
	
	
    <?php }   */ ?>              <!-- Remove */ from the PHP tag-->
	
  <!--**************************************************************************************************************-->
  <!--Above code displays attached PDF, two images and an embedded Youtube video-->
  <!--**************************************************************************************************************-->
  
  
  
  </div>
</div>
</div>
<?php require('footer.php');?>

<div class="modal fade" id="forgot_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">In order to proceed</h4>
      </div>
                    <div class="modal-body">
                                <div class="tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab2-1" data-toggle="tab" aria-expanded="true"><i class="fa fa-lock"></i> Login</a></li>
                  <li class=""><a href="#tab2-2" data-toggle="tab" aria-expanded="false"><i class="fa fa-user"></i> Sign Up</a></li>
                  </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane fade active in" id="tab2-1">
                   <div class="facebook" style="margin:20px auto;">
   <a href="facebook/fbconfig.php" class="btn btn-info btn-lg" style="background-color:#3a5795;"><span class="fa fa-facebook fa-lg"></span> Login with Facebook</a>
 </div>
                    <div id="login_result"></div>

                       <form action="" method="post" id="login" style="margin-top:30px;" >
                        <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input style="color:#444; padding-left:15px; border:1px solid #CCC; "   required  type="text" class="form-control" placeholder="Email" name="email">
</div>
                    <br />
                                  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
  <input style="color:#444; padding-left:15px; border:1px solid #CCC; "   required  type="password" class="form-control" placeholder="Password" name="password">
</div>
<a href='#none' style='float:right;' data-toggle="modal" data-target="#my_forgot_modal">Forgot your password?</a>
<input type='hidden' name='login_type' value='normal'>
                    <br />
      
                    <button style="margin-top:-10px"  type="submit" value="sub" name="sub" class="btn btn-danger"><i class="entypo key"></i> Login to proceed</button>
              </form>
          </div>
                  <div class="tab-pane fade" id="tab2-2">
                      <div class="facebook" style="margin:20px auto;">
   <a href="facebook/fbconfig.php" class="btn btn-info btn-lg" style="background-color:#3a5795;"><i class="fa fa-facebook fa-lg"></i> Signup with Facebook</a>
 </div>
                     <form action="" method="post" id="signup" style="margin-top:30px;" >
                      
                        <div id="signup_result"></div>

                         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input style="color:#444; padding-left:15px; border:1px solid #CCC; "   required  type="text" id='name' class="form-control" placeholder="Name" name="name">
</div>
<br>
                    <div class="input-group">
  <span class="input-group-addon">@</span>
  <input style="color:#444; padding-left:15px; border:1px solid #CCC; " id='first_email'  required  type="text" class="form-control" placeholder="Email" name="email">
</div>
                    <br />
                                                      <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
  <input style="color:#444; padding-left:15px; border:1px solid #CCC; "   required  type="password" class="form-control" placeholder="Password" name="password">
</div>
<input type='hidden' name='signup_type' value='normal'>
                    <br>
                    <button style="margin-top:-10px"  type="submit" value="sub" name="sub" class="btn btn-danger"><i class="entypo key"></i> Signup to proceed</button>
              </form>
          </div>
                  
                </div>
              </div>
                      
          </div>
             
                    
                    
                  </div>
                </div>
              </div>  

  <div class="modal fade" id="my_forgot_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                  
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel"><i class="fa fa-lock"></i> Forgot your password?</h4>
                    </div>
                    <div class="modal-body">
                       <form action="" method="post" id="forgot_password">
                        <div id="forgot_result"></div>
                    <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
  <input style="color:#444; padding-left:15px; border:1px solid #CCC; " type="email" class="form-control" placeholder="your@email.com" name="email">
</div>
<input type='hidden' name='login_type' value='normal'>
                    <br />
                    <button style="margin-top:-10px"  type="submit" value="sub" name="sub" class="btn btn-danger"><i class="fa fa-paper-plane"></i> Email my password!</button>
              </form>
                    </div>
                    
                  </div>
                </div>
              </div>  
  
<div class="modal fade" id="iframe_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       </div>
      <div class="modal-body">
          <div class="iframe" style="margin-top:10px;">
      <?php echo stripslashes($row['flowchart_iframe']);?>
    </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  <script src="js/rrssb.min.js"></script>
<script type="text/javascript">
$(document.body).on('click','.action_like',function(){
flowchart_id=$(this).data('id');
console.log(flowchart_id);
$.ajax({

        url: 'action_like.php',
        type: 'POST',
        data:{flowchart_id:flowchart_id},
        
        success: function (response) {
           $('#action_like_'+flowchart_id).removeClass('action_like').addClass('btn-danger').removeClass('btn-success').html(response+' <span class="glyphicon glyphicon-thumbs-up"></span>');
            $('.likes_count').html(response);
           console.log(response);

      },
        error: function () {
            //your error code
      console.log("Sorry");
        }
    }); 

});

$(document.body).on('click','.action_unlike',function(){
flowchart_id=$(this).data('id');
console.log(flowchart_id);
$.ajax({

        url: 'action_unlike.php',
        type: 'POST',
        data:{flowchart_id:flowchart_id},
        
        success: function (response) {
           $('#action_like_'+flowchart_id).css('color','white');
           $('#action_like_'+flowchart_id).addClass('action_like').removeClass('action_unlike').addClass('btn-success').removeClass('btn-danger').html('<span class="glyphicon glyphicon-thumbs-up"></span> Like Flowchart');
           $('.likes_count').html(response);
           console.log(response);

      },
        error: function () {
            //your error code
      console.log("Sorry");
        }
    }); 

});

$('#myform').submit(function(e){
e.preventDefault();

  $('#submit').attr('disabled','disabled');

$.ajax({

        url: 'model/save_comment.php',
        type: 'POST',
        data:$(this).serialize(),
        
        success: function (response) {
            //your success code
           console.log(response);

      $('#result').html('<div class="alert alert-success">Your Comment has been posted Successfully.</div>');
      $('#result').fadeOut(5000);
      $('#comment').val('');
       $('#title').val('');
      $('#no_comment').remove();
            $('#show_data').append(response);
      $('#submit').removeAttr('disabled');
      },
        error: function () {
            //your error code
      console.log("Sorry");
        }
    }); 
       
});
$(document.body).on('click','.delete',function(){
comment_id=$(this).data('id');
  alertify.set({ buttonReverse: true });
      alertify.confirm("Are you really want to delete this comment?", function (ea) {
        if (ea) {
$('#delete_'+comment_id).html('<img src="images/loading.gif" style="float:right;">');
$.ajax({

        url: 'model/delete_comment.php',
        type: 'POST',
        data:{comment_id:comment_id},
        
        success: function (response) {
           $('.data_'+comment_id).fadeOut(1500);
           console.log(response);

      },
        error: function () {
            //your error code
      console.log("Sorry");
        }
    }); 
}
});
return false;
});

</script>

  <script type="text/javascript">
$(document.body).ready(function(e){
$('#login').on('submit',function(e) {

    e.preventDefault();

  run_waitMe('body');

 



$.ajax({

url:'model/login.php',

data:$(this).serialize(),

type:'POST',

success:function(data){

console.log(data);

if(data.indexOf('tr') != -1){
  $('body').waitMe('hide');
$('#login_result').html('<div class="alert alert-success">Success</div>');
//window.location.href="my_flowchart.php";
location.reload();
}
else
{
   $('body').waitMe('hide');
$('#login_result').html('<div class="alert alert-danger">Invalid email or password</div>');
}

},

error:function(data){

$("#error").show().fadeOut(5000); //===Show Error Message====

}

});


});
$('#forgot_password').on('submit',function(e) {

    e.preventDefault();

  run_waitMe('body');

 



$.ajax({

url:'model/forgot_password.php',

data:$(this).serialize(),

type:'POST',

success:function(data){

console.log(data);

if(data.indexOf('tr') != -1){
  $('body').waitMe('hide');
$('#forgot_result').html('<div class="alert alert-success">Your password has been sent to your email.</div>');
}
else
{
   $('body').waitMe('hide');
$('#forgot_result').html('<div class="alert alert-danger">Invalid email</div>');
//$('#forgot_result').html(data);
}

},

error:function(data){

$("#error").show().fadeOut(5000); //===Show Error Message====

}

});


});

});

  </script>
  <script type="text/javascript">
$(document.body).ready(function(e){
$('#signup').on('submit',function(e) {

    e.preventDefault();

  run_waitMe('body');

$.ajax({

url:'model/signup.php',

data:$(this).serialize(),

type:'POST',

success:function(data){

console.log(data);

if(data.indexOf('tr') != -1){
    $('body').waitMe('hide');
$('#sinup_result').html('<div class="alert alert-success">Signup Successfully.</div>');
//window.location.href="my_flowchart.php";
location.reload();
}
else
{
   $('body').waitMe('hide');
$('#signup_result').html('<div class="alert alert-danger">Email already Registered.</div>');
}

},

error:function(data){

$("#error").show().fadeOut(5000); //===Show Error Message====

}

});

});
$("#iframe_modal").on('hidden.bs.modal', function (e) {
    $("#iframe_modal iframe").attr("src", $("#iframe_modal iframe").attr("src"));
});

});

  </script>