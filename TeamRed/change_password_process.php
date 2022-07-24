<?php

	if(isset($_GET['code'])){
		$code = $_GET['code'];

		$conn=new mySqli('localhost','root','','customer');

		if($conn->connect_error){
			die('Could not connect to the database');
		}

		$verifyQuery = $conn->query("SELECT * FROM customertable WHERE code = '$code' and updated_time >= NOW() - Interval 1 DAY");

		if($verifyQuery->num_rows ==0){
			header("Location: Login.php");
			exit();
		}

		if(isset($_POST['change'])){
			$email = $_POST['email'];
			$new_password = $_POST['new_password'];

			$changeQuery= $conn->query("UPDATE customertable SET password= '$new_password' WHERE code ='$code' and updated_time >= NOW()-Interval 1 DAY");

			if($changeQuery){
				header("Location:Success_change.php");
			}
		}
		$conn->close();
		
	}
	else{
			header("Location:Login.php");
			exit();
		}


?>