<?php 
// database connection 
include('../includes/connection.php');

if (isset($_POST['submit'])) {
	// fetch data
	$email 	     = $_POST['admin_email'];
	$password    = $_POST['password'];
	$fullname    = $_POST['admin_fullname'];
	// Esiablish connection
	$admin_image = $_FILES['admin_image']['name'];
	$tmp_name    = $_FILES['admin_image']['tmp_name'];
	$path 		 = "upload/";

	move_uploaded_file($tmp_name, $path.$admin_image);


	$query = "INSERT INTO admin (admin_email, admin_password, fullname, admin_image) VALUES ('$email','$password','$fullname','$admin_image')";
	// Applied query

	if(mysqli_query($conn,$query)){
		header("Location: manage_admin.php");
	}


}



include('../includes/admin_header.php'); ?>
<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header bg-info text-white">Create Admin</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">
									<i class="far fa-user"></i> New Admin</h3>
							</div>
							<hr>
							<form action='' method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="cc-full_name" class="control-label mb-1">Admin Full Name</label>
									<input id="full_name" name="admin_fullname" type="text" class="form-control cc-full_name identified visa" value="">
								</div>
								<div class="form-group">
									<label class="control-label mb-1">Admin Email</label>
									<input id="admin_email" name="admin_email" type="text" class="form-control">
								</div>
								<div class="form-group has-success">
									<label for="cc-password" class="control-label mb-1">Admin Password</label>
									<input id="password" name="password" type="Password" class="form-control cc-paswword valid">
								</div>
								<div class="form-group has-success">
									<label for="cc-" class="control-label mb-1">Admin Image</label>
									<input id="" name="admin_image" type="file" class="form-control">
								</div>
								<div>
									<button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
										<span id="save-button-admin"><i class="fas fa-plus"></i>    
										 	Save </span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row m-t-30">
				<div class="col-md-12">
					<!-- DATA TABLE-->
					<div class="table-responsive m-b-40">
						<table class="table table-borderless table-data3">
							<thead>
								<tr>
									<th>Id</th>
									<th>Email</th>
									<th>Name</th>
									<th>Image</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query  = " SELECT * FROM admin";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['admin_id']}</td>";
										echo "<td>{$row['admin_email']}</td>";
										echo "<td>{$row['fullname']}</td>";
										echo "<td> <img height='75px' width='75px' src='upload/{$row['admin_image']}'> </td>";
										echo "<td><a href='edit_admin.php?admin_id={$row['admin_id']}' class='btn btn-warning'>Edit</a></td>";
										echo "<td><a href='delete_admin.php?admin_id={$row['admin_id']}' class='btn btn-danger '>Delete</a></td>";
										echo "<tr>";
									}
								?>
							</tbody>
						</table>
					</div>
					<!-- END DATA TABLE-->
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../includes/admin_footer.php'); ?>
