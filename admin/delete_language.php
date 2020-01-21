<?php
include('../includes/connection.php');

$query  = "SELECT * FROM language WHERE language_id= {$_GET['language_id']}";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_assoc($result);

unlink("upload/{$row['language_image']}");

$query  = "DELETE FROM language WHERE language_id = {$_GET['language_id']} ";
$result = mysqli_query($conn, $query);

header("Location: manage_language.php"); /* back to manage admin page */
