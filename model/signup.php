<?php
session_start();
include '../config.php';

	$name=$_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$w_stmt = $con->prepare("SELECT `email` from `flowchart_users` WHERE email=?");				
						$w_stmt->bind_param('s',  $email);
						$w_stmt->execute();
						$w_stmt->store_result();
						$w_total=mysqli_stmt_num_rows($w_stmt);
						$w_stmt->bind_result($email);
if($w_total > 0){
	echo "false";
}

else{
$stmt = mysqli_prepare($con,"INSERT INTO `flowchart_users` (`name`,`email`,`password`) VALUES (?,?,?)");
mysqli_stmt_bind_param($stmt,'sss',$name,$email,$password);
mysqli_stmt_execute($stmt);
$id=mysqli_insert_id($con);
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
	echo "true";
}



?>