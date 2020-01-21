<?php 
// database connection 
include('../includes/connection.php');

if (isset($_POST['submit'])) {
	// fetch data
	$email 	  	 = $_POST['admin_email'];
	$password 	 = $_POST['password'];
	$fullname 	 = $_POST['full_name'];

	// Esiablish connection
	$admin_image = $_FILES['admin_image']['name'];
	$tmp_name    = $_FILES['admin_image']['tmp_name'];
	$path 		 = "upload/";

	move_uploaded_file($tmp_name, $path.$admin_image);
	if ($_FILES['admin_image']['error']==0) {
		
		$query  = "SELECT * FROM admin WHERE fullname = '{$_POST['full_name']}'" ;
	
		$result = mysqli_query($conn, $query);

		$row    = mysqli_fetch_assoc($result);

		unlink("upload/{$row['admin_image']}");
		
		$query = "UPDATE admin SET  admin_email='$email' ,admin_password='$password' ,fullname='$fullname', admin_image='$admin_image' WHERE admin_id={$_GET['admin_id']}" ;
	}else{
	$query = "UPDATE admin SET  admin_email='$email' ,admin_password='$password' ,fullname='$fullname' WHERE admin_id={$_GET['admin_id']}" ;
	}
	// Applied query
	if(mysqli_query($conn,$query)){
		header("Location: manage_admin.php");
	} /* Back to manage admin page */

}

//fetch data from edit

$query  = " SELECT * FROM admin WHERE admin_id={$_GET['admin_id']}";
$result = mysqli_query($conn, $query); 
$row = mysqli_fetch_assoc($result);



include('../includes/admin_header.php'); 



?>
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header bg-success text-white">Update Admin</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">
									<i class="far fa-user"></i>  Update Admin</h3>
							</div>
							<hr>
							<form action='' method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="cc-full_name" class="control-label mb-1">Admin Full Name</label>
									<input id="full_name" name="full_name" type="text" class="form-control cc-full_name identified visa" value="<?php echo $row['fullname'];?>">
								</div>
								<div class="form-group">
									<label class="control-label mb-1">Admin Email</label>
									<input id="admin_email" name="admin_email" type="text" class="form-control" value="<?php echo $row['admin_email'];?>">
								</div>
								<div class="form-group has-success">
									<label for="cc-password" class="control-label mb-1">Admin Password</label>
									<input id="password" name="password" type="text" class="form-control cc-paswword valid"value="<?php echo $row['admin_password'];?>" >
								</div>
								<div class="form-group has-success">
									<label class="control-label mb-1">Edit Admin Image</label>
									<input id="" name="admin_image" type="file" class="form-control cc-paswword valid">
								</div>
								<div>
									<button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-success btn-block">
										<span id="save-button-admin"><i class="far fa-edit"></i> Update</span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>

	<?php include('../includes/admin_footer.php'); ?>

