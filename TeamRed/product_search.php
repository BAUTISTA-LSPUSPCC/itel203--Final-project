<?php 	
session_start();
error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="product_image.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style>
body {
	font-family: arial;
}

#wrapper{
	width: auto;
	margin-right: auto;
	margin-left: auto;
	border: thin solid;
	background-color: #ffc;
	height: auto;
	
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

td img{
    display: block;
    margin-left: 500px;
    margin-right: auto;

}
</style>
</head>
<body>
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
    <a href="Food.php">Report a Missing Person</a>
    <a href="beverage.php">List of Missing Persons</a>
    <h1><center>Other</center></h1>
    <a href="Feedback.php">Feedback</a>
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
	<center><h1 style="margin-top: -50px"><b>Search</b></h1></center>
	<center>
<form action="product_search.php" method="POST">
	<input type="text" name="searchterm" placeholder="Search" style="height: 30px; width: 500px; border-radius: 50px;">
	<button type="submit" name="Search" class="glyphicon glyphicon-search" style="height:30px; border: none; background-color: transparent; font-size:150%;"></button>
</form>
	<form action="Food.php" method="POST">
			<button style="border: none; font-size:25px; background-color: transparent; float: left; margin-top: -30px; margin-left: 250px;" class="glyphicon glyphicon-arrow-left"> GoBack</button>
		</form>
	</center>
	<hr style="border-color: black;">	
	<?php 	

		
$servername="localhost";
$username="root";
$password="";
$db="customer";

$mysqli = new mysqli($servername, $username, $password, $db);

$conn=mysqli_connect($servername, $username, $password, $db);

	if (!$conn) 
	{
		die("Connection Failed". myqli_connect_error());
	}

$term = filter_input(INPUT_POST, 'searchterm');

$search = "SELECT * FROM product WHERE Product_Name like '%$term%' ";
$search_result = $mysqli->query($search);

if ($search_result->num_rows > 0) {
	while ($row = $search_result->fetch_assoc()) {
		?>
		<div>
		<table width="100%" style="text-align:center;">
			<form  method="POST" action="Food.php?action=add$id=<?php echo $row['ID']; ?>">
			
			<tr>
				<td colspan="2" ><a style="border: none;" href="images/<?php echo $row['Product_Image'];	?>"><?php echo "<img src='images/".$row['Product_Image']."'>" ?></a></td>
			</tr>
			<tr style="background-color: whitesmoke;">
				<td colspan="2">

					<b><font size="4" style="margin-right: auto; margin-left: auto; "><?php echo $row['Product_Name'];?></font></b>
				</td>
			</tr>
			<tr style="background-color: whitesmoke;">
				<td colspan="2">
					<b><font size="4" style="margin-right: auto; margin-left: auto;" color="red"><strong>₱<?php echo $row['Price'];?></strong></font></b>
				</td>
			</tr>
			<tr style="background-color: whitesmoke;"> 
					<input type="hidden" name="image" value="<?php echo "<img src='images/".$row['Product_Image']."'>" ?>">
					<input type="hidden" name="hidden_name" value="<?php echo $row['Product_Name']; ?>">
					<input type="hidden" name="hidden_price" value="<?php echo $row['Price']; ?>">
					<input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
				<tr style="background-color: transparent;"><td>
				<tr style="background-color: transparent;"><td><a href="detail.php? detail=<?php echo $row['ID']; ?>" id="detail" class="btn btn-primary" style="width: 100%;"><font size="3">Details</font></a></td></tr>
				</form>
			</tr>
			
		</table>
</div><br>

<?php 

		 	}
}
else{
	echo "No Result Found";
}
mysqli_free_result($search_result);
$mysqli->close();
	 ?>
</body>
</html>