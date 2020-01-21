<?php
include('../../includes/connection.php');

$query = "SELECT * FROM course WHERE language_id= {$_GET['language_id']}";
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='{$row['course_id']}'>{$row['course_name']}</option>";	
}