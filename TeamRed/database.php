<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
</body>
</html>

<?php
include('includes/script.php');
$ProductName = filter_input(INPUT_POST, 'product_name');
$Age = filter_input(INPUT_POST, 'age');
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

$Product = "INSERT INTO product (Product_Name, Age, Price, Category, Product_Description, Product_Image) Values ('$ProductName','$Age', $Price','$Category','$Description','$Img')";
if (mysqli_query($conn, $Product))
 {
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
 else
 {
 	echo "Error".$Product."<br>". mysqli_error($conn);
 }
 

 mysqli_close($conn);
?>