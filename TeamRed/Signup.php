<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign up</title>
</head>
<body>
	<center>
	<form action="db.php" method="POST" style="border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-radius: 50px; width: 450px; height: 600px; margin-top: 50px;">
	<h1>Create a new account</h1>
	<hr>
	<input type="text" name="firstname" required="required" placeholder="First name" style="margin-top: 15px; width: 180px; height: 20px;font-size: 20px;">&nbsp&nbsp&nbsp
	<input type="text" name="lastname" required="required" placeholder="Last Name" style="margin-top: 15px; width: 180px; height: 20px;font-size: 20px;"><br>
	<input type="text" name="password" required="required" placeholder="New Password"  style="margin-top: 15px; width: 384px; height: 20px;font-size: 20px;"><br>
	<input type="text" name="password2" required="required" placeholder="Re-Enter Password"  style="margin-top: 15px; width: 384px; height: 20px;font-size: 20px;"><br>
	<input type="email" name="email" required="required" placeholder="Email" style="margin-top: 15px; width: 384px; height: 20px;font-size: 20px;"><br>
	<input type="text" name="Cpnumber" required="required" placeholder="Cellphone Number(Enter 11 digit)" pattern="[0-9]{11}" style="margin-top: 15px; width: 384px; height: 20px;font-size: 20px;"><br><br>
	<label for="birthday" style="margin-left: -213px; font-size: 20px">Birthday:</label>
<input type="date" id="birthday" name="birthday" value="1962-01-01" min="1962-01-01" max="2009-12-31">
<p style="margin-left: -213px; color: red; margin-top: 3px;">note: only 1962-2009 only</p>
<hr>
	<label>Address:</label><br>
	<input type="text" name="brgy" required="required" placeholder="BRGY." style="margin-top: 15px; width: 180px; height: 20px;font-size: 20px;"><br>
	<input type="text" name="municipality" required="required" placeholder="Municipality" style="margin-top: 15px ;width: 180px; height: 20px;font-size: 20px;">&nbsp&nbsp&nbsp
	<input type="text" name="province" required="required" placeholder="Province" style="margin-top: 15px; width: 180px; height: 20px;font-size: 20px;"><br>
	<button type="submit" name="submit" style="margin-top: 15px;width: 160px;height: 30px; font-size: 20px; background-color: limegreen; border-radius: 5px;border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;"><b>Sign Up</b></button><br><br>
	<a href="Login.php" style="text-decoration:none ; font-size: 20px">Already have an account?</a>
</form>
</center>
</body>
</html>

<?php 
include('includes/script.php');
 ?>