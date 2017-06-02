<?php
require('config.php');
session_start();
$user_id=$_SESSION['id'];
$img_id=$_POST['img_id'];
$flowchart_iframe="";
		$flowchart_name=$_POST['flowchart_name'];
		$flowchart_category = $_POST['flowchart_category'];
		$flowchart_description = $_POST['flowchart_description'];
		$flowchart_iframe = $_POST['flowchart_iframe'];
	//	$image_code = $_POST['flowchart_code'];
		$img_name1="";
		$img_name2="";
		$pdf_name="";
	//	$image_path = $_POST['flowchart_data'];
	//	$img_name = "images/image_".date('Yhms').$user_id.'.png';
		//$image_code = $_POST['image_code'];
	//	file_put_contents($img_name, base64_decode(explode(",", $_POST['flowchart_data'])[1]));


		 	if($_FILES["image1"]['name']  != ""){
		 	$img1 = $_FILES["image1"]["tmp_name"];
		$img_name1 = str_replace( " ","_",$_FILES["image1"]['name'] );
		$actual_name1 = pathinfo($img_name1,PATHINFO_FILENAME);
		$extension1 = pathinfo($img_name1, PATHINFO_EXTENSION);
		$original_name1 = $actual_name1;
		$i= 1;
		while(file_exists('attachments/'.$actual_name1.".".$extension1))
		{           
			$actual_name1 = (string)$original_name1.$i;
			$img_name1 = $actual_name1.".".$extension1;
			$i++;
		}
		
			$file_info1 = getimagesize($_FILES["image1"]["tmp_name"]);
		if ($file_info1 === FALSE) {
		   die("Unable to determine image type of uploaded file");
		}
				
		move_uploaded_file($img1,"attachments/".$img_name1);
		}
		if($_FILES["image2"]['name'] != ""){


		$img2 = $_FILES["image2"]["tmp_name"];
		$img_name2 = str_replace( " ","_",$_FILES["image2"]['name'] );
		$actual_name2 = pathinfo($img_name2,PATHINFO_FILENAME);
		$extension2 = pathinfo($img_name2, PATHINFO_EXTENSION);
		$original_name2 = $actual_name2;
		$j= 1;
		while(file_exists('attachments/'.$actual_name2.".".$extension2))
		{           
			$actual_name2 = (string)$original_name2.$j;
			$img_name2 = $actual_name2.".".$extension2;
			$j++;
		}
		
		$file_info2 = getimagesize($_FILES["image2"]["tmp_name"]);
		if ($file_info2 === FALSE) {
		   die("Unable to determine image type of uploaded file");
		}
				
		move_uploaded_file($img2,"attachments/".$img_name2);

	}
	if($_FILES["pdf"]['name'] != ""){


		$pdf = $_FILES["pdf"]["tmp_name"];
		$pdf_name = str_replace( " ","_",$_FILES["pdf"]['name'] );
		$actual_pdf = pathinfo($pdf_name,PATHINFO_FILENAME);
		$extension3 = pathinfo($pdf_name, PATHINFO_EXTENSION);
		$original_name3 = $actual_pdf;
		$j= 1;
		while(file_exists('attachments/'.$actual_pdf.".".$extension3))
		{           
			$actual_pdf = (string)$original_name3.$j;
			$pdf_name = $actual_pdf.".".$extension3;
			$j++;
		}
				
		move_uploaded_file($pdf,"attachments/".$pdf_name);

	}
	$query="update images set flowchart_name='$flowchart_name',flowchart_category='$flowchart_category',flowchart_description='$flowchart_description',flowchart_image1='$img_name1',flowchart_image2='$img_name2',flowchart_iframe='$flowchart_iframe',flowchart_pdf='$pdf_name' where id='$img_id'";
		mysqli_query($con,$query);
		echo $img_id;
		

?>