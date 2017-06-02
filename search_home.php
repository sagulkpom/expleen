<?php
include("config.php");
$html="";
    $name=$_GET['name'];
   $query="select * from images where flowchart_category LIKE '%$name%' or flowchart_name LIKE '%$name%'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==0){
    $html="sorry! no result found for ".$name;
    }
    else {
        $count=mysqli_num_rows($result);
        $html .=' <ol class="dribbbles group">';
        while($row=mysqli_fetch_array($result)){
            $img=$row['image'];
            $id=$row['id'];
            $name=$row['flowchart_name'];
            $description=$row['flowchart_description'];
        $html .='
<li id="screenshot-2198341" class="group" style="width:190px;border-radius:10px;margin-right:0;    height: 250px;margin-bottom: 0;">
  <div class="dribbble" style="border-radius:10px;">
    <div class="dribbble-shot">
      <div class="dribbble-img">
        <a class="dribbble-link" href="#none" ><div data-picture="" data-alt="Sleeping">
         <object type="image/svg+xml" data="expleen_svg/'.$img.'">
    </object>
        </div>
        </a>
  <a class="dribbble-over img_modal" href="show_flowchart.php?title='.str_replace(" ","+",$row["flowchart_name"]).'&id=.'$row["id"].'">    <strong style="text-transform:capitalize;">'.$name.'</strong>
      
    <em class="timestamp"></em>
</a></div>

      

    </div>
    

  </div>
<h5 style="float:left;padding-left:0px;text-transform:capitalize;width:100%;">'.$name.'</h5>
<h6>';
if (strlen($description) > 50){
   $str = substr($description, 0, 50) . '<br><a href="show_flowchart.php?title='.str_replace(" ","+",$row["flowchart_name"]).'&id=.'$row["id"].'"> Read More...'; $html .= $str;
}else{
   $html .= $description;
}
$html .='</h6>
 
</li>';
 } 
 $html .='
</ol>';
}
    echo $html;

?>