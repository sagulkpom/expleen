<?php
	session_start();
	include("config.php");
	// check for distinct profile url
	if($_POST['id'] == 'profile_url')
	{
		$profile_url = $_POST['value'];
		$w_stmt = $con->prepare("SELECT `profile_url` from `flowchart_users` WHERE profile_url=?");				
								$w_stmt->bind_param('s',  $profile_url);
								$w_stmt->execute();
								$w_stmt->store_result();
								$w_total=mysqli_stmt_num_rows($w_stmt);
								$w_stmt->bind_result($profile_url);
		if($w_total > 0)
		{
			echo "Profile name already used";
		}
		else
		{
			$profile_url = str_replace(" ", "", $_POST['value']);
			$query = "UPDATE flowchart_users SET ".$_POST['id']." = '$profile_url' WHERE id = ".$_SESSION['id']." ;";
			$result=mysqli_query($con,$query);
			
			/* sleep for a while so we can see the indicator in demo */
			usleep(2000);
			/* What is echoed back will be shown in webpage after editing.*/
			print $profile_url; 
		}
	}
	// all other profile info gets updated directly
	else
	{
		$query = "UPDATE flowchart_users SET ".$_POST['id']." = '".$_POST['value']."' WHERE id = ".$_SESSION['id']." ;";
		$result=mysqli_query($con,$query);
		/* sleep for a while so we can see the indicator in demo */
		usleep(2000);
		/* What is echoed back will be shown in webpage after editing.*/
		print $_POST['value']; 
	}


?>