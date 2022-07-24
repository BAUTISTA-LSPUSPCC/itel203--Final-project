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
body {
	font-family: arial;
  background-color: red;
}

#wrapper{
	width: 1220px;
	margin-right: auto;
	margin-left: auto;
  margin-top: 10px;
	border: thin solid;
	background-color: white;
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
            <a href="Profile.php"><span class="glyphicon  glyphicon glyphicon-user"> Your profile</span></a>
          <?php
          }else{
          ?>
    <a href="Login.php">Log in</a><?php } ?>
    <a href="index.php">Home</a>
    <h1><center>Processes</center></h1>
    <a href="List.php">List of Missing Persons</a>
    <h1><center>Other</center></h1>
    <a href="Feedback.php">Feedback</a>
    <a href="https://www.messenger.com/t/5374924139228433">Message Us</a>
    <?php
          if ($_SESSION['login_user']) 
          {?>
            <a href="logout.php"><span class="glyphicon glyphicon-log-out"> LogOut</span></a>
          <?php
          }
          ?>
  </div>
</div>
<div>
  <h1 style="margin-left: auto; margin-right: auto;margin-top: auto;"><center><b>The Lost and Found System</b></center></h1>
<h2 style="margin-left: auto; margin-right: auto; margin-top: 15px;"><center><b>Municipality Of San Pablo City - MISSING REPORT<font color="red"> !!!</font></b></center></h2>
</div><br>

<div style="border: 5px solid black;">
<p><h1><center><b>Many people are now Missing<font color="red">!</font></b></center></h1>
<center><img src = "MISSING.jpg" width = 1000 height = 700></center>
<h1><center><b>If there is someone is <font color="red">MISSING</font> report it immediately<font color="red">!!</font></b></center></h1></p></div>

</body>
</html>