<?php 
// database connection 
include('../includes/connection.php');

if (isset($_POST['submit'])) {
	// fetch data
	
	$language_name  = $_POST['language_name'];
	// Esiablish connection
	$language_image = $_FILES['language_image']['name'];
	$tmp_name       = $_FILES['language_image']['tmp_name'];
	$path 		    = "upload/";

	move_uploaded_file($tmp_name, $path.$language_image);
	$query  = "SELECT * FROM course WHERE language_name = '{$_POST['language_name']}'" ;
	$result = mysqli_query($conn, $query);

	$row    = mysqli_fetch_assoc($result);

	unlink("upload/{$row['language_image']}");
	
	if ($_FILES['language_image']['error']==0) {
		unlink("upload/{$row['language_image']}");
		$query = "UPDATE language SET  language_name='$language_name',language_image='$language_image' WHERE language_id={$_GET['language_id']}" ;
	}else{
	$query = "UPDATE language SET  language_name='$language_name' WHERE language_id={$_GET['language_id']}" ;
	}

	// Applied query
	if(mysqli_query($conn,$query)){
		header("Location: manage_language.php");
	} /* Back to manage admin page */

}

//fetch data

$query  = " SELECT * FROM language WHERE language_id={$_GET['language_id']}";
$result = mysqli_query($conn, $query); 
$row =  mysqli_fetch_assoc($result);


include('../includes/admin_header.php'); 



?>
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header bg-success text-white">Update language</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">
									<i class="far fa-list-alt"></i> Update language</h3>
							</div>
							<hr>
							<form action='' method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="cc-full_name" class="control-label mb-1">language Name</label>
									<input id="full_name" name="language_name" type="text" class="form-control cc-full_name identified visa" 
									value="<?php echo $row['language_name'];?>">
								</div>
								<div class="form-group">
									<label for="cc-full_name" class="control-label mb-1">language Image</label>
									<input id="full_name" name="language_image" type="file" class="form-control cc-full_name identified visa" value="">
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

