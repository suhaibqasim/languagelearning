<?php 
// database connection 
include('../includes/connection.php');

if (isset($_POST['submit'])) {
	// fetch data
	$lesson_name   		= $_POST['lesson_name'];
	$course_id	  		= $_POST['course_id'];
	
	//image
	$lesson_video = $_FILES['lesson_video']['name'];
	$tmp_name      = $_FILES['lesson_video']['tmp_name'];
	$path 		   = "upload/";

	move_uploaded_file($tmp_name, $path.$lesson_video);


	$query = "INSERT INTO lesson (lesson_name,lesson_video,course_id) VALUES ('$lesson_name','$lesson_video','$course_id')";
	// Applied query

	
	if(mysqli_query($conn,$query)){
		echo "<script> window.top.location='manage_lesson.php'</script>";
	}


}



include('../includes/admin_header.php'); ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function()
    {
      $("#language").change(function()
        {
          //get selected parent option 
          var lang = $("#language").val();
          //alert(admin_id);
          $.ajax(
          {
            type: "get",
            url: "ajax/manage_lesson.php?language_id=" + lang,
            success: function(data)
            {
              $("#courses").html(data);
            }
          });
        });
    });
</script>
<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header bg-info text-white">Create lesson</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">
									<i class="fa fa-barcode"></i> New lesson</h3>
							</div>
							<hr>
							<form action='' method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label  class="control-label mb-1">lesson Name</label>
									<input id="full_name" name="lesson_name" type="text" class="form-control cc-full_name identified visa" value="">
								</div>
								
								
								<div class="form-group has-success">
									<label for="cc-" class="control-label mb-1">language ID</label>
									<select name="language_id" id="language" class="form-control">
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
									<label for="cc-" class="control-label mb-1">Courses ID</label>
									<select name="course_id" id="courses" class="form-control">
									
								</select>
								</div>
								<div class="form-group has-success">
									<label class="control-label mb-1">lesson video</label>
									<input name="lesson_video" type="file" class="form-control">
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
							
						
									<th>language Name</th>
									<th>course image</th>
									
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($_GET['sort']) && isset($_GET['language_id'])) {
									$query  = " SELECT * FROM lesson INNER JOIN course ON lesson.course_id = course.course_id WHERE course.course_id = {$_GET['course_id']}";

									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['lesson_id']}</td>";
										echo "<td>{$row['lesson_name']}</td>";
										
										echo "<td>{$row['language_name']}</td>";
										echo "<td><img src='upload/{$row['lesson_image']}'></td>";
										
										echo "<td><a href='delete_lesson.php?lesson_id={$row['lesson_id']}' class='btn btn-danger '>Delete</a></td>";
										echo "<tr>";
									}

								}else {
									$query  = " SELECT * FROM lesson INNER JOIN course ON lesson.course_id = course.course_id";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['lesson_id']}</td>";
										echo "<td>{$row['lesson_name']}</td>";
										
										echo "<td>{$row['language_name']}</td>";
										echo "<td><img height='75px' width='75px' src='upload/{$row['course_image']}'></td>";
										
										echo "<td><a href='delete_lesson.php?lesson_id={$row['lesson_id']}' class='btn btn-danger '>Delete</a></td>";
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
