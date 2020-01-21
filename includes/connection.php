<?php 
include('config.php');
$conn = mysqli_connect(DBSERVER,DBUSER,DBPASSWORD,DBNAME);

	if (!$conn) {
		die("Cannot connect to Server");
	}