<?php
error_reporting(E_ALL);
require('config.php');
session_start();
$flowchart_id=$_GET['id'];
$query="delete from images where md5(id)='$flowchart_id'";
$result=mysqli_query($con,$query);
header('location:my_flowchart.php');
?>