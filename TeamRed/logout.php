<?php 
session_start();
error_reporting(0);
if (isset($_SESSION['login_user'])) 
{
	unset($_SESSION['login_user']);
}
 header("location:Index.php");
 ?>