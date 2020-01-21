<?php
include('../includes/connection.php');


$query  = "SELECT * FROM admin WHERE admin_id= {$_GET['admin_id']}";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_assoc($result);

unlink("upload/{$row['admin_image']}");

$query  = "DELETE FROM admin WHERE admin_id = {$_GET['admin_id']} ";
$result = mysqli_query($conn, $query);

header("Location: manage_admin.php"); /* back to manage admin page */
