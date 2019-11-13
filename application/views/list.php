<!DOCTYPE>
<html>
<head> 
	<title>Crud Application</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-dark bg-primary">
		<div class="container">

			<div><h4>List Users</h4></div>
			
		</div>
	</nav> 

		<?php 

		$session=$this->session->flashdata('success');

		if($session != ""){?>
	 
	      <div class="alert alert-success">
  			<strong><?php echo $session; ?></strong>
		 </div>

		<?php }?>

		<div class="container">
		<div class="row">
			<div class="col-md-6"><br>
				<a href="<?php echo base_url('index.php/user/create')?>" class="btn btn-success">Add User</a><br><br>
				<form name="editform" method="post" action="">
				<table class="table table-striped table-bordered">
					<tr>
						<td>Id</td>
						<td>Image</td>
						<td>Username</td>
						<td>Email</td>
						<td>Created_at</td> 
						<td>Action</td> 
						<td>Action</td>
					</tr> 

					<?php foreach($users as $user){?>
						<tr>
							<td><?php echo $user->user_id;?></td>
							<td><img src="<?php echo $user->photo?>" width='100' height='100'></td>
							<td><?php echo $user->name;?></td>
							<td><?php echo $user->email;?></td>
							<td><?php echo $user->created_at;?></td>
							<td><a href="<?php echo base_url().'index.php/user/edit/'.$user->user_id?>" class="btn btn-success">Edit</a></td>
							<td><a href="<?php echo base_url().'index.php/user/delete/'.$user->user_id?>" class="btn btn-danger">Delete</a></td>
						</tr>
					<?php } ?>
					

				</table>
				</form>
				
			</div>
		</div>
		
	</div>

</body>
</html>
