<?php

	use App\Show\Show;

	require_once dirname(__FILE__).'/vendor/autoload.php';

	$show = new Show;

	if(isset($_GET['delete_id'])){
	    $delete_id = $_GET['delete_id'];

	    $show -> deleteUser($delete_id);
    }

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

	<div class="container mt-5">
		<div class="btn-group">
			<a href="profile.php" class="btn btn-primary">My account</a>
			<a href="registration.php" class="btn btn-primary">Add new</a>
		</div>
    <div class="card">
      <div class="card-header">
        <h3>All users</h3>
      </div>
      <div class="card-body">

				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item" role="presentation">
				    <a class="nav-link active" id="teacher-tab" data-toggle="tab" href="#teacher" role="tab" aria-controls="teacher" aria-selected="true">Teacher</a>
				  </li>
				  <li class="nav-item" role="presentation">
				    <a class="nav-link" id="student-tab" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="false">Student</a>
				  </li>
				  <li class="nav-item" role="presentation">
				    <a class="nav-link" id="staff-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="staff" aria-selected="false">Staff</a>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="teacher" role="tabpanel" aria-labelledby="home-tab">
						<h2 class="text-dark display-5 my-3">All teachers</h2>
						<table class="table table-hover">
		          <thead>
		            <tr>
		              <th scope="col">#</th>
		              <th scope="col">Name</th>
		              <th scope="col">Email</th>
		              <th scope="col">Cell</th>
		              <th scope="col">Username</th>
		              <th scope="col">action</th>
		            </tr>
		          </thead>
		          <tbody>
                    <?php
                        $all_teachers = $show -> allTeachers();
                        $i = 1;
                        while($teacher = $all_teachers -> fetch()):
                     ?>
		              <tr>
		                <th scope="row"><?php echo $i;$i++; ?></th>
		                <td><?php echo $teacher['name']; ?></td>
		                <td><?php echo $teacher['email']; ?></td>
		                <td><?php echo $teacher['cell']; ?></td>
		                <td><?php echo $teacher['uname']; ?></td>
		                <td><div class="btn-group">
		                	<a href="show.php?user_id=<?php echo $teacher['user_id']; ?>" class="btn btn-info">View</a>
		                	<a href="edit.php?user_id=<?php echo $teacher['user_id']; ?>" class="btn btn-warning">Edit</a>
		                	<a href="all-data.php?delete_id=<?php echo $teacher['user_id']; ?>" class="btn btn-danger">Delete</a>
		                </div></td>
		              </tr>
                        <?php endwhile; ?>
		          </tbody>
		        </table>
				  </div>
				  <div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="profile-tab">
						<h2 class="text-dark display-5 my-3">All students</h2>
						<table class="table table-hover">
							<thead>
		            <tr>
		              <th scope="col">#</th>
		              <th scope="col">Name</th>
		              <th scope="col">Email</th>
		              <th scope="col">Cell</th>
		              <th scope="col">Username</th>
		              <th scope="col">Action</th>
		            </tr>
		          </thead>
		          <tbody>
                    <?php
                        $all_students = $show -> allStudents();
                        $i = 1;
                        while($student = $all_students -> fetch()):
                     ?>
		              <tr>
		                <th scope="row"><?php echo $i;$i++; ?></th>
		                <td><?php echo $student['name']; ?></td>
		                <td><?php echo $student['email']; ?></td>
		                <td><?php echo $student['cell']; ?></td>
		                <td><?php echo $student['uname']; ?></td>
                          <td><div class="btn-group">
		                	<a href="show.php?user_id=<?php echo $student['user_id']; ?>" class="btn btn-info">View</a>
		                	<a href="edit.php?user_id=<?php echo $student['user_id']; ?>" class="btn btn-warning">Edit</a>
		                	<a href="all-data.php?delete_id=<?php echo $student['user_id']; ?>" class="btn btn-danger">Delete</a>
		                </div></td>
		              </tr>
                        <?php endwhile; ?>
		          </tbody>
		        </table>
				  </div>
				  <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="contact-tab">
						<h2 class="text-dark display-5 my-3">All staff</h2>
						<table class="table table-hover">
							<thead>
		            <tr>
		              <th scope="col">#</th>
		              <th scope="col">Name</th>
		              <th scope="col">Email</th>
		              <th scope="col">Cell</th>
		              <th scope="col">Username</th>
		              <th scope="col">Action</th>
		            </tr>
		          </thead>
		          <tbody>
                    <?php
                        $all_staff = $show -> allStaff();
                        $i = 1;
                        while($staff = $all_staff -> fetch()):
                     ?>
		              <tr>
		                <th scope="row"><?php echo $i;$i++; ?></th>
		                <td><?php echo $staff['name']; ?></td>
		                <td><?php echo $staff['email']; ?></td>
		                <td><?php echo $staff['cell']; ?></td>
		                <td><?php echo $staff['uname']; ?></td>
                          <td><div class="btn-group">
		                	<a href="show.php?user_id=<?php echo $staff['user_id']; ?>" class="btn btn-info">View</a>
		                	<a href="edit.php?user_id=<?php echo $staff['user_id']; ?>" class="btn btn-warning">Edit</a>
		                	<a href="all-data.php?delete_id=<?php echo $staff['user_id']; ?>" class="btn btn-danger">Delete</a>
		                </div></td>
		              </tr>
                        <?php endwhile; ?>
		          </tbody>
		        </table>
				  </div>
				</div>
      </div>
    </div>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
