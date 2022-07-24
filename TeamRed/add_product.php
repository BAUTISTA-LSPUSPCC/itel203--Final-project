<?php

$msg = "";
if (isset($_POST['submit'])) {


	$target = "images/" .basename($_FILES['img']['name']);

	$db = mysqli_connect("localhost", "root", "", "customer");

	$image = $_FILES['img']['name'];
	$productname = $_POST['product_name'];
	$Age = $_POST['Age'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$description = $_POST['description'];

	$sql = "INSERT INTO product (Product_Name, Age, Price, Category, Product_Description, Product_Image) Values ('$productname','$Age','$price','$category','$description','$image')";
	mysqli_query($db, $sql);

	if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
		$msg = "Image uploaded Successfully";
	}
	else{
		$msg = "There was a problem uploading image";
	}

}

  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
	<center>
<div style="border: 2px solid black; width: 50%; border-radius: 10%; margin-top: 50px;">
	<center>
		<h1>Add New Missing Person</h1>
	<form action="" method="POST" enctype="multipart/form-data">
	<label for="product_name"><b>Name</b></label><br>
	<input type="text" name="product_name" required style="border-radius: 5px; width: 400px; height: 35px; border-top: 2px solid #d1ccc9; border-bottom: 2px solid #d1ccc9; border-left: 2px solid #d1ccc9; border-right: 2px solid #d1ccc9; text-align:center;"><br><br>

	<label for="product_name"><b>Age</b></label><br>
	<input type="number" name="Age" required style="border-radius: 5px; width: 400px; height: 35px; border-top: 2px solid #d1ccc9; border-bottom: 2px solid #d1ccc9; border-left: 2px solid #d1ccc9; border-right: 2px solid #d1ccc9; text-align:center;"><br><br>

	<label for="price"><b>Reward</b></label><br>
	<input type="number" name="price" required style="border-radius: 5px; width: 400px; height: 35px; border-top: 2px solid #d1ccc9; border-bottom: 2px solid #d1ccc9; border-left: 2px solid #d1ccc9; border-right: 2px solid #d1ccc9; text-align:center;"><br><br>
	<label for="category"><b>Category</b></label><br>
	<select name="category" id="category" required style="border-radius: 5px; width: 400px; height: 35px; border-top: 2px solid #d1ccc9; border-bottom: 2px solid #d1ccc9; border-left: 2px solid #d1ccc9; border-right: 2px solid #d1ccc9">
		<option value=""></option>
  	<option value="new born-17 y/r old">new born-17 y/r old</option>
  	<option value="18-29 y/r old">18-29 y/r old</option>
  	<option value="30-59 y/r old">30-59 y/r old</option>
  	<option value="Senior">Senior</option>
	</select><br><br>
	<label for="description"><b>Description</b></label><br>
	<textarea type="text" name="description" required style="border-radius: 5px; width: 400px; height: 45px; border-top: 2px solid #d1ccc9; border-bottom: 2px solid #d1ccc9; border-left: 2px solid #d1ccc9; border-right: 2px solid #d1ccc9"></textarea><br><br>
	<label for="img"><b>Select image file (Image of missing person)<br></b>Select Image:</label>
	<input type="file" id="img" name="img" accept="image/png, image/jpeg" required><br><br>
	<button type="submit" name="submit" class="btn btn-primary"><font size="4pt">Done</font></button>
	<a href="admin.php" class="btn btn-primary" style="margin-left: -150px;"><font size="4pt">Back</font></a>
	</form></center>

</div></center>
</body>
</html>
<?php 
include('includes/script.php');
if (isset($_POST['submit'])) {
	echo "<script>
                  swal({ 
                  title: 'New Record Successfully added',
                  icon: 'success'}).then(okay => {
                      if (okay) {
                          window.location.href = 'admin.php';
                  }
                  });
                </script>";
}

 ?>