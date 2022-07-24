<?php  session_start(); 
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
	<title>List Of Missing</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="product_image.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style>
body {
	font-family: arial;
  background-color: whitesmoke;
}

#wrapper{
	width: auto;
	margin-right: auto;
	margin-left: auto;
	border: thin solid;
	background-color: skyblue;
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
  background-color: dimgray;
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

hr{
width: 900px;
border-color: black;
margin-left: -100px;
margin-top: -4px;
}
.column {
  float: left;
  width: 32.80%;
  padding: 10px;
  height: auto;
}


.row:after {
  content: "";
  display: table;
  clear: both;

}
td img{
    display: block;
    margin-left: 42%;
    margin-right: auto;

}
	

	</style>
</head>
<body>
	<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

	</script>
	<div id="wrapper">

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
    <h1><center>Options</center></h1>
    <a href="List.php">List of Missing Persons</a>
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
<?php

          if ($_SESSION['login_user']) 
          {?>
<center><h1 style="margin-top: -50px"><b>The List of <font color="red">Missing</font> People</b></h1></center>
<br><br>
<h1><center><b>Full List</b></center></h1>
<form action="product_search.php" method="POST" style="float: right; margin-right: 5.8%; margin-top: -3%;">
	<input type="text" name="searchterm" placeholder="Search..." style="height: 30px; margin-top: 4%; width: 360px;">
	<button type="submit" name="Search" class="glyphicon glyphicon-search" style="height:30px; border: none; background-color: transparent; font-size:150%;"></button>
</form>
			

<hr>



  <div class="column" style="background-color:; margin-left: 10px; width: 100%;text-align: center;">
    <h2 style="border-bottom: thin solid; "><center><b><font size="6"><font color="red">Missing!!!</font></font></b></center></h2>
   <?php 

$servername="localhost";
$username="root";
$password="";
$db="customer";

$conn=mysqli_connect($servername, $username, $password, $db);

	if (!$conn) 
	{
		die("Connection Failed". myqli_connect_error());
	}

$info = "SELECT * FROM product";
$result = mysqli_query($conn, $info);


if (mysqli_num_rows($result)>0)
{

	while ($row=mysqli_fetch_assoc($result)):?> 

<div>
		<table width="100%">
			<form  method="POST" action="List.php?action=add$id=<?php echo $row['ID']; ?>">
			
			<tr>
			<td colspan="1"><a style="border: none; " href="images/<?php echo $row['Product_Image'];	?>"><?php echo "<img src='images/".$row['Product_Image']."'>" ?></a></td>
			</tr>
			<tr style="background-color: whitesmoke;">
				<td colspan="1">

					<b><font size="4" style="margin-right: auto; margin-left: auto;"><?php echo $row['Product_Name'];?></font></b>
				</td>
			</tr>
			<tr style="background-color: whitesmoke;">
				<td colspan="1">

					<b><font size="4" style="margin-right: auto; margin-left: auto; "><p>Age: <?php echo $row['Age'];?></p></font></b>
				</td>
			</tr>
		
			<tr style="background-color: whitesmoke;">
				<td colspan="1">
					<b><font size="4" styl; margin-left: auto;" color="red"><strong>Reward: ₱<?php echo $row['Price'];?></strong></font></b>
				</td>
			</tr>
			<tr style="background-color: whitesmoke;"> 
					<center><input type="hidden" name="image" value="<?php echo "<img src='images/".$row['Product_Image']."'>" ?>">
					<input type="hidden" name="hidden_name" value="<?php echo $row['Product_Name']; ?>">
					<input type="hidden" name="hidden_price" value="<?php echo $row['Price']; ?>">
					<input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
				<tr style="background-color: transparent;"><td>
				<tr style="background-color: transparent;"><td><a href="detail.php? detail=<?php echo $row['ID']; ?>" id="detail" class="btn btn-primary" style="width: 100%;"><font size="3">Details</font></a></td></tr>
				</form>
			</tr>
			<tr>
				<form action="https://www.messenger.com/t/5374924139228433" method="POST">
					<td><button style="border: 1px solid black; background-color: #eb6b34; margin-top: 2px; width: 20%; height: 35px; border-radius: 10%;">>>Click If you see this person<<</button></td>
				</form>
			</tr>
			
		</table>
</div><br>



		<?php endwhile; 


	}
else{
	echo "<h2> There are no Missing People </h2>";
}
	?>

</div>
<?php }else{ ?> <br><br><?php 
	echo "<b><center>Log In First to see the List!!</center></b>";
} ?>
</body>
</html>