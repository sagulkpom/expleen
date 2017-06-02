<?php
session_start();
include '../config.php';
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$password=generateRandomString();
$email = $_POST['email'];
$w_stmt = $con->prepare("SELECT `email` from `flowchart_users` WHERE email=?");				
						$w_stmt->bind_param('s',  $email);
						$w_stmt->execute();
						$w_stmt->store_result();
						$w_total=mysqli_stmt_num_rows($w_stmt);
						$w_stmt->bind_result($email);
if($w_total > 0){
	$w_stmt->fetch();
$w_stmt = $con->prepare("Update `flowchart_users` set  `password`=? WHERE email=?");				
						$w_stmt->bind_param('ss',  md5($password),$email);
						$w_stmt->execute();

echo $to = $email;
$subject = "Password Recovery";
$txt = "Your New Password is: ".$password;
$headers = "From: Expleen <noreply@expleen.com> \r\n";
if(mail($to,$subject,$txt,$headers)){
	echo "true";
}
}

else{
 echo 'false';
}

?>