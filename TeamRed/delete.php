<?php include('includes/script.php'); ?>
<?php 
session_start();



	$conn = new mysqli('localhost','root','','customer') or die(mysqli_error($mysqli));

	$id = 0;

	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
		$conn->query("DELETE FROM product WHERE ID=$id") or die ($mysqli->error());
		

		header("location: admin.php");
	} 
?>