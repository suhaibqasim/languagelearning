<?php 
// database connection 
include('../includes/connection.php');

if (isset($_POST['submit'])) {
	// fetch data
	$languagename 	  = $_POST['language_name'];
	$language_image   = $_FILES['language_image']['name'];
	$tmp_name         = $_FILES['language_image']['tmp_name'];
	$path 		      = "upload/";
	move_uploaded_file($tmp_name, $path.$language_image);
	

	$query = "INSERT INTO language (language_name,language_image) VALUES ('$languagename','$language_image')";
	// Applied query
	if(mysqli_query($conn,$query)){
		header("Location: manage_language.php");
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
						<div class="card-header bg-info text-white">Add language</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">
									<i class="far fa-list-alt"></i> New language</h3>
							</div>
							<hr>
							<form action='' method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="cc-full_name" class="control-label mb-1">language Name</label>
									<input id="full_name" name="language_name" type="text" class="form-control cc-full_name identified visa" value="" data-val="true">
								</div>
								<div class="form-group">
									<label for="cc-full_name" class="control-label mb-1">language Image</label>
									<input id="full_name" name="language_image" type="file" class="form-control cc-full_name identified visa" value="" data-val="true">
								</div>
								<div>
									<button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
										<span id="save-button-admin"><i class="fas fa-plus"></i> Save</span>
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
									<th>language</th>
									<th>Image</th>
									<th>View</th>
									<th>Edit</th>
									<th>Delete</th>	
								</tr>
							</thead>
							<tbody>
								<?php
									$query  = " SELECT * FROM language";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['language_id']}</td>";
										echo "<td>{$row['language_name']}</td>";
										echo "<td><img height='75px' width='75px' src='upload/{$row['language_image']}'></td>";
										echo "<td><a href='view_course.php?language_id={$row['language_id']}' class='btn btn-success'>View</a></td>";
										echo "<td><a href='edit_language.php?language_id={$row['language_id']}' class='btn btn-warning'>Edit</a></td>";
										echo "<td><a href='delete_language.php?language_id={$row['language_id']}' class='btn btn-danger ' >Delete</a></td>";
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
