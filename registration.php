<?php

	use App\Register\Register;

	require_once dirname(__FILE__).'/vendor/autoload.php';

	$register = new Register;


	if(isset($_POST['register'])){
		$name = $_POST['name'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];
		$register_as = $_POST['register-as'];

		if(empty($name) || empty($uname) || empty($email) || empty($cell) || empty($register_as)){
			$mess = '<div class="alert alert-danger"><strong>Stop!</strong> Field must not be empty. <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
		}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$mess = '<div class="alert alert-danger"><strong>Stop!</strong> Invalid Email.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
		}else{
			$mess = $register -> registerUser($name, $uname, $email, $cell, $register_as);
			header("localhost::all-data.php");
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PSR-4 Project</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="custom_signup">
		<div class="btn-group">
			<a href="index.php" class="btn btn-primary">Sign IN</a>
			<a href="all-data.php" class="btn btn-primary">All data</a>
		</div>
		<h2 class="text-center">Sign Up</h2>
		<div class="message">
		</div>
		<form method="POST" enctype="multipart/form-data">
			<?php if(isset($mess)){
				echo $mess;
			} ?>
		  <div class="form-group">
		    <label for="name">Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>">
		  </div>
		  <div class="form-group">
		    <label for="uname">Username</label>
		    <input name="uname" type="text" class="form-control" id="uname" value="<?php if(isset($_POST['uname'])){echo $_POST['uname'];} ?>">
		  </div>
		   <div class="form-group">
		    <label for="email">Email</label>
		    <input name="email" type="text" class="form-control" id="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
		  </div>
          <div class="form-group">
           <label for="cell">Cell</label>
           <input name="cell" type="text" class="form-control" id="cell" value="<?php if(isset($_POST['cell'])){echo $_POST['cell'];} ?>">
         </div>
        <div class="form-group">
            <label for="register-as">Register as</label>
            <select class="form-control" name="register-as" id="register-as">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
                <option value="staff">Staff</option>
            </select>
        </div>
		  <input type="submit" name="register" value="Add" class="btn btn-primary">
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
