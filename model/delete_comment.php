<?php require('../config.php');
$comment_id=$_POST['comment_id'];
$query="delete from flowchart_comments where id='$comment_id'";
$result=mysqli_query($con,$query);
echo "true";




?>