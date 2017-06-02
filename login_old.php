<?php require('header.php');?>
<style type="text/css">
  #show_data h3{
        text-transform: capitalize;
        text-decoration: underline;
        padding: 15px;
        }</style>
    <div id="main-container">
      <div id="wrap" style="min-height:100vh;">
      <div  class="col-lg-offset-4 col-lg-4" style="padding-top:50px;">
       
        <h2>Sign in</h2>

<form method="post" id="login">
  <div class="facebook" style="margin:20px auto;">
   <a href="facebook/fbconfig.php" class="btn btn-info btn-lg" style="background-color:#3a5795;"><span class="fa fa-facebook fa-lg"></span> Login with Facebook</a>
 </div>
  <div id="login_result"></div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-success">Login</button>
</form>
  <p class="sign-notamember">Not a member? <a href="signup.php">Sign up now</a></p>
  <p><a href="#none" data-toggle="modal" data-target="#myModal">Forgot Password</a>

      </div>
<div style="clear:both"></div>
<div style="margin:0 auto;width:93%;" id="show_data">
<?php
 $query12="select `name` from tbl_categories";
  $result12=mysqli_query($con,$query12);
  while($row12=mysqli_fetch_array($result12)){
$flowchart_category=$row12['name'];
  $query13="select * from images where flowchart_category like '%$flowchart_category%' order by id DESC";
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
  <a class="img_modal dribbble-over" href="show_flowchart.php?title=<?php echo str_replace(" ","+",$row['flowchart_name']);?>&id=<?php echo $row['id'];?>">    <strong style="text-transform:capitalize;"><?php if (strlen($row['flowchart_name']) > 40){
  $id=$row['id'];
   $str = substr($row['flowchart_name'], 0, 40) . '...'; echo $str;
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

    </div>
  </div>

<?php require('footer.php');?>


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
      </div>
      <div class="modal-body">
       <form method="post" id="forgot_password">
  <div id="forgot_result"></div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
  </div>
  
  <button type="submit" class="btn btn-success">Recover Password</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

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
$('#login_result').html('<div class="alert alert-success">Success</div>');
window.location.href="my_flowchart.php";
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


  </body>
</html>
