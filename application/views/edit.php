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

		<?php

		$session = $this->session->flashdata('success');

		if($session != ""){?>
			<div class="alert alert-success">
  			<strong><?php echo $session; ?></strong>
		 </div>
		<?php }?>

		?>

		<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form name="Edit form" method="post" action="<?php echo base_url().'index.php/user/update';?>">
					<div> <h3>Edit User </h3></div>

					<div class="form-group">
					<label>Name</label>
					<input type="hidden" name="user_id" value="<?php echo $data[0]['user_id']?>">
					<input type="text" name="name" value="<?php echo $data[0]['name']?>" class="form-control">
					<?php echo form_error('name')?>
					</div>

					<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" value="<?php echo $data[0]['email']?>" class="form-control">
					<?php echo form_error('email')?>
					</div>

					<div class="form-group">
					<input type="submit" class="btn btn-success" value="update">
					
					<a href="<?php echo base_url().'index.php/user/index'?>" class="btn btn-danger">cancel</a>
					</div>

				</form>
				
			</div>
		</div>
		
	</div>

</body>
</html>