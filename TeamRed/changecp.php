<?php 
session_start(); 
error_reporting(0);
include 'config.php';
$servername = "localhost";
	$username = "root";
	$passwordc = "";
	$dbname = "customer";



	// Create connection
	$conn1 = new mysqli($servername, $username, $passwordc, $dbname);
	// Check connection
	if (mysqli_connect_error())
	{
 	   die('Connect Error('. mysqli_connect_errno().')'
      	  .mysqli_connect_error());
	}
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Email Address</title>
</head>
<body style="border: 1px solid black; width: 500px;  margin-left: 35%; margin-top: 50px">
	<center>
		<h1>Edit / Change CellPhone Number</h1>
		<form method="POST" action="">
			<label for="email">Enter your existing Email Address:</label><br>
			<input type="email" name="email" required="" placeholder="name@example.com" style="width:300px"><br><br>
			<label for="new">Enter New CellPhone Number:</label><br>
			<input type="text" name="new" required="" placeholder="Cellphone Number(Enter 11 digit)" pattern="[0-9]{11}" style="width: 300px">
			<br><br>
			<a href="Login.php" style="text-decoration: none; border: 1px solid black ; color: black; margin-left:-450px;margin-top: 15px;width: 160px;height: 30px; font-size: 20px; background-color: silver; border-radius: 5px;border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">Back</a>
			<div style="margin-top: -22px;">
			<input type="submit" name="submit" value="Update" style="margin-top: -5px; margin-bottom: 15px; width: 160px;height: 30px; font-size: 20px; background-color: skyblue; border-radius: 5px;border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
			</div>

		</form>
	</center>

</body>
</html>
<?php include('includes/script.php'); ?>
<?php
if (isset($_POST['submit'])) {
	$email=$_POST['email'];
	$new=$_POST['new'];

	
	$already = "SELECT email FROM customertable WHERE email='$email'";
	$ans = mysqli_query($conn, $already);
	$count = mysqli_num_rows($ans);
if ($count <1) {
	 echo "<script scr='js/sweetalert-min.js'></script>";          
    echo "<script type='text/javascript'>";           
    echo "swal('Email Address not Found','Please Try Another Email Address or Check your Email Address Thank you','error')";
    echo "</script>";
    exit();
}

$check = "SELECT Cpnumber FROM customertable WHERE Cpnumber = '$new'";

$result = mysqli_query($conn, $check); 

$count = mysqli_num_rows($result);

if($count > 0)
{
    echo "<script scr='js/sweetalert-min.js'></script>";          
    echo "<script type='text/javascript'>";           
    echo "swal('CellPhone Number Already Register','Please Try Again Another CellPhone number or Login Using That Name','error')";
    echo "</script>";
    exit();
}

$sql = "UPDATE customertable SET Cpnumber = '$new' WHERE email='$email'";
if (mysqli_query($conn, $sql)) {
		echo "<script scr='js/sweetalert-min.js'></script>";          
    		echo "<script type='text/javascript'>";           
    		echo "swal('Upadated Successfully','','success').then(okay => {
                              	if (okay)
                              	{
                                	  window.location.href = 'Login.php';
                              	}
                          	})";
    		echo "</script>";
	}
	else
		{
			echo "Error:" .$sql. "<br>" .mysqli_error($conn);
		}
}


  ?>