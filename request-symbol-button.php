

<html>
	<head>
		<title>Expleen</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
	</head>
	
	<body class="body_padding">
	
	<div class="container" id="main">
		
	

	<button type="button" class="btn btn-primary add-role-button_dashboard" data-toggle="modal" data-target="#AddRoleModal"><span class="glyphicon glyphicon-plus-sign"></span> Ask for Symbol</button>
	
	
	</div>	
	
<!-- Add Role Modal-->
	
	<div class="modal fade" id="AddRoleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			 <p> <span class="profile-heading "><span class="glyphicon glyphicon-th-large"> </span> Add a role or a project</span> </p>
		  </div>
		  <div class="modal-body">
				<form class="form-horizontal">
				
					<div class="form-group">
						<label class="col-lg-3 control-label" for="inputName">Your Role</label>
						<div class="col-lg-9">
							<input class="form-control" id="inputName" placeholder="Enter your role here" type="text">
						</div>
					</div>
					



					<button type="button" class="btn btn-primary btn-sm" ><span class="glyphicon glyphicon-file"></span> Attach a PDF file</button>
					
				</form>
					
				<?php require 'request-symbol.php';?>
				
		  </div>
		 <div class="modal-footer">
			<button class="btn btn-success" type="submit">Save</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		 </div>
		</div>
	  </div>
	</div>


	


	</body>


</html>

