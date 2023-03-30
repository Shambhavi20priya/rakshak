<?php
session_start();
// include_once '../connection/server.php';
include_once '../assets/conn/dbconnect.php';
if (!isset($_SESSION['doctorSession'])) {
	header("Location: ../index.php");
}
$res = mysqli_query($con, "SELECT * FROM doctor WHERE doctorId=" . $_SESSION['doctorSession']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!-- update -->
<?php
if (isset($_POST['submit'])) {
	//variables
	$doctorFirstName = $_POST['doctorFirstName'];
	$doctorLastName = $_POST['doctorLastName'];

	$doctorDOB = $_POST['doctorDOB'];
	$doctorGender = $_POST['doctorGender'];
	$doctorAddress = $_POST['doctorAddress'];
	$doctorPhone = $_POST['doctorPhone'];
	$doctorEmail = $_POST['doctorEmail'];
	$doctorId = $_POST['doctorId'];
	$department = $_POST['doctorDepartment'];
	$res = mysqli_query($con, "UPDATE doctor SET doctorFirstName='$doctorFirstName', doctorLastName='$doctorLastName', doctorDOB='$doctorDOB', doctorGender='$doctorGender', doctorDepartment='$department', doctorPhone=$doctorPhone, doctorEmail='$doctorEmail' WHERE doctorId=" . $_SESSION['doctorSession']);
	header('Location: doctorprofile.php');
}
?>
<?php
$male = "";
$female = "";
if ($userRow['doctorGender'] == 'male') {
	$male = "checked";
} elseif ($userRow['doctorGender'] == 'female') {
	$female = "checked";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.104.2">
	<title>Welcome Dr <?php echo $userRow['doctorFirstName']; ?> <?php echo $userRow['doctorLastName']; ?></title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="dashboard.css" rel="stylesheet">
</head>

<body>
	<!-- navigation -->
	<header class="navbar navbar-dark sticky-top bg-danger flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="doctordashboard.php">Welcome Dr
			<?php echo $userRow['doctorFirstName']; ?> <?php echo $userRow['doctorLastName']; ?>
		</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</header>
	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="position-sticky pt-3 sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="doctordashboard.php">
								<span data-feather="home" class="align-text-bottom"></span>
								Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="addschedule.php">
								<span data-feather="list" class="align-text-bottom"></span>
								Doctor Schedule
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="patientlist.php">
								<span data-feather="users" class="align-text-bottom"></span>
								Patient List
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="question.php">
								<span data-feather="clipboard" class="align-text-bottom"></span>
								Problems
							</a>
						</li>
					</ul>

					<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-uppercase">
						<span>More options</span>
						<a class="link-secondary" href="#" aria-label="Add a new report">
							<span data-feather="plus-circle" class="align-text-bottom"></span>
						</a>
					</h6>
					<ul class="nav flex-column mb-2">
						<li class="nav-item">
							<a class="nav-link active" href="doctorprofile.php">
								<span data-feather="user" class="align-text-bottom"></span>
								Profile
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php?logout">
								<span data-feather="log-out"></span>
								Log Out
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- navigation -->
			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Profile</h1>
				</div>
				<h2 class="my-4">Doctor Profile</h2>
				<div class="container my-4">
					<div class="row my-4">
						<div class="col-md-4 my-2">
							<div class="card text-center" style="width: 14rem; height:23rem;">
								<img src="assets/img/1.jpg" class="card-img-top" style="height: 225px; width: 220px; " alt="image for this category">
								<div class="card-body">
									<h5 class="card-title">Doctor</h5>
									<p class="card-text"><?php echo $userRow['doctorFirstName']; ?> <?php echo $userRow['doctorLastName']; ?></p>
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Update Profile</button>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel">Update profile</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<!-- form start -->
									<form action="<?php $_PHP_SELF ?>" method="post">
										<table class="table table-hover table-bordered">
											<tbody>
												<tr>
													<td>Id Number:</td>
													<td><?php echo $userRow['doctorId']; ?></td>
												</tr>
												<tr>
													<td>First Name:</td>
													<td><input type="text" class="form-control" name="doctorFirstName" value="<?php echo $userRow['doctorFirstName']; ?>" /></td>
												</tr>
												<tr>
													<td>Last Name</td>
													<td><input type="text" class="form-control" name="doctorLastName" value="<?php echo $userRow['doctorLastName']; ?>" /></td>
												</tr>
												<tr>
													<td>DOB</td>
													<td>
														<input class="form-control" type="date" id="doctorDOB" name="doctorDOB" placeholder="MM/DD/YYYY" type="text" value="<?php echo $userRow['doctorDOB']; ?>" />
													</td>
												</tr>
												<tr>
													<td>Gender</td>
													<td>
														<div class="radio">
															<label><input type="radio" name="doctorGender" value="male" <?php echo $male; ?>>Male</label>
														</div>
														<div class="radio">
															<label><input type="radio" name="doctorGender" value="female" <?php echo $female; ?>>Female</label>
														</div>
													</td>
												</tr>
												<tr>
													<td>Phone number</td>
													<td><input type="text" class="form-control" name="doctorPhone" value="<?php echo $userRow['doctorPhone']; ?>" /></td>
												</tr>
												<tr>
													<td>Email</td>
													<td><input type="text" class="form-control" name="doctorEmail" value="<?php echo $userRow['doctorEmail']; ?>" /></td>
												</tr>
												<tr>
													<td>department</td>
													<td><?php echo $userRow['doctorDepartment']; ?></td>
												</tr>
											</tbody>
										</table>
										<input type="submit" name="submit" class="btn btn-success my-2 ms-2" value="Update Info">
									</form>
								</div>
							</div>
						</div>
					</div>
					<br /><br />
					<div class="table-responsive">
						<!-- Table -->
						<table class="table table-hover table-bordered">
							<tbody>
								<tr>
									<td>Date of Birth</td>
									<td><?php echo $userRow['doctorDOB']; ?></td>
								</tr>
								<tr>
									<td>Gender</td>
									<td><?php echo $userRow['doctorGender']; ?></td>
								</tr>
								<tr>
									<td>Department</td>
									<td><?php echo $userRow['doctorDepartment']; ?>
									</td>
								</tr>
								<tr>
									<td>Phone</td>
									<td><?php echo $userRow['doctorPhone']; ?>
									</td>
								</tr>
								<tr>
									<td>Email</td>
									<td><?php echo $userRow['doctorEmail']; ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</main>
		</div>
		<div class="container-fluid fixed-bottom bg-dark text-light mb-0">
			<p class="text-center mb-0">
				copyright &copy; 2023 Rakshak | All rights reserved
			</p>
		</div>
		<!-- Bootstrap Core JavaScript -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
	</script> -->
		<script src="assets/js/feather.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="dashboard.js"></script>
		</script>
</body>

</html>