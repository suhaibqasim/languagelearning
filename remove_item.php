<?php
	session_start();
	$i = 0; 
		foreach($_SESSION["course_id"] as $key => $value) {
			if($_GET['course_id'] == $value){
				$i++;
				if ($i==1) {				
					unset($_SESSION["course_id"][$key]);
					echo "<script> window.top.location='single_course_details.php?course_id={$_GET['course_id']}' </script>";
				}else{
					echo "<script> window.top.location='single_course_details.php?course_id={$_GET['course_id']}' </script>";
				}
			}
		
		}		
	

?>