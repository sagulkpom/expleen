<?php require('config.php');
session_start();
if(isset($_SESSION['id'])){
    $user_session_id=$_SESSION['id'];
}
else{
    $user_session_id="";
}
$flowchart_id=$_POST['flowchart_id'];
$user_id=$_SESSION['id'];
$query="delete from flowchart_likes where flowchart_id='$flowchart_id' and user_id='$user_id'";
$result=mysqli_query($con,$query);
        if($result==1){
          $query="select * from flowchart_likes where flowchart_id='$flowchart_id'";
          $res=mysqli_query($con,$query);
          $total=mysqli_num_rows($res);
           echo $total;

       }




?>