<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="image.css">
</head>
<body style="background-color: #ffc;">
	<center>
		<form action="admin.php" method="POST"><br>
			<button class="btn btn-primary"><font size="3">Back to Product List</font></button>

		</form><br>
	</center>

</body>
</html>
<?php 

$ProductName = filter_input(INPUT_POST, 'product_name');
$Price = filter_input(INPUT_POST, 'price');
$Category = filter_input(INPUT_POST, 'category');
$Description = filter_input(INPUT_POST, 'description');
$Img = filter_input(INPUT_POST, 'img');


$servername="localhost";
$username="root";
$password="";
$db="customer";
$newser = new mysqli($servername, $username, $password, $db);

$conn=mysqli_connect($servername, $username, $password, $db);

	if (!$conn) 
	{
		die("Connection Failed". myqli_connect_error());
	}
if (isset($_POST['submits'])) {
	$Sr = filter_input(INPUT_POST, 'Search');
	

$servername="localhost";
$username="root";
$password="";
$db="customer";

$conn=mysqli_connect($servername, $username, $password, $db);

	if (!$conn) 
	{
		die("Connection Failed". myqli_connect_error());
	}
$search = "SELECT * FROM product WHERE Product_Name like '%$Sr%'";
$Sresult = $newser->query($search);
if ($Sresult->num_rows > 0) {
	
	
		?>
	<center>
	<table class="table table-bordered" style="text-align: center; width: 100%; font-size: 20px;">
			
			<thead class="thead-dark">
				<th COLSPAN=7 WIDTH=80% style="height: 25px;"><b><center>Result</center></b></th>
			<tr style="word-break: 50px">
				<td  scope="col"><b>ID</b></td>
				<td  scope="col"><b>Product Name</b></td>
				<td  scope="col"><b>Price</b></td>
				<td  scope="col"><b>Category</b></td>
				<td  scope="col"><b>Product_Description</b></td>
				<td  scope="col"><b>Product_Image</b></td>
				<td  scope="col"><b>Operration</b></td>
			</tr>
			</thead>
			<?php
	while ($row = $Sresult->fetch_assoc()):?> 
		
			<tr>
				<th scope="row"><?php echo $row['ID'];?></th>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Product_Name'];?></td>
				<td style="word-break: break-word; max-width: 0;">₱<?php echo $row['Price'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Category'];?></td>
				<td style="word-break: break-word; max-width: 0;"><?php echo $row['Product_Description'];?></td>
				<td style="word-break: break-word; max-width: 0;"><a href="images/<?php echo $row['Product_Image'];	 ?>"><?php echo "<img src='images/".$row['Product_Image']."'>" ?> </a></td>
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
else
{
	echo "<center><b><h1> No Result Found name: <i>$Sr</i> </h1></b></center>";
}
}


	 ?>