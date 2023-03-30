<?php
session_start();
include_once '../assets/conn/dbconnect.php';
$session = $_SESSION['patientSession'];
if (isset($_GET['scheduleDate']) && isset($_GET['appid'])) {
	$appdate = $_GET['scheduleDate'];
	$appid = $_GET['appid'];
}
$res = mysqli_query($con, "SELECT a.*, b.* FROM doctorschedule a INNER JOIN patient b
WHERE a.scheduleDate='$appdate' AND scheduleId=$appid AND b.icPatient=$session");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
date_default_timezone_set("Asia/Calcutta");

//INSERT
if (isset($_POST['appointment'])) {
	$patientIc = mysqli_real_escape_string($con, $userRow['icPatient']);
	$scheduleid = mysqli_real_escape_string($con, $appid);
	$symptom = mysqli_real_escape_string($con, $_POST['symptom']);
	$comment = mysqli_real_escape_string($con, $_POST['comment']);
	$res3 = mysqli_query($con, "SELECT scheduleId,COUNT(patientIc) as count FROM appointment GROUP BY scheduleId HAVING scheduleId='$scheduleid'");
	$userRow3 = mysqli_fetch_array($res3, MYSQLI_ASSOC);
	echo $userRow3['count'];
	if ($userRow3['count']==19) {
		$avail = "not available";
		$sql = "UPDATE doctorschedule SET bookAvail = '$avail' WHERE scheduleId = '$scheduleid'";
		$scheduleres = mysqli_query($con, $sql);
		if ($scheduleres) {
			$btn = "disable";
		}
	}
	
	
	$que = mysqli_query($con, "SELECT * FROM subscription WHERE userid='$session'");
	$que2 = mysqli_fetch_assoc($que);
	$fapt="No";
	if ($que2['aptleft']!=0) {
		$fapt="Yes";
	}
	$query = "INSERT INTO appointment (  patientIc , scheduleId , appSymptom , appComment ,freeapt ) VALUES ( '$patientIc', '$scheduleid', '$symptom', '$comment','$fapt') ";

//update table appointment schedule


$result = mysqli_query($con, $query);

// echo $result;
if ($result) {
		
	$query3=mysqli_query($con,"UPDATE subscription SET aptleft=aptleft- 1 WHERE userid='$session' AND aptleft<>0");
	 
	

?>

		<script type="text/javascript">
			alert('Appointment made successfully.');
		</script>
	<?php
		header("Location: patientapplist.php");
	} else {
		echo mysqli_error($con);
	?>
		<script type="text/javascript">
			alert('Appointment booking fail. Please try again.');
		</script>
<?php
		header("Location: patient/patient.php");
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.104.2">
	<title>Make Appoinment</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="dashboard.css" rel="stylesheet">
</head>

<body>
	<!-- Navigation -->
	<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="appointment.php">Welcome
		<?php echo $userRow['patientFirstName'].' ' .$userRow['patientLastName']; ?>
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
							<a class="nav-link" aria-current="page" href="../index.php">
								<span data-feather="home" class="align-text-bottom"></span>
								Home
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="patient.php">
								<span data-feather="file" class="align-text-bottom"></span>
								Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>">
								<span data-feather="list" class="align-text-bottom"></span>
								Appointment
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="bed.php">
								<span data-feather="inbox" class="align-text-bottom"></span>
								Bed Availability
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="question.php">
								<span data-feather="help-circle" class="align-text-bottom"></span>
								Questions Asked
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
							<a class="nav-link" href="profile.php">
								<span data-feather="user" class="align-text-bottom"></span>
								Profile
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="patientlogout.php?logout">
								<span data-feather="log-out"></span>
								Log Out
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- navigation end -->
			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Book Appointment</h1>
				</div>
				<h2 class="my-4">Dear <?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?>. Fill the form below!</h2>
				<div class="col-md-9 col-sm-9  user-wrapper">
					<div class="description">
						<div class="panel panel-default">
							<div class="panel-body">
								<form class="form" role="form" method="POST" accept-charset="UTF-8">
									<div class="panel panel-default">
										<h2 class="panel-heading">Patient Information</h2>
										<div class="panel-body h6">
											Patient Name: <?php echo $userRow['patientFirstName'] ?> <?php echo $userRow['patientLastName'] ?><br>
											Patient IC: <?php echo $userRow['icPatient'] ?><br>
											Contact Number: <?php echo $userRow['patientPhone'] ?><br>
											Address: <?php echo $userRow['patientAddress'] ?>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading h3">Appointment Information</div>
										<div class="panel-body h5">
											Date: <?php echo $userRow['scheduleDate'] ?><br>
											Time: <?php echo $userRow['startTime'] ?><br>
										</div>
									</div>

									<div class="form-group">
										<label for="recipient-name" class="control-label my-2">Symptom:</label>
										<input type="text" class="form-control" name="symptom" required>
									</div>
									<div class="form-group">
										<label for="message-text" class="control-label my-2">Comment:</label>
										<textarea class="form-control" name="comment" required></textarea>
									</div>
									<div class="form-group">
										<input type="submit" name="appointment" id="submit" class="btn btn-primary my-2" value="Make Appointment">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
	<div class="container-fluid fixed-bottom bg-dark text-light mb-0">
        <p class="text-center mb-0">
            copyright &copy; 2023 Rakshak | All rights reserved
        </p>
    </div>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script> -->
	<script src="assets/js/feather.min.js"></script>
	<script src="dashboard.js"></script>
</body>

</html>