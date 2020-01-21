<?php 
// database connection 
include('../includes/connection.php');

if (isset($_POST['submit'])) {
	// fetch data
	$course_name   		= $_POST['course_name'];
	$course_price  		= $_POST['course_price'];
	$course_description   	= $_POST['course_description'];
	$language_id	  		= $_POST['language_id'];
	
	//image
	$course_image = $_FILES['course_image']['name'];
	$tmp_name      = $_FILES['course_image']['tmp_name'];
	$path 		   = "upload/";

	move_uploaded_file($tmp_name, $path.$course_image);
		
if ($_FILES['course_image']['error']==0) {

	$query  = "SELECT * FROM course WHERE course_name = '{$_POST['course_name']}'" ;
	
	$result = mysqli_query($conn, $query);

	$row    = mysqli_fetch_assoc($result);

	unlink("upload/{$row['course_image']}");
	$query = "UPDATE course SET  
					course_name	='$course_name',
					course_price	='$course_price',
					course_desc 	='$course_description',
					language_id 	= language_id ,
					course_image	='$course_image' WHERE course_id={$_GET['course_id']}" ;

}else{
	$query = "UPDATE course SET  
					course_name	='$course_name',
					course_price	='$course_price',
					course_desc 	='$course_description',
					language_id 	=$language_id 
					WHERE course_id={$_GET['course_id']}" ;

}
	
	
	// Applied query
	if(mysqli_query($conn,$query)){
		header("Location: manage_course.php");
	} /* Back to manage admin page */

}

//fetch data from edit

$query  = " SELECT * FROM course WHERE course_id={$_GET['course_id']}";
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
						<div class="card-header bg-success text-white">Create course</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">
									<i class="fa fa-barcode"></i> New course</h3>
							</div>
							<hr>
							<form action='' method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label  class="control-label mb-1">course Name</label>
									<input  name="course_name" type="text" class="form-control cc-full_name identified visa" value="<?php echo $row['course_name'];?>">
								</div>
								<div class="form-group">
									<label class="control-label mb-1">course Price</label>
									<input  name="course_price" type="text" class="form-control" value="<?php echo $row['course_price'];?>">
								</div>
								<div class="form-group has-success">
									<label class="control-label mb-1">course Description</label>
									<input  name="course_description" type="text" class="form-control cc-paswword valid"value="<?php echo $row['course_desc'];?>">
								</div>
								<div class="form-group has-success">
									<label for="cc-" class="control-label mb-1">Select language</label>
									<select name="language_id" id="select" class="form-control">
									<option disabled>Select language</option>
									<?php
									$query  = " SELECT * FROM language";
									$result = mysqli_query($conn, $query);

									while ($row1 = mysqli_fetch_assoc($result))
										if ($row1['language_id']==$_GET['language_id']) {
										 	echo "<option value='{$row1['language_id']}' selected>{$row1['language_name']}</option>";
										 } else{
										echo "<option value='{$row1['language_id']}'>{$row1['language_name']}</option>";
									}
										?>
								</select>
								</div>
								<div class="form-group has-success">
									<label class="control-label mb-1">course Image</label>
									<input name="course_image" type="file" class="form-control">
								</div>
								<div>
									<button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-success btn-block">
										<span id="save-button-admin"><i class="far fa-edit"></i>  Update</span>
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

