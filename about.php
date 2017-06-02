<?php require('header.php');
?>

	<div style="padding-top: 50px; padding-right: 300px; padding-bottom: 50px; padding-left: 300px;">
		<h3>What is Expleen for</h3> 

		<p>Expleen is the first credible and community driven source of graphical explanation of every process around us. There are a lot of complicated processed and phenomena going on every time around us. For example, how does our laundry machine work or how the moon is orbiting around earth or what is DNA. Such questions can be explained by long and complicated text or by a simple graphical method. We are a platform for the latter case. </p>
		<p>This is a place for you where you can create their accounts and start adding “expleens” to explain our world. Others can learn from their expleens, add comments or and share on social media.</p>
		<p>Expleen settles curiosity of our mind which wants to know about everything around us</p>
		<img src="/images/about_expleen.png" alt="what is expleen" align="middle">

	</div>


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
