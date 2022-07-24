<?php session_start();
error_reporting(0); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Lost And Found</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <style>

a{
  text-decoration: none;
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
  border: 2px solid black;
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
   <?php
          if ($_SESSION['login_user']) 
          {?>
            <a href="Profile.php"><span class="glyphicon  glyphicon glyphicon-user">Profile</span></a>
          <?php
          }else{
          ?>
    <a href="Login.php">Sign up/Log in - Admin</a><?php } ?>
    <a href="index.php">Home</a>
    <h1><center>Options</center></h1>
    <a href="Report.php">Report a Missing Person</a>
    <a href="List.php">List of Missing Persons</a>
    
    <h1><center>Other</center></h1>
    <a href="Feedback.php">Feedback</a>
    <a href="https://www.messenger.com/t/5374924139228433">Message Us</a>
    <?php
          if ($_SESSION['login_user']) 
          {?>
            <a href="logout.php"><span class="glyphicon glyphicon-log-out">Log Out</span></a>
          <?php
          }
          ?>
  </div>
</div>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In - Guest</title>
</head>
<body>
	<center>
<h1 style="font-family: Times New Roman ;"><font color="blue">HELLO GUEST! Please do Log In / Sign Up Thankyou!</font></h1>
<form action="Login.php" method="POST" style="border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-radius: 10px; width: 430px; height: 230px;">
  <input type="text" name="emnum" required="required" placeholder="Cellphone Number"  style="margin-top: 15px; width: 384px; height: 20px;font-size: 20px;"><br>
  <input type="password" name="pass" required="required" placeholder="Password" style="margin-top: 15px; width: 384px; height: 20px;font-size: 20px;"><br>
  <button type="submit" name="submit" style="margin-top: 15px;width: 160px;height: 30px; font-size: 20px; background-color: #5cd431; border-radius: 5px;border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;"><b>Log In</b></button><br><br>
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