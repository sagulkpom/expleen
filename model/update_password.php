<?php
include("../config.php");
session_start();
$message="";
$id = $_SESSION['id'];
$old = $_POST['password'];
$new	 = $_POST['new_password'];

$stmt = $con->prepare("SELECT `password` FROM `flowchart_users` where id=?");
 $stmt->bind_param('i',$id);  
   /* execute query */
    $stmt->execute();

    /* bind result variables */
    $stmt->store_result();
    $stmt->bind_result($pass);
	$stmt->fetch();
	if($pass == md5($old)){
			  $stmt = mysqli_prepare($con,"Update `flowchart_users` set `password`=? where id=?");
               mysqli_stmt_bind_param($stmt,'ss',md5($new),$id);
                if(mysqli_stmt_execute($stmt)){
                    echo "true";
                }
                else{
                    echo "false";
                }
		
	}
	else{
			 echo "false";
		}

  
  
  
  
  

	?>