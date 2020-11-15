<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Form Validation</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="custom_signup">
		<a href="registration.php" class="btn btn-info">Register user</a>
		<h2 class="text-center">Sign IN</h2>
		<div class="message">
		</div>
		<form method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="exampleInputName1">Name</label>
		    <input name="name" type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
		  </div>
			 <div class="form-group">
				<label for="username">Password</label>
				<input name="username" type="password" class="form-control" id="username">
			</div>
		  <button name="submit" type="submit" class="btn btn-primary" value="Add">Submit</button>
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
