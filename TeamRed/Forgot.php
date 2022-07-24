<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="IndexStyle.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<form method="POST" action="Forgot_password_process.php">
   		<center> <div class="text-center mt-4 name"> PASSWORD RESET </div></center>

	<form action="Forgot_password_process.php" method="post" class="p-3 mt-3">
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="email" name="email" id="userName" placeholder="Enter Email Address That Used to Register" required="required" autocomplete="off"> 
        	
        </div>
        <button class="btn mt-3" type="submit" name="reset" style="font-size: 20px;margin-top: 5%; margin-bottom: 5%;">Reset</button>
        
    </form>
	</div>
</body>
</html>