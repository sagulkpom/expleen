<?php
include("config.php");
$html="";
    $name=$_GET['name'];
   // $query="select * from custom_images where tags LIKE '%$name%'";
   $query="
			SELECT *
			FROM custom_images
			WHERE SUBSTRING(image_name, LOCATE( '/', image_name )+1) like '%$name%' 
			OR image_name like '%$name%' ;
		";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==0){
    $html="sorry! no result found for ".$name;
    }
    else {
        $count=mysqli_num_rows($result);
        while($row=mysqli_fetch_array($result)){
            $image=$row['image_name'];
          $html.='<div class="addme drag" style="z-index: 9999999999" ><img class="custom-img" src="custom_images/'.$image.'" ></div>';
}
}
    echo $html;

?>