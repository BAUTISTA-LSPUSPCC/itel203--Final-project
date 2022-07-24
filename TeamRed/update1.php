<?php 
session_start();	
$servername="localhost";
$username="root";
$password="";
$db="customer";

$conn=mysqli_connect($servername, $username, $password, $db);

    if (!$conn) 
    {
        die("Connection Failed". myqli_connect_error());
    }

    error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Information</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="product_image.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="pages.css">
	<style>
 		.wrapper{
 			width: 500px;
 			height: 500px;
 			background-color: lightblue;
 			margin-top: 100px; 	
 			margin-left: 450px;

 				}
body {
    font-family: arial;

    background-image: url('MISSING.jpg');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

#wrapper{
    width: 1220px;
    margin-right: auto;
    margin-left: auto;
    border: thin solid;
    height: auto;
    margin-left: auto;
    margin-right: auto;
    margin-top: -100px;
    
}
a{
    text-decoration: none;
    border: 2px solid black;
    color: black;
    font-size: 25px;
    width: 100px;
}
a:hover{
    font-size: 26px;
}


.dropbtn {
  background-color: white;
  color: black;
  padding: 16px;
  font-size: 25px;
  border: none;
  cursor: pointer;
  width: 60px;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: gray;
}

.dropdown {
  position: relative;
  display: inline-block;
}


.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}


.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  width: 300px;
}

.dropdown-content a:hover {background-color: #ddd}


.show {display:block;}

 	</style>

</head>

<body>
	   <script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
    </script>
	 <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn glyphicon glyphicon-menu-hamburger"></button>
  <div id="myDropdown" class="dropdown-content">
    <?php
          if ($_SESSION['login_user']) 
          {?>
            <a href="Profile.php"><span class="glyphicon glyphicon glyphicon-user">Profile</span></a>
          <?php
          }else{
          ?>
    <a href="Login.php">Sign up/Log in</a><?php } ?>
    <a href="index.php">Home</a>
    <h1><center>Menu</center></h1>
    <a href="Food.php">Organic Food</a>
    <a href="beverage.php">Organic Beverage</a>
    <a href="Custombeverage.php">Customized Beverage</a>
    <h1><center>Other</center></h1>
    <a href="Feedback.php">Feedback</a>
    <a href="http://m.me/angelopolo111">Message Us</a>
    <?php
          if ($_SESSION['login_user']) 
          {?>
            <a href="logout.php"><span class="glyphicon glyphicon-log-out">Log Out</span></a>
          <?php
          }
          ?>
  </div>
</div>

			 <div style="width: 400px; margin-top:auto; margin-left:auto; margin-right: auto;" class="wrapper">
 			 	<form method="POST" action="">
			<?php  
 			$q=mysqli_query($conn, "SELECT * FROM customertable where Cpnumber='$_SESSION[login_user]' ;");
 			?>
 			<h2 style="text-align: center;">Edit Information</h2>
 			<?php 
 			$row=mysqli_fetch_assoc($q);
 			 ?>
 			
 			<table class="table table-bordered" style="color: black;">
 				<tr>
 					<td>
 						<b>First Name:</b>
 					</td>
 					<td>
 						<input style="background-color: white; border-top: white; border-left:white; border-right:white; border-bottom:white" type="text" name="fname" required value="<?php echo $row['firstname']; ?>">
 					</td>

 				</tr>

 				<tr>
 					<td>
 						<b>Last Name:</b>
 					</td>
 					<td>
 						<input style="background-color: white; border-top: white; border-left:white; border-right:white; border-bottom:white" type="text" name="lname" required value="<?php echo $row['lastname']; ?> ">
 					</td>

 				</tr>

 				<tr>
 					<td>
 						<b>Password:</b>
 					</td>
 					<td>
 						<input style="background-color: white; border-top: white; border-left:white; border-right:white; border-bottom:white" type="text" name="password" required value="<?php echo $row['password']; ?> ">
 					</td>

 				</tr>
 				
 				<tr>
 					<td>
 						<b>Email Address:</b>
 					</td>
 					<td>
 						<input style="background-color: white; border-top: white; border-left:white; border-right:white; border-bottom:white" type="email" name="email" required value="<?php echo $row['email']; ?> ">
 					</td>

 				</tr>

 				<tr>
 					<td>
 						<b>Birthday:</b>
 					</td>
 					<td>
 						
 						<input style="background-color: white; border-top: white; border-left:white; border-right:white; border-bottom:white" type="date" name="bday" required value="<?php echo $row['birthday']; ?>" min="1962-01-01" max="2009-12-31">
 					</td>

 				</tr>


 				<tr>
 					<td>
 						<b>Barangay:</b>
 					</td>
 					<td>
 						
 						<input style="background-color: white; border-top: white; border-left:white; border-right:white; border-bottom:white" type="text" required name="brgy" value="<?php echo $row['brgy']; ?>">
 					</td>

 				</tr>

 				<tr>
 					<td>
 						<b>Municipality:</b>
 					</td>
 					<td>
 						
 						<input style="background-color: white; border-top: white; border-left:white; border-right:white; border-bottom:white" type="text" required name="municipality" value="<?php echo $row['municipality']; ?>">
 					</td>

 				</tr>

 				<tr>
 					<td>
 						<b>Province:</b>
 					</td>
 					<td>
 						
 						<input style="background-color: white; border-top: white; border-left:white; border-right:white; border-bottom:white" type="text" required name="province" value="<?php echo $row['province']; ?>">
 					</td>

 				</tr>
 				
 			</table>
 			<input type="submit" name="submit" value="Update" style="margin-left:300px">
 			</form>
 			<div style="border: 2px solid black; margin-top:10px; width:350px; margin-left: 25px; word-break: break-word;">
 				<font color="red">Note!</font> your cellphone number is <b><?php echo $row['Cpnumber']; ?></b>, to change it Log out first and go to Log in form and find the <b><i>Change Cell Phone Number</i></b> Thank you!!.
 			</div>
 			</div>
	 </body>
</html>
<?php include('includes/script.php'); 

?>



			
<?php  
 			$q=mysqli_query($conn, "SELECT * FROM customertable where Cpnumber='$_SESSION[login_user]' ;");
 			?>
 			<?php 
 			$row=mysqli_fetch_assoc($q);
 			 ?>
 			 <?php 

if (isset($_POST['submit'])) 
{
	
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$bday=$_POST['bday'];
	$brgy=$_POST['brgy'];
	$municipality=$_POST['municipality'];
	$province=$_POST['province'];
	$cpnumber=$row['Cpnumber'];


	$sql="UPDATE customertable SET firstname='$fname', lastname='$lname', password='$password', email='$email', birthday='$bday', brgy='$brgy', municipality='$municipality', province='$province' WHERE Cpnumber='$cpnumber'";

	if (mysqli_query($conn, $sql)) {
		echo "<script scr='js/sweetalert-min.js'></script>";          
    		echo "<script type='text/javascript'>";           
    		echo "swal('Updated Successfully','','success').then(okay => {
                              	if (okay)
                              	{
                                	  window.location.href = 'Profile.php';
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
