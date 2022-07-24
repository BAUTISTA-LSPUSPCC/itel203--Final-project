<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="image.css">

	<style>
body {
	font-family: arial;
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
	font-size: 26px;
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
	<div id="wrapper">
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn glyphicon glyphicon-menu-hamburger"></button>
  <div id="myDropdown" class="dropdown-content">
    <a href="Login.php">Sign up/Log in</a>
  </div>
</div>
<div>
	<h1 style="margin-top: -10px;"><center><b>ADMIN</b></center></h1><br><br>

<form action="add_product.php" method="POST">
	<div style="float: left;">
<button class="btn btn-primary" style="margin-left: 10px;" ><font size="3">Add New Missing Person</font></button><br><br>
</div>
</form>
<form action="Search.php" method="POST">

<input type="text" name="Search" required placeholder="Type here..." style="height: 32px; width: 250px; float: right; margin-top: 2px; margin-right: 20px;"> 
<button class="glyphicon glyphicon-search btn btn-primary" name="submits" style="margin-right: 10px; float: right;"><font size="3">Search</font></button>

</form><br><br><br><br> 
</body>
</html>
<?php include('includes/script.php'); ?>
<?php
$ProductName = filter_input(INPUT_POST, 'product_name');
$Age = filter_input(INPUT_POST, 'Age');
$Price = filter_input(INPUT_POST, 'price');
$Category = filter_input(INPUT_POST, 'category');
$Description = filter_input(INPUT_POST, 'description');
$Img = filter_input(INPUT_POST, 'img');


$servername="localhost";
$username="root";
$password="";
$db="customer";

$conn=mysqli_connect($servername, $username, $password, $db);

	if (!$conn) 
	{
		die("Connection Failed". myqli_connect_error());
	}



$info = "SELECT * FROM product WHERE Category='new born-17 y/r old'";
$result = mysqli_query($conn, $info);

if (mysqli_num_rows($result)>0)
{
	?>
	<center>
	<table class="table table-bordered" style="text-align: center; width: 100%; font-size: 20px;">
			
			<thead class="thead-dark">
				<th COLSPAN=8 WIDTH=80% style="height: 25px;"><b><center>new born-17 y/r old</center></b></th>
			<tr style="word-break: 50px">
				<td  scope="col"><b>ID</b></td>
				<td  scope="col"><b>Name</b></td>
				<td  scope="col"><b>Age</b></td>
				<td  scope="col"><b>Price</b></td>
				<td  scope="col"><b>Category</b></td>
				<td  scope="col"><b>Description</b></td>
				<td  scope="col"><b>Image</b></td>
				<td  scope="col"><b>Operation</b></td>
			</tr>
			</thead>
			<?php
	while ($row=mysqli_fetch_assoc($result)):?> 
		
			<tr>
				<th scope="row"><?php echo $row['ID'];?></th>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Product_Name'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Age'];?></td>
				<td style="word-break: break-word; max-width: 0;">₱<?php echo $row['Price'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Category'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Product_Description'];?></td>
				<td style="word-break: break-word; max-width: 0;"><a style="border: none;" href="images/<?php echo $row['Product_Image'];	?>"><?php echo "<img src='images/".$row['Product_Image']."'>" ?></a></td>
				<td>
					
					<a href="update.php? update=<?php echo $row['ID']; ?>" id="update" class="btn btn-primary"><font size="3">Update</font></a>
					<a href="delete.php? delete=<?php echo $row['ID']; ?>" id="delete" class="btn btn-danger"><font size="3">Delete</font></a>
				</td>
			</tr>


<?php endwhile; ?>
		</table>
		</center>
	<?php	
}



$info = "SELECT * FROM product WHERE Category='18-29 y/r old'";
$result = mysqli_query($conn, $info);

if (mysqli_num_rows($result)>0)
{
	?>
	<center>
	<table class="table table-bordered" style="text-align: center; width: 100%; font-size: 20px;">
			
			<thead class="thead-dark">
				<th COLSPAN=8 WIDTH=80% style="height: 25px;"><b><center>18-29 y/r old</center></b></th>
			<tr style="word-break: 50px">
				<td  scope="col"><b>ID</b></td>
				<td  scope="col"><b>Name</b></td>
				<td  scope="col"><b>Age</b></td>
				<td  scope="col"><b>Price</b></td>
				<td  scope="col"><b>Category</b></td>
				<td  scope="col"><b>Description</b></td>
				<td  scope="col"><b>Image</b></td>
				<td  scope="col"><b>Operation</b></td>
			</tr>
			</thead>
			<?php
	while ($row=mysqli_fetch_assoc($result)):?> 
		
			<tr>
				<th scope="row"><?php echo $row['ID'];?></th>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Product_Name'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Age'];?></td>
				<td style="word-break: break-word; max-width: 0;">₱<?php echo $row['Price'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Category'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Product_Description'];?></td>
				<td style="word-break: break-word; max-width: 0;"><a style="border: none;" href="images/<?php echo $row['Product_Image'];	 ?>"><?php echo "<img src='images/".$row['Product_Image']."'>" ?></a></td>
				<td>
					
					<a href="update.php? update=<?php echo $row['ID']; ?>" id="update" class="btn btn-primary"><font size="3">Update</font></a>
					<a href="delete.php? delete=<?php echo $row['ID']; ?>" id="delete" class="btn btn-danger"><font size="3">Delete</font></a>
				</td>
			</tr>


