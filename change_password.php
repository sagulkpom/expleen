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
       
        <h2>Update Password</h2>

<form method="post" id="login">
  <div id="login_result"></div>
  <div class="form-group">
    <label for="exampleInputPassword1">Old Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="new_password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-success">Update Password</button>
</form>

      </div>
<div style="clear:both"></div>
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

url:'model/update_password.php',

data:$(this).serialize(),

type:'POST',

success:function(data){

console.log(data);

if(data.indexOf('tr') != -1){
 $('body').waitMe('hide');
$('#login_result').html('<div class="alert alert-success">You changed your password successfully.</div>');
}
else
{
   $('body').waitMe('hide');
$('#login_result').html('<div class="alert alert-danger">Your old password is Invalid</div>');
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

url:'model/update_password.php',

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
