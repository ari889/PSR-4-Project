<?php

	use App\Show\Show;

	require_once dirname(__FILE__).'/vendor/autoload.php';

	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
	}

	$show = new Show;

 ?>
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
		<a href="all-data.php" class="btn btn-info">All Data</a>
    <div class="card mt-3">
      <div class="card-body">
				<?php $user_data = $show -> singleUser($user_id);
						$user = $user_data -> fetch();
				 ?>
        <h3 class="text-center"><?php echo $user['name']; ?></h3>
        <table class="table">
          <tr>
            <td>Email:</td>
            <td><?php echo $user['email']; ?></td>
          </tr>
          <tr>
            <td>Cell:</td>
            <td><?php echo $user['cell']; ?></td>
          </tr>
          <tr>
            <td>Username:</td>
            <td><?php echo $user['uname']; ?></td>
          </tr>
        </table>
      </div>
			<div class="card-footer">
				<a href="#">Logout</a>
			</div>
    </div>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
