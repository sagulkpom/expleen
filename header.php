<?php
session_start();
include 'config.php';
if(isset($_SESSION['email'])){
  $name=$_SESSION['name'];
  $email=$_SESSION['email'];
  $id=$_SESSION['id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Expleen</title>
  <meta charset="utf-8" />
  <meta name="theme-color" content="#333333">
  <meta name="referrer" content="always">
  <!--[if gte IE 7]><!-->
  <link rel="stylesheet" media="screen, projection" href="css/style.css" />
 <script src="js/jquery.js"></script>
  
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="css/owl.carousel.css">
 
<!-- Default Theme -->
<link rel="stylesheet" href="css/owl.theme.css">
  <script src="js/waitMe.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap-tagsinput.css">
  <script src="css/bootstrap-tagsinput.min.js"></script>

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
$(document).ready(function() {
 
  $(".owl-example").owlCarousel({
navigation:true
});
 
});
  </script>
     <link type="text/css" rel="stylesheet" href="css/waitMe.min.css">


<style type="text/css">
#header{
width: 100%;
min-width: 900px;
height: 56px;
color: #FFF;
font-weight: 700;
font-size: 15px;
position: fixed;
z-index: 3;
top: 0px;
background: -moz-linear-gradient(center top , #62767E, #2E4957) repeat scroll 0% 0% transparent;
background: -webkit-linear-gradient( #eee, #eee) repeat scroll 0% 0% transparent;
background: -ms-linear-gradient( #62767E, #2E4957) repeat scroll 0% 0% transparent;
border-bottom: 2px solid #7D9099;
border-top: 1px solid #7C8689;
box-shadow: 0px 1px 10px #666;
  }
#header a span{
  color:#357AD2;
}
#header a span:hover{
  text-decoration: underline;
}
.search input[type=text]{
  margin-top: 10px;
  height: 35px;
  border-radius: 5px;
  padding-left: 10px;
}
body{
  font-family: 'Montserrat', sans-serif !important;
}
#search_form{
float:left;
width:30%;
 margin-top: 8px;
    margin-left: 50px;
   }
#search_form input{
    width: 100%;
    height: 35px;
    padding-left: 10px;}
ol.dribbbles li div.dribbble a.dribbble-over, ol.collections li div.dribbble a.dribbble-over{
height:150px;
padding:10px !important;}
#header a span {
    font-weight: 100 !important;
}
#header-inner{
width:90%;padding:0;
}
@media (max-width:1300px){
#header-inner{
width:90%;padding:0;
}
}
  </style>
 
  <!-- <![endif]-->
  
</head>

<body id="shots" class="logged-out not-pro not-self not-team">


<div id="header" class="group"><div id="header-inner" class="group" style="">

  <div id="logo" style="padding:0;">
    <h3 style="color:white;margin-top:7px;"><a href="index.php" style="color:white;"><img src="images/main_logo.png" style="height:35px;"></a></h3>
     </div>
<form method='post' action="search.php" id="search_form">
 <div class="input-group">
        <input  type="text" name="search" placeholder="Search Expleen" style="" class="form-control">
<div class="input-group-addon"><input type="submit" value="Search" style="    border: none;
    background: none;
    padding: 0;
    height: 20px;"></div>
</div>
      </form>

  <a href="#nav" id="toggle-nav">Toggle navigation</a>

  <ul id="nav" style="margin:0;float:right;">
    <li id="t-signin" class="search">
      
      </li>
   <?php if(isset($_SESSION['email'])){ ?>
  
 <li id="t-signin">
      <a href="logout.php">
        <span><i class="fa fa-sign-out"></i> Logout</span>
</a>    </li>
 <li id="t-signin">
      <a href="change_password.php">
        <span><i class="fa fa-plus-square"></i> Change Password</span>
</a>    </li>
<li id="t-signin">
      <a href="create_new.php">
        <span><i class="fa fa-plus-square"></i> Create Expleen</span>
</a>    </li>
 <li id="t-signin">
      <a href="my_flowchart.php">
        <span><i class="fa fa-user"></i> Hello <?php echo $name;?></span>
</a>    </li>
    <?php }else{ ?>
    <li id="t-signin">
      <a href="login.php">
        <span><i class="fa fa-sign-in"></i> Sign in</span>
</a>    </li>
    <li id="t-signup">
      <a href="signup.php"><span><i class="fa fa-user-plus"></i> Sign up</span></a>
    </li>
     <li id="t-signin">
      <a href="index.php">
        <span><i class="fa fa-home"></i> Home</span>
</a>    </li>
<?php }?>
<li>
</li>
  </ul>
</div></div> <!-- /header -->

<hr />

<div class="ajax notice hide">
  <h2></h2>
</div>
