<?php 
require('../config.php');
session_start();
$tags=explode(",",$_POST['tags']);
$cat_array=array();
$query="select `name` from tbl_categories";
$cat_result=mysqli_query($con,$query);
while($cat_row=mysqli_fetch_array($cat_result)){
$cat_array[]=$cat_row['name'];
}
foreach($tags as $tag){
$tag=strtolower($tag);
if (!in_array($tag,$cat_array))
  {
  $query="insert into tbl_categories(`name`) values ('$tag')";
$res=mysqli_query($con,$query);
}


}
$create_img=$_POST['svgString'];
$create_img=str_replace('\"','"',$create_img);
$file_name=date('d-m-y-h-i-s').".svg";
$myfile = fopen("../expleen_svg/".$file_name, "w");
fwrite($myfile, $create_img);
fclose($myfile);
$user_id=$_SESSION['id'];
		$flowchart_name=$_POST['flowchart_name'];
		$flowchart_category = strtolower($_POST['tags']);
		$flowchart_description = $_POST['flowchart_description'];
		$flowchart_iframe = $_POST['flowchart_iframe'];
              
		
	   $image_code=$_POST['json'];
		$img_name = $file_name;
		$img_name1="";
		$img_name2="";
		$pdf_name="";
	
		if($_FILES["image1"]['name']  != ""){
		 	$img1 = $_FILES["image1"]["tmp_name"];
		$img_name1 = str_replace( " ","_",$_FILES["image1"]['name'] );
		$actual_name1 = pathinfo($img_name1,PATHINFO_FILENAME);
		$extension1 = pathinfo($img_name1, PATHINFO_EXTENSION);
		$original_name1 = $actual_name1;
		$i= 1;
		while(file_exists('../attachments/'.$actual_name1.".".$extension1))
		{           
			$actual_name1 = (string)$original_name1.$i;
			$img_name1 = $actual_name1.".".$extension1;
			$i++;
		}
		
			
				
		move_uploaded_file($img1,"../attachments/".$img_name1);
		}
		if($_FILES["image2"]['name'] != ""){


		$img2 = $_FILES["image2"]["tmp_name"];
		$img_name2 = str_replace( " ","_",$_FILES["image2"]['name'] );
		$actual_name2 = pathinfo($img_name2,PATHINFO_FILENAME);
		$extension2 = pathinfo($img_name2, PATHINFO_EXTENSION);
		$original_name2 = $actual_name2;
		$j= 1;
		while(file_exists('../attachments/'.$actual_name2.".".$extension2))
		{           
			$actual_name2 = (string)$original_name2.$j;
			$img_name2 = $actual_name2.".".$extension2;
			$j++;
		}
		
		
				
		move_uploaded_file($img2,"../attachments/".$img_name2);

	}
	if($_FILES["pdf"]['name'] != ""){


		$pdf = $_FILES["pdf"]["tmp_name"];
		$pdf_name = str_replace( " ","_",$_FILES["pdf"]['name'] );
		$actual_pdf = pathinfo($pdf_name,PATHINFO_FILENAME);
		$extension3 = pathinfo($pdf_name, PATHINFO_EXTENSION);
		$original_name3 = $actual_pdf;
		$j= 1;
		while(file_exists('../attachments/'.$actual_pdf.".".$extension3))
		{           
			$actual_pdf = (string)$original_name3.$j;
			$pdf_name = $actual_pdf.".".$extension3;
			$j++;
		}
				
		move_uploaded_file($pdf,"../attachments/".$pdf_name);

	}
	$stmt= $con->prepare("INSERT INTO `images`(`user_id`, `dt_created`, `image`, `editor_code`,`flowchart_name`,`flowchart_category`,`flowchart_description`,`flowchart_image1`,`flowchart_image2`,`flowchart_iframe`,`flowchart_pdf`) VALUES (?,NOW(),?,?,?,?,?,?,?,?,?)"); 
$stmt->bind_param('ssssssssss',$user_id,$img_name,$image_code,$flowchart_name,$flowchart_category,$flowchart_description,$img_name1,$img_name2,$flowchart_iframe,$pdf_name);
if($stmt->execute())
	 echo mysqli_insert_id($con);
		

?>