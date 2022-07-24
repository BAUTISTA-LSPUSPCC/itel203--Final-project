<?php session_start();
error_reporting(0); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Lost And Found</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In - Admin</title>
</head>
<body>
	<center>
<h1 style="font-family: Times New Roman ;"><font color="blue">Log-In</font></h1>
<form action="Login.php" method="POST" style="border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-radius: 10px; width: 430px; height: 230px;">
	<input type="text" name="emnum" required="required" placeholder="Cellphone Number"  style="margin-top: 15px; width: 384px; height: 23px;font-size: 20px;"><br>
	<input type="password" name="pass" required="required" placeholder="Password" style="margin-top: 15px; width: 384px; height: 23px;font-size: 20px;"><br>
	<button type="submit" name="submit" style="margin-top: 15px;width: 160px;height: 30px; font-size: 20px; background-color: limegreen; border-radius: 5px;border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;"><b>Log In</b></button><br><br>
	<a href="Signup.php" style="text-decoration:none ; font-size: 20px">Create an account?</a><br>
  <a href="Forgot.php" style="text-decoration:none ; font-size: 20px">Forgot Password! </a><br>
  <a href="changecp.php" style="text-decoration:none ; font-size: 20px">Change CellPhone Number </a>
</form>
</center>
</body>
</html>

<?php  
include('includes/script.php');
//database

	$servername = "localhost";
	$username = "root";
	$passwordc = "";
	$dbname = "customer";



	// Create connection
	$conn = new mysqli($servername, $username, $passwordc, $dbname);
	// Check connection
	if (mysqli_connect_error())
	{
 	   die('Connect Error('. mysqli_connect_errno().')'
      	  .mysqli_connect_error());
	}


 if (isset($_POST['submit'])) {
            $user = $_POST['emnum'];
            $pass = $_POST['pass'];
            $_SESSION['emnum'] = 'admin';
              if($user == 'admin'){
                if($pass == 'admin'){
                  echo "<script>
                          swal({ 
                          title: 'Welcome Admin',
                          icon: 'success'}).then(okay => {
                              if (okay) {
                                  window.location.href = 'admin.php';
                              }
                          });
                        </script>";
                        exit();
                }
              }

 if (isset($_POST['submit'])) {
 	 $Cpnumber = $_POST['emnum'];
     $pass = $_POST['pass'];
  $sql = "SELECT * FROM customertable WHERE Cpnumber = '".$Cpnumber."' AND password = '".$pass."' limit 1 ";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
      $_SESSION['emnum'] = $Cpnumber;
      $_SESSION['login_user'] = $_POST['emnum'];
          echo "<script>
                  swal({ 
                  title: 'Welcome $Cpnumber',
                  icon: 'success'}).then(okay => {
                      if (okay) {
                          window.location.href = 'index.php';
                  }
                  });
                </script>";
      exit();
    }
    else{
          echo "<script>
                  swal({ 
                  title: 'Name and Password Does Not Match',
                  text: 'Please Try Again or Register!',
                  icon: 'error'})
                </script>";
    }
 }
}

?>