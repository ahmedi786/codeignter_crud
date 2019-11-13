<!DOCTYPE	>
<html> 
<head> 
	<title>Crud Application</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-dark bg-primary">
		<div class="container">
			<div><h4>CRUD APPLICATION</h4></div>
			
		</div>
	</nav>
		<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form name="createform" method="post" action="<?php echo base_url().'index.php/user/create';?>" enctype="multipart/form-data" accept-charset="utf-8">
					<div> <h3>Create User </h3></div>

					<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" value="<?php set_value('name')?>" class="form-control">
					<?php echo form_error('name')?>
					</div>

					<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" value="<?php set_value('email')?>" class="form-control">
					<?php echo form_error('email')?>
					</div>

					<div class="form-group">
					<label>Photo</label>
					<input type="file" name="userfile" value="<?php set_value('photo')?>" class="form-control">
					<?php echo form_error('photo')?>
					</div>

					<div class="form-group">
					<button class="button btn bg-primary">create</button>
					
					<a href="<?php echo base_url().'index.php/user/index'?>" class="button btn bg-secondary">cancel</a>
					</div>

				</form>
				
			</div>
		</div>
		
	</div>

</body>
</html>