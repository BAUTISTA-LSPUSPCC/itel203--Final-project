<?php 
 session_start(); 
$servername="localhost";
$username="root";
$password="";
$db="customer";

$conn=mysqli_connect($servername, $username, $password, $db);

    if (!$conn) 
    {
        die("Connection Failed". myqli_connect_error());
    }
error_reporting(0);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="product_image.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 	<style>
 		.wrapper{
 			width: 450px;
 			height: 550px;
 			background-color: lightblue;
 			margin-top: auto; 	
 			margin-left: auto;
      margin-right: auto;

 				}
body {
      font-family: arial;
      background-image: url('MISSING.jpg');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
}

#wrapper{
    width: 1220px;
    margin-right: auto;
    margin-left: auto;
    border: thin solid;
    background-color: #ffc;
    height: auto;
    
}
a{
    text-decoration: none;
    border: 2px solid black;
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
}

.dropdown-content a:hover {background-color: #ddd}

.show {display:block;}

    </style>
 </head>
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
 <body>
    <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn glyphicon glyphicon-menu-hamburger"></button>
  <div id="myDropdown" class="dropdown-content">
    <?php
          if ($_SESSION['login_user']) 
          {?>
            <a href="Profile.php"><span class="glyphicon glyphicon glyphicon-user"> Profile</span></a>
          <?php
          }else{
          ?>
    <a href="Login.php">Sign up/Log in</a><?php } ?>
    <a href="index.php">Home</a>
    <h1><center>Processes</center></h1>
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
 	<div class="container">
 	 		<div class="wrapper">
 			<?php  
 			$q=mysqli_query($conn, "SELECT * FROM customertable where Cpnumber='$_SESSION[login_user]' ;");
 			?>
 			<h2 style="text-align: center;">Basic Information</h2>
 			<hr>
 			<?php 
 			$row=mysqli_fetch_assoc($q);

 			 ?>
 			 <div  style="text-align: center;"><b>Welcome</b>
 			 <h4 style="font-size: 30px;">
 			 	<span class="glyphicon glyphicon-user"></span>
 			 	<?php echo $row['firstname'] ?>
 			 </h4>
 			</div>
 			<?php 
 			echo "<table class='table table-bordered'>";
 			echo "<tr>";
 			echo "<td>";
 			echo "<b> First Name: &nbsp </b>";
 			echo "</td>";

 			echo "<td>";
 			echo $row['firstname'];
 			echo "</td>";
 			echo "</tr>";

 			echo "<tr>";
 			echo "<td>";
 			echo "<b> Last Name: </b>";

 			echo "</td>";
 			echo "<td>";
 			echo $row['lastname'];
 			echo "</td>";
 			echo "</tr>";


 			echo "<tr>";
 			echo "<td>";
 			echo "<b> Email Add.: </b>";
 			echo "</td>";
 			echo "<td>";
 			echo $row['email'];
 			echo "</td>";
 			echo "</tr>";

 			echo "<tr>";
 			echo "<td>";
 			echo "<b> Cp Number: </b>";
 			echo "</td>";
 			echo "<td>";
 			echo $row['Cpnumber'];
 			echo "</td>";
 			echo "</tr>";

 			echo "<tr>";
 			echo "<td>";
 			echo "<b> Birthday: </b>";
 			echo "</td>";
 			echo "<td>";
 			echo $row['birthday'];
 			echo "</td>";
 			echo "</tr>";

 			echo "<tr>";
 			echo "<td>";
 			echo "<b> Barangay: </b>";
 			echo "</td>";
 			echo "<td>";
 			echo $row['brgy'];
 			echo "</td>";
 			echo "</tr>";

 			echo "<tr>";
 			echo "<td>";
 			echo "<b> Municipality: </b>";
 			echo "</td>";
 			echo "<td>";
 			echo $row['municipality'];
 			echo "</td>";
 			echo "</tr>";

 			echo "<tr>";
 			echo "<td>";
 			echo "<b> Province: </b>";
 			echo "</td>";
 			echo "<td>";
 			echo $row['province'];
 			echo "</td>";
 			echo "</tr>";
 			echo "</table>";
 			echo "<b>  &nbsp Complete Address: </b>";
 			echo "Brgy.", " " ,$row['brgy'], " ", $row['municipality'], " ", $row['province'] ;
 			 ?>
 			
 			 <form action="update1.php" method="post">
 			<button class="glyphicon glyphicon-edit" style="float: right; margin-top: 25px; margin-right: 30px; width: 70px; height: 30px;" name="submit1">Edit</button>
 		</form>
 		
 		</div>
 	</div>
 
 </body>
 </html>