<?php


use App\Register\Register;
use App\Show\Show;

require_once dirname(__FILE__).'/vendor/autoload.php';

	$register = new Register;

	$show = new Show;

	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
	}


	if(isset($_POST['save'])){
		$name = $_POST['name'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];

		if(empty($name) || empty($uname) || empty($email) || empty($cell)){
			$mess = '<div class="alert alert-danger"><strong>Stop!</strong> Field must not be empty. <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
		}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$mess = '<div class="alert alert-danger"><strong>Stop!</strong> Invalid Email.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
		}else{
			$mess = $register -> updateUser($name, $uname, $email, $cell, $user_id);
			header("localhost::edit.php?user_id=".$user_id);
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
        <?php
            $all_user = $show->singleUser($user_id);

            $single_user = $all_user -> fetch();
        ?>
		<form method="POST" enctype="multipart/form-data">
			<?php if(isset($mess)){
				echo $mess;
			} ?>
		  <div class="form-group">
		    <label for="name">Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?php echo $single_user['name']; ?>">
		  </div>
		  <div class="form-group">
		    <label for="uname">Username</label>
		    <input name="uname" type="text" class="form-control" id="uname" value="<?php echo $single_user['uname']; ?>">
		  </div>
		   <div class="form-group">
		    <label for="email">Email</label>
		    <input name="email" type="text" class="form-control" id="email" value="<?php echo $single_user['email']; ?>">
		  </div>
          <div class="form-group">
           <label for="cell">Cell</label>
           <input name="cell" type="text" class="form-control" id="cell" value="<?php echo $single_user['cell']; ?>">
         </div>
        <div class="form-group">
            <label for="register-as">Register as</label>
            <select class="form-control" name="register-as" id="register-as" disabled>
                <option value="student" <?php if($single_user['register_as'] === 'student'){echo 'selected';} ?>>Student</option>
                <option value="teacher" <?php if($single_user['register_as'] === 'teacher'){echo 'selected';} ?>>Teacher</option>
                <option value="staff" <?php if($single_user['register_as'] === 'staff'){echo 'selected';} ?>>Staff</option>
            </select>
        </div>
		  <input type="submit" name="save" value="Save" class="btn btn-primary">
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
