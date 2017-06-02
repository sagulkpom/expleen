<?php
session_start();
include '../config.php';

$email = $_POST['email'];
$password = md5($_POST['password']);
$w_stmt = $con->prepare("SELECT `id`,`email`,`name` from `flowchart_users` WHERE email=? and password=?");				
						$w_stmt->bind_param('ss',  $email,$password);
						$w_stmt->execute();
						$w_stmt->store_result();
						$w_total=mysqli_stmt_num_rows($w_stmt);
						$w_stmt->bind_result($id,$email,$name);
if($w_total == 1){
	$w_stmt->fetch();
$_SESSION['id'] = $id;
$_SESSION['name']=$name;
$_SESSION['email'] = $email;
echo "true";
}

else{
 echo 'false';
}

?>