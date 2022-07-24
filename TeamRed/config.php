<?php 

$server = "localhost";
$username = "root";
$password = "";
$database = "customer";

$conn = mysqli_connect($server, $username, $password, $database);
 // If Check Connection
if (mysqli_connect_error())
    {
       die('Connect Error('. mysqli_connect_errno().')'
          .mysqli_connect_error());
    }

?>