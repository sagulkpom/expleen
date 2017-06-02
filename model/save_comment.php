<?php require('../config.php');
session_start();
if(isset($_SESSION['id'])){
    $user_session_id=$_SESSION['id'];
}
else{
    $user_session_id="";
}
$name=$_POST['name'];
$comment=$_POST['comment'];
$flowchart_id=$_POST['flowchart_id'];
$user_id=$_SESSION['id'];
$query="insert into flowchart_comments(`flowchart_id`,`name`,`comment`,`user_id`) values('$flowchart_id','$name','$comment','$user_id')";
$result=mysqli_query($con,$query);
$id=mysqli_insert_id($con);
        if($result==1){
           echo "<div class='data_".$id."' style='margin-bottom:10px;'>";
            if($user_id == $user_session_id){
          echo '<h5 style="color:black;font-size:17px;float:right;cursor:pointer;" class="delete"  data-id="'.$id.'" id="delete_'.$id.'"><span class="glyphicon glyphicon-remove" ></span></h5>';
       }
        echo '<p style="clear:both;">'.nl2br($comment).'</p>';
        echo '<i class="fa fa-user"></i> '.$name;
        echo "</div>";
        }
//echo "true";




?>