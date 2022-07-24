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
	if (isset($_GET['update'])) {
		$id = $_GET['update'];
$q=mysqli_query($conn, "SELECT * FROM product where ID=$id;");
$row=mysqli_fetch_assoc($q);
}
 ?>
<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>update</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 </head>
 <body>
 <center>
<div style="border: 2px solid black; width: 50%; border-radius: 10%">
	<center>
		<h1>Update Product</h1>
	<form action="" method="POST" enctype="multipart/form-data">
	<label for="product_name"><b>Product Name</b></label><br>
	<input type="text" name="product_name" required style="border-radius: 5px; width: 400px; height: 35px; border-top: 2px solid #d1ccc9; border-bottom: 2px solid #d1ccc9; border-left: 2px solid #d1ccc9; border-right: 2px solid #d1ccc9; text-align:center;" value="<?php echo $row['Product_Name']; ?>"><br><br>
	<label for="price"><b>Price</b></label><br>
	<input type="number" name="price" required style="border-radius: 5px; width: 400px; height: 35px; border-top: 2px solid #d1ccc9; border-bottom: 2px solid #d1ccc9; border-left: 2px solid #d1ccc9; border-right: 2px solid #d1ccc9; text-align:center;" value="<?php echo $row['Price']; ?>"><br><br>
	<label for="category"><b>Category</b></label><br>
	<select name="category" id="category" required style="border-radius: 5px; width: 400px; height: 35px; border-top: 2px solid #d1ccc9; border-bottom: 2px solid #d1ccc9; border-left: 2px solid #d1ccc9; border-right: 2px solid #d1ccc9; text-align: center;">
		<option selected hidden value="<?php echo $row['Category']; ?>"><?php echo $row['Category']; ?></option>
  	<option value="Breakfast">Breakfast</option>
  	<option value="Lunch">Lunch</option>
  	<option value="Extra">Extra</option>
  	<option value="Beverage">Beverage</option>
  	<option value="Customized Beverage">Customized Bevergae</option>
	</select><br><br>
	<label for="description"><b>Product Description</b></label><br>
	<textarea type="text" name="description" required style="border-radius: 5px; width: 400px; height: 35px; border-top: 2px solid #d1ccc9; border-bottom: 2px solid #d1ccc9; border-left: 2px solid #d1ccc9; border-right: 2px solid #d1ccc9" ><?php echo $row['Product_Description']; ?></textarea><br><br>
	<label for="img"><b>Select image file (Product Image)<br></b>Select Image:</label>
	<input type="file" id="img" name="img" accept="image/png, image/jpeg" required>
	<b><p><font color="red">Note:</font>You need to select image again. This is for security purposes thank you.</p></b><br><br>
	<button type="submit" name="submit" class="btn btn-primary"><font size="4pt">Update</font></button>
	<a href="admin.php" class="btn btn-primary" style="margin-left: -160px;"><font size="4pt">Back</font></a>
	</form></center>

</div></center>
 </body>
 </html>
<?php 
include('includes/script.php');

	$conn = new mysqli('localhost','root','','customer') or die(mysqli_error($mysqli));

	$id = 0;


	if (isset($_GET['update'])) {
		$id = $_GET['update'];
		$msg = "";
		if (isset($_POST['submit'])) {
			$target = "images/" .basename($_FILES['img']['name']);

			$db = mysqli_connect("localhost", "root", "", "customer");
	$image = $_FILES['img']['name'];
	$productname = $_POST['product_name'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$description = $_POST['description'];

	$conn=("UPDATE product SET Product_Name='$productname', Price='$price', Category='$category', Product_Description='$description', Product_Image='$image' WHERE ID=$id") or die ($mysqli->error());
mysqli_query($db, $conn);


	if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
		$msg = "Image uploaded Successfully";
	}
	else{
		$msg = "There was a problem uploading image";
	}

		echo "<script scr='js/sweetalert-min.js'></script>";          
    		echo "<script type='text/javascript'>";           
    		echo "swal('Upadated Successfully','','success').then(okay => {
                              	if (okay)
                              	{
                                	  window.location.href = 'admin.php';
                              	}
                          	})";
    		echo "</script>";
	


			}
		
		}
	
	
			

  ?>