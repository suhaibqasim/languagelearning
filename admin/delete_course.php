<?php
include('../includes/connection.php');


$query  = "DELETE FROM course WHERE course_id = {$_GET['course_id']} ";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_assoc($result);

unlink("upload/{$row['course_image']}");


header("Location: manage_course.php"); /* back to manage admin page */
