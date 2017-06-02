<?php require('header.php');
?>
<?php 
require('config.php');
$query="select * from images";
$result=mysqli_query($con,$query);
?>
<style type="text/css">
.heading{
  margin: 50px;
  margin-bottom: 50px;
}
.heading input[type=text]{
margin:10px auto !important;
max-width: 500px;
  }
  .heading input[type=submit]{
    margin: 0 auto !important;
    display: block;
    }
    .heading h1{
      text-align: center;
      margin-bottom: 20px;
      }
      #show_data h3{
        text-transform: capitalize;
        text-decoration: underline;
        padding: 15px;
        }</style>
<div id="wrap" style="padding-top:100px;">







<div id="main" class="main-full" style="min-height:80vh;">
  
<div style="clear:both"></div>
<div style="margin:0 auto;width:93%;" id="show_data">

<?php
 $query12="select `name` from tbl_categories";
  $result12=mysqli_query($con,$query12);
  while($row12=mysqli_fetch_array($result12)){
$flowchart_category=$row12['name'];
  $query13="select * from images where flowchart_category like '%$flowchart_category%' order by id DESC";
  $result13=mysqli_query($con,$query13);
if(mysqli_num_rows($result13)>0){
?>
<h3><?php echo $row12['name'];?></h3> 

<ol class="dribbbles group">
<div id="owl-example" class="owl-carousel owl-example">
  <?php
  
   while($row=mysqli_fetch_array($result13)){
 $flowchart_id=$row['id'];
    ?>
<div class="item">
<li id="screenshot-2198341" class="group" style="width:190px;border-radius:10px;margin-right:0;    height: 150px;margin-bottom: 0;">
  <div class="dribbble" style="border-radius:0px;">
    <div class="dribbble-shot">
      <div class="dribbble-img">
        <a class="dribbble-link" href="#none" ><div data-picture="" data-alt="Sleeping">
         <object type="image/svg+xml" data="expleen_svg/<?php echo $row['image'];?>">
    </object>
        </div>
        </a>
<div class="">
  <a class="img_modal dribbble-over" href="show_flowchart.php?title=<?php echo str_replace(" ","+",$row['flowchart_name']);?>&id=<?php echo $row['id'];?>">    <strong style="text-transform:capitalize;"><?php if (strlen($row['flowchart_name']) > 35){
  $id=$row['id'];
   $str = substr($row['flowchart_name'], 0, 35) . '...'; echo $str;
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
$new="select * from flowchart_likes where flowchart_id='$flowchart_id'";
      $new_resul=mysqli_query($con,$new);
      $new_ro=mysqli_num_rows($new_resul);
?>
 <?php echo $new_ro;$new_ro=0;?>
      
    </span>

  </h6>
</a>
</div>
</div>
      

    </div>
    

  </div>
</li>
</div>
<?php } ?>
</div>
</ol>
<?php } }?>



</div>
</div>


</div> <!-- /content -->

</div></div> <!-- /wrap -->

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
<script type="text/javascript">
$(document).ready(function() {
    $("#search").keyup(function (e) {
    
        //removes spaces from username
       
        
        var search = $(this).val();
        if(search.length < 2){$("#result").html('');return;}
        
        if(search.length >= 2){
         //    run_waitMe('body');
            $.get('search_home.php', {'name':search}, function(data) {
           //   $('body').waitMe('hide');

              $("#show_data").html(data);
            });
        }
    }); 
     $(document.body).on('submit','#submit_search',function (e) {
    
        //removes spaces from username
       e.preventDefault();
        run_waitMe('body');
      
        
        var search = $('#search').val();
        
        $.ajax({

        url: 'search_home.php',
        type: 'GET',
        data: {name:search},
        success: function (data) {
        
            $('body').waitMe('hide');

              $("#show_data").html(data);
            }
            });
        
    }); 
});
</script>
</body>
</html>