<?php endwhile; ?>
		</table>
		</center>
	<?php	
}



$info = "SELECT * FROM product WHERE Category='30-59 y/r old'";
$result = mysqli_query($conn, $info);

if (mysqli_num_rows($result)>0)
{
	?>
	<center>
	<table class="table table-bordered" style="text-align: center; width: 100%; font-size: 20px;">
			
			<thead class="thead-dark">
				<th COLSPAN=8 WIDTH=80% style="height: 25px;"><b><center>30-59 y/r old</center></b></th>
			<tr style="word-break: 50px">
				<td  scope="col"><b>ID</b></td>
				<td  scope="col"><b>Name</b></td>
				<td  scope="col"><b>Age</b></td>
				<td  scope="col"><b>Price</b></td>
				<td  scope="col"><b>Category</b></td>
				<td  scope="col"><b>Description</b></td>
				<td  scope="col"><b>Image</b></td>
				<td  scope="col"><b>Operation</b></td>
			</tr>
			</thead>
			<?php
	while ($row=mysqli_fetch_assoc($result)):?> 
		
			<tr>
				<th scope="row"><?php echo $row['ID'];?></th>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Product_Name'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Age'];?></td>
				<td style="word-break: break-word; max-width: 0;">₱<?php echo $row['Price'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Category'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Product_Description'];?></td>
				<td style="word-break: break-word; max-width: 0;"><a style="border: none;" href="images/<?php echo $row['Product_Image'];	 ?>"><?php echo "<img src='images/".$row['Product_Image']."'>" ?></a></td>
				<td>
					
					<a href="update.php? update=<?php echo $row['ID']; ?>" id="update" class="btn btn-primary"><font size="3">Update</font></a>
					<a href="delete.php? delete=<?php echo $row['ID']; ?>" id="delete" class="btn btn-danger"><font size="3">Delete</font></a>
				</td>
			</tr>


<?php endwhile; ?>
		</table>
		</center>
	<?php	
}





$info = "SELECT * FROM product WHERE Category='Senior'";
$result = mysqli_query($conn, $info);

if (mysqli_num_rows($result)>0)
{
	?>
	<center>
	<table class="table table-bordered" style="text-align: center; width: 100%; font-size: 20px;">
			
			<thead class="thead-dark">
				<th COLSPAN=8 WIDTH=80% style="height: 25px;"><b><center>Senior (60 and above)</center></b></th>
			<tr style="word-break: 50px">
				<td  scope="col"><b>ID</b></td>
				<td  scope="col"><b>Name</b></td>
				<td  scope="col"><b>Age</b></td>
				<td  scope="col"><b>Price</b></td>
				<td  scope="col"><b>Category</b></td> 
				<td  scope="col"><b>Description</b></td>
				<td  scope="col"><b>Image</b></td>
				<td  scope="col"><b>Operation</b></td>
			</tr>
			</thead>
			<?php
	while ($row=mysqli_fetch_assoc($result)):?> 
		
			<tr>
				<th scope="row"><?php echo $row['ID'];?></th>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Product_Name'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Age'];?></td>
				<td style="word-break: break-word; max-width: 0;">₱<?php echo $row['Price'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Category'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Product_Description'];?></td>
				<td style="word-break: break-word; max-width: 0;"><a style="border: none;" href="images/<?php echo $row['Product_Image'];	 ?>"><?php echo "<img src='images/".$row['Product_Image']."'>" ?></a></td>
				<td>
					
					<a href="update.php? update=<?php echo $row['ID']; ?>" id="update" class="btn btn-primary"><font size="3">Update</font></a>
					<a href="delete.php? delete=<?php echo $row['ID']; ?>" id="delete" class="btn btn-danger"><font size="3">Delete</font></a>
				</td>
			</tr>


<?php endwhile; ?>
		</table>
		</center>
	<?php	
}




$info = "SELECT * FROM product WHERE Category='new born-17 y/r old'";
$result = mysqli_query($conn, $info);

if (mysqli_num_rows($result)==0)
{
		echo "<center><b><h1> No Data For new born-17 y/r old </h1></b></center>";
}

$info = "SELECT * FROM product WHERE Category='18-29 y/r old'";
$result = mysqli_query($conn, $info);

if (mysqli_num_rows($result)==0)
{
		echo "<center><b><h1> No Data For 18-29 y/r old</h1></b></center>";
}

$info = "SELECT * FROM product WHERE Category='30-59 y/r old'";
$result = mysqli_query($conn, $info);

if (mysqli_num_rows($result)==0)
{
		echo "<center><b><h1>  No Data For 30-59 y/r old </h1></b></center>";
}

$info = "SELECT * FROM product WHERE Category='Senior'";
$result = mysqli_query($conn, $info);

if (mysqli_num_rows($result)==0)
{
		echo "<center><b><h1> No Data For Senior (60 and above) </h1></b></center>";
}
?>