<?php 
$servername="localhost";
$username="root";
$password="";
$db="customer";
session_start();
error_reporting(0);
$conn=mysqli_connect($servername, $username, $password, $db);

	if (!$conn) 
	{
		die("Connection Failed". myqli_connect_error());
	}
	if (isset($_GET['detail'])) {
		$id = $_GET['detail'];
$q=mysqli_query($conn, "SELECT * FROM product where ID=$id;");
$row=mysqli_fetch_assoc($q);
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>details</title>
	<link rel="stylesheet" type="text/css" href="detail_product.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="product_image.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style>
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
.bg-model{
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 0.7);
	position: absolute;
	top: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	display: none;
}
.model-content{
	width: 200px;
	height: 200px;
	background-color: white;
	border-radius: 4px;
	position: relative;
}
.close{
	position: absolute;
	top: 10px;
	right: 14px;
	font-size: 42px;
	transform: rotate(45deg);
	cursor: pointer;
	text-decoration: none;
	color: red;

}

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
<div style="background-color: red; border: 4px solid black;"><h1 style="text-align: center;">Details</h1></div>
<div>
	<br>
	<div class="dropdown" style="margin-top: auto;">

  <button onclick="myFunction()" class="dropbtn glyphicon glyphicon-menu-hamburger"></button>
  <div id="myDropdown" class="dropdown-content">
  	<?php
          if ($_SESSION['login_user']) 
          {?>
            <a href="Profile.php"><span class="glyphicon 	glyphicon glyphicon-user">Profile</span></a>
          <?php
          }else{
          ?>
    <a href="Login.php">Sign up/Log in</a><?php } ?>
     <a href="index.php">Home</a>
    <h1><center>Processes</center></h1>
    <a href="List.php">List of Missing Persons</a>
    <h1><center>Other</center></h1>
    <a href="#">Feedback</a>
    <a href="#">Message Us</a>
     <?php
          if ($_SESSION['login_user']) 
          {?>
            <a href="logout.php"><span class="glyphicon glyphicon-log-out">Log Out</span></a>
          <?php
          }
          ?>
  </div>
</div>
	<table>
		
<tr>
	<td><?php echo "<img src='images/".$row['Product_Image']."'>" ?></td>
</tr>
	</table>
	<p style="border: 2px solid black; width: 400px; margin-top: -300px; margin-left: 400px;"><b>Name: <?php echo $row['Product_Name']; ?></b></p>
	<p style="border: 2px solid black; width: 400px; margin-left: 400px"><b>Reward Price:<strong> <font color="red">₱<?php echo $row['Price']; ?></font></strong></b></p>

</form>	<br>
<div style="border: 2px solid black; width: 52.3%; margin-left: 400px; height: 220px;"><center>
<div style="margin-top: 10px">
<p style="border: 2px solid black; width: 400px;"><b> Reason of being Missing</b></p></div></center>
<p style="word-break: break-word"><?php echo $row['Product_Description']; ?></p>
</div>
<br>

<div class="bg-model">
		<div class="model-content">
			<form action="" method="POST">
			<button class="close" name="cl" id="cl">+</button>
	</form>
			
</div>
</div>

</div>
</body>
</html>
