

<?php 
require_once "Signup.php";
	$firstName = filter_input(INPUT_POST, 'firstname');
	$lastName = filter_input(INPUT_POST, 'lastname');
	$password = filter_input(INPUT_POST, 'password');
	$pass2 = filter_input(INPUT_POST, 'password2');
	$email = filter_input(INPUT_POST, 'email');
	$Cpnumber = filter_input(INPUT_POST, 'Cpnumber');
	$birthday = filter_input(INPUT_POST, 'birthday');
	$purok = filter_input(INPUT_POST, 'purok');
	$bara = filter_input(INPUT_POST, 'brgy');
	$municipality = filter_input(INPUT_POST, 'municipality');
	$province = filter_input(INPUT_POST, 'province');


	//database

	$servername = "localhost";
	$username = "root";
	$passwordc = "";
	$dbname = "customer";



	// Create connection
	$conn = new mysqli($servername, $username, $passwordc, $dbname);
	// Check connection
	if (mysqli_connect_error())
	{
 	   die('Connect Error('. mysqli_connect_errno().')'
      	  .mysqli_connect_error());
	}

	// Check if the username is already register
$check = "SELECT Cpnumber FROM customertable WHERE Cpnumber = '$Cpnumber'";

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
$checkem = "SELECT email FROM customertable WHERE email = '$email'";

$resultem = mysqli_query($conn, $checkem); 

$countem = mysqli_num_rows($resultem);

if($countem > 0)
{
    echo "<script scr='js/sweetalert-min.js'></script>";          
    echo "<script type='text/javascript'>";           
    echo "swal('Email Address Already Register','Please Try Another Email Address','error')";
    echo "</script>";
    exit();
}

// Check if Password Match
if ($password != $pass2) 
{
    echo "<script scr='js/sweetalert-min.js'></script>";          
    echo "<script type='text/javascript'>";           
    echo "swal('Password Does Not Match!','Please Try Again!','error')";
    echo "</script>";
    exit();
}



		$cont = "INSERT INTO customertable (firstname, lastname, password, email, Cpnumber, birthday, purok, brgy, municipality, province) Values('$firstName','$lastName','$password','$email','$Cpnumber','$birthday','$purok','$bara','$municipality','$province')";
		if ($conn->query($cont)) 
		{
    		$_SESSION['firstname'] = $firstName;
    		echo "<script scr='js/sweetalert-min.js'></script>";          
    		echo "<script type='text/javascript'>";           
    		echo "swal('Register Successfully','Welcome $firstName you will be redirect to the Login page','success').then(okay => {
                              	if (okay)
                              	{
                                	  window.location.href = 'Login.php';
                              	}
                          	})";
    		echo "</script>";
    	} 
    	else 
    	{
    		echo "Error: " . $cont . "<br>" . $conn->error;
		}
		$conn->close();
	
 ?>
