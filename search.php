<?php require('header.php');?>
<?php 
require('config.php');
$search=$_POST['search'];
$query="select * from images where flowchart_name LIKE '%$search%' or flowchart_category LIKE '%$search%' order by id DESC";
$result=mysqli_query($con,$query);
?>

<div id="wrap" style="padding-top:100px;">







<div id="main" class="main-full" style="min-height:80vh">
      

<ol class="dribbbles group" style="margin:0 auto;width:78%;">

  <?php 

  if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_array($result)){
    ?>
<li id="screenshot-2198341" class="group" style="width:190px;border-radius:10px;margin-right:0;    height: 150px;margin-bottom: 20px;">
  <div class="dribbble" style="border-radius:10px;">
    <div class="dribbble-shot">
      <div class="dribbble-img">
        <a class="dribbble-link" href="#none" ><div data-picture="" data-alt="Sleeping">
         <object type="image/svg+xml" data="expleen_svg/<?php echo $row['image'];?>">
    </object>
        </div>
        </a>
<div class="">
  <a class="img_modal dribbble-over" href="show_flowchart.php?title=<?php echo str_replace(" ","+",$row['flowchart_name']);?>&id=<?php echo $row['id'];?>">    <strong style="text-transform:capitalize;"><?php if (strlen($row['flowchart_name']) > 40){
  $id=$row['id'];
   $str = substr($row['flowchart_name'], 0, 40) . '...'; echo $str;
}else{
    echo $row['flowchart_name'];
} ?></strong>
      <p style="line-height:1.5;">
    <?php if (strlen($row['flowchart_description']) > 80){
  $id=$row['id'];
   $str = substr($row['flowchart_description'], 0, 80) . '...'; echo $str;
}else{
    echo $row['flowchart_description'];
} ?>
</p>
<hr>
<h6 style="position:absolute;bottom:0;padding-right:0px;">
<i class="fa fa-user"></i>
    <span class="attribution-user">
      <?php 
      $user_id=$row['user_id'];
      $new="select * from flowchart_users where id='$user_id'";
      $new_result=mysqli_query($con,$new);
      $new_row=mysqli_fetch_array($new_result);
      ?>
      <?php echo $new_row['name'];?>
      
    </span>

  </h6>
<h6 style="position:absolute;bottom:0;right:10px;padding-right:0px;">
<i class="fa fa-thumbs-up"></i>
    <span class="attribution-user">
<?php
 $new="select * from flowchart_likes where flowchart_id='$id'";
      $new_result=mysqli_query($con,$new);
      $new_row=mysqli_num_rows($new_result);
?>
 <?php echo $new_row;$new_row=0;?>
      
    </span>

  </h6>
</a>
</div>
</div>
      

    </div>
    

  </div>
</li>
<?php }

}else{
  echo "<h2>Sorry! No Match Found.</h2>";
} ?>
</ol>




</div>


</div> <!-- /content -->

</div></div> <!-- /wrap -->

<hr />
<?php require('footer.php');?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       <img src="" id="img_src" style="width:100%;height:300px;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript">
$('.img_modal').click(function(e){
  console.log('aoa');
  var img=$(this).attr('data-img');
  $('#img_src').attr('src',img);

});</script>
</body>
</html>
