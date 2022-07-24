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

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email']; 
	$comment = $_POST['comment'];

	$sql = "INSERT INTO feedback (name, email, comment)
			VALUES ('$name', '$email', '$comment')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Comment added successfully.')</script>";
	} else {
		echo "<script>alert('Comment does not add.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<title>Customer Feedback</title>

		<style>
body {
	font-family: arial;
}


a{
	text-decoration: none;
	border: 2px solid black;
	color: black;
	font-size: 25px;
	width: 100px;
}
a:hover{
	font-size: 16px;
}


.dropbtn {
  background-color: transparent;
  color: black;
  padding: 16px;
  font-size: 25px;
  border: none;
  cursor: pointer;
  width: 60px;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: dimgray;
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
<body style="background-color: skyblue;">
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
	<div class="dropdown" style="<?php
          if ($_SESSION['login_user']) 
          {?>margin-left: -1200px;?><?php 	}else{ ?> margin-top:-560px; margin-left: -1200px <?php  } ?>">

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
    <h1><center>Options</center></h1>
    <a href="List.php">List of Missing Persons</a>
    <h1><center>Other</center></h1>
    <a href="https://www.messenger.com/t/5374924139228433">Message Us</a>
     <?php
          if ($_SESSION['login_user']) 
          {?>
            <a href="logout.php"><span class="glyphicon glyphicon-log-out">Log Out</span></a>
          <?php
          }
          ?>
  </div>
</div>
<br>
	<?php

          if ($_SESSION['login_user']) 
          {?>
          	<?php  
 	$q=mysqli_query($conn, "SELECT * FROM customertable where Cpnumber='$_SESSION[login_user]' ;");
 			?>
<?php 
 			$roww=mysqli_fetch_assoc($q);
 			 ?>
	<div class="wrapper" style="margin-top:50;">
		<form action="" method="POST" class="form">
			
			<h1 style="text-align: center;"><font color="strong black">Customer Feedback</font></h1>
				<hr style="border-color: black;"> 
			<div class="row">
				<div class="input-group">
					<input type="hidden" name="name" id="name" value="<?php echo $roww['firstname']; ?>">
				</div>
				<div class="input-group">
					<input type="hidden" name="email" id="email" value="<?php echo $roww['email']; ?>">
				</div>
			</div>
			<div class="input-group textarea">
				<label for="comment" style="margin-top:-200px">Comment:</label>
				<textarea id="comment" name="comment" placeholder="Enter your Comment" required></textarea>
			</div>
			<div class="input-group">
				<button name="submit" class="btn" style="margin-top:-200px">Post Comment</button>
			</div>
		</form>
		<div class="prev-comments" style="margin-top:-250px">
			<h1>Comments:</h1>
			<?php 
			
			$sql = "SELECT * FROM feedback";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?> 

			<div class="single-item">
				<h4><?php echo $row['name']; ?></h4>
				<a href="mailto:<?php echo $row['email']; ?>" style="border: none;"><?php echo $row['email']; ?></a>
				<p><?php echo $row['comment']; ?></p>
			</div>
			<?php

				}
			}
			
			?>
		</div>
	</div>
	<?php }else{ ?> <br><br><?php 
	echo "<b><center>PLease Log in first..</center></b>";
} ?>
</body>
</html>