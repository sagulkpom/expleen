

<?php
include("config.php");

// truncate table
$trun_query = "TRUNCATE TABLE custom_images;";
$truc_result=mysqli_query($con,$trun_query);
echo $trun_query;
echo '<br>';

// folder path with custom_images
$path = ('custom_images');
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $filename)
if(is_dir($filename))
  {
	  
  }
else
  {	
	$back_slash = "/";
	$replace_string = $path.$back_slash;
	$folder_file_name = str_replace($replace_string,'',$filename);
	if (strstr($folder_file_name, "/")) {
		$tag_parse = explode("/", $folder_file_name);
		$tag_name = $tag_parse[0];
    } else {
        $tag_name = '';
    }
// insert into table with images from directory
  $query = "INSERT INTO custom_images (image_name,tags) VALUES ('" . $folder_file_name. "', '$tag_name');";
  $result=mysqli_query($con,$query);
  
  //echo $query;
  //echo '<br>';
  
  }
  
  echo 'Database updated with latest images';
?>



