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


	$query = "INSERT INTO course (course_name, course_price, course_desc,language_id,course_image) VALUES ('$course_name','$course_price','$course_description',$language_id, '$course_image')";
	// Applied query

	
	if(mysqli_query($conn,$query)){
		header("Location: manage_course.php");
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
						<div class="card-header bg-info text-white">Create course</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">
									<i class="fa fa-barcode"></i> New course</h3>
							</div>
							<hr>
							<form action='' method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label  class="control-label mb-1">course Name</label>
									<input id="full_name" name="course_name" type="text" class="form-control cc-full_name identified visa" value="">
								</div>
								<div class="form-group">
									<label class="control-label mb-1">course Price</label>
									<input id="admin_email" name="course_price" type="text" class="form-control">
								</div>
								<div class="form-group has-success">
									<label for="cc-password" class="control-label mb-1">course Description</label>
									<input id="password" name="course_description" type="text" class="form-control cc-paswword valid">
								</div>
								<div class="form-group has-success">
									<label for="cc-" class="control-label mb-1">language ID</label>
									<select name="language_id" id="select" class="form-control">
									<option disabled selected>Select language</option>
									<?php
									$query  = " SELECT * FROM language";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_array($result)) 
										echo "<option value='$row[0]'>{$row[1]}</option>";
										?>
								</select>
								</div>
								<div class="form-group has-success">
									<label class="control-label mb-1">course Image</label>
									<input name="course_image" type="file" class="form-control">
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
			<div class="card">
				<div class="card-body card-block">
					<form action='' method="get">
						<div class="row form-group">
							<div class="col-3">
								<label for="select" class=" form-control-label">Select language:</label>
							</div>
							<div class="col-12 col-md-9">
								<select name="language_id" id="select" class="form-control">
									<option selected disabled>Show all language</option>
								<?php
									$query  = " SELECT * FROM language";
									$result = mysqli_query($conn, $query);
									$currentName = $row["language_id"];

									while ($row = mysqli_fetch_array($result)) 
										echo "<option value='$row[0]'>{$row[1]}</option>";
										?>
								</select>
							</div>
						</div>
						<div class="col-12 ">
							<input type="submit" name="sort" value="Sort" class="btn btn-info float-right">
						</div>
					</div>						
				</form>
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
									<th>Name</th>
									<th>Price</th>
									<th>Description</th>
									<th>language Name</th>
									<th>course image</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($_GET['sort']) && isset($_GET['language_id'])) {
									$query  = " SELECT * FROM course INNER JOIN language ON course.language_id = language.language_id WHERE language.language_id = {$_GET['language_id']}";

									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['course_id']}</td>";
										echo "<td>{$row['course_name']}</td>";
										echo "<td>{$row['course_price']}</td>";
										echo "<td>{$row['course_desc']}</td>";
										echo "<td>{$row['language_name']}</td>";
										echo "<td><img src='upload/{$row['course_image']}'></td>";
										echo "<td><a href='edit_course.php?course_id={$row['course_id']}' class='btn btn-warning'>Edit</a></td>";
										echo "<td><a href='delete_course.php?course_id={$row['course_id']}' class='btn btn-danger '>Delete</a></td>";
										echo "<tr>";
									}

								}else {
									$query  = " SELECT * FROM course INNER JOIN language ON course.language_id = language.language_id";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['course_id']}</td>";
										echo "<td>{$row['course_name']}</td>";
										echo "<td>{$row['course_price']}</td>";
										echo "<td>{$row['course_desc']}</td>";
										echo "<td>{$row['language_name']}</td>";
										echo "<td><img height='75px' width='75px' src='upload/{$row['course_image']}'></td>";
										echo "<td><a href='edit_course.php?course_id={$row['course_id']}&language_id={$row['language_id']}' class='btn btn-warning'>Edit</a></td>";
										echo "<td><a href='delete_course.php?product_id={$row['course_id']}' class='btn btn-danger '>Delete</a></td>";
										echo "<tr>";
									}
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
