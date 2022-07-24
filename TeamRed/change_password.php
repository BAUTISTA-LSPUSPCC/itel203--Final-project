<?php include 'change_password_process.php';
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="IndexStyle.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<div class="wrapper">
		
		<form action="" method="POST">
			<div class="text-center mt-4 name" style="margin-left: 35px;"> Change Password </div>
				<label for="inputPassword" >New Password</label>
					<div class="form-field d-flex align-items-center"> 
						<span class="far fa-user"></span> 
					<input type="text" name="new_password" id="inputPassword" placeholder="Enter New Password" required="required" autocomplete="off"> 
				</div>
				 <button class="btn mt-3" type="submit" name="change" style="font-size: 20px;margin-top: 5%; margin-bottom: 5%;">Change</button>


				</div>
				

			</div>
			

			

		</form>

	</div>
</body>
</html>