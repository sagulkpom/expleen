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
       
        <h2>Sign up</h2>

<form method="post" id="signup">
   <div class="facebook" style="margin:20px auto;">
   <a href="facebook/fbconfig.php" class="btn btn-info btn-lg" style="background-color:#3a5795;"><i class="fa fa-facebook fa-lg"></i> Signup with Facebook</a>
 </div>
  <div id="login_result"></div>
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <input type="checkbox" class="" id="checkbox" name="checkbox" required> Please Accept Our <a href="#none">Terms & Conditions</a>
  </div>
  <button type="submit" class="btn btn-success">Sign up</button>
</form>


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
$('#login_result').html('<div class="alert alert-success">Signup Successfully.</div>');
window.location.href="my_flowchart.php";
}
else
{
   $('body').waitMe('hide');
$('#login_result').html('<div class="alert alert-danger">Email already Registered.</div>');
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
