<?php
session_start();
include_once '../assets/conn/dbconnect.php';
$session = $_SESSION['patientSession'];
$res = mysqli_query($con, "SELECT a.*, b.*,c.* FROM patient a
	JOIN appointment b
		On a.icPatient = b.patientIc
	JOIN doctorschedule c
		On b.scheduleId=c.scheduleId
	WHERE b.patientIc ='$session'");
$res2= mysqli_query($con, "SELECT * FROM patient WHERE icPatient=" . $session);
$userRow2 = mysqli_fetch_array($res2);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Appoinment List</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
</head>

</head>

<body>
    <!-- navigation -->
    <!-- Navigation -->
    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="patient.php">Welcome <?php echo $userRow2['patientFirstName'].' ' .$userRow2['patientLastName']; ?></a>
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
                            <a class="nav-link" href="profile.php?patientId=<?php echo $userRow2['icPatient']; ?>">
                                <span data-feather="user" class="align-text-bottom"></span>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="subscription.php?patientId=<?php echo $userRow2['icPatient']; ?>">
                                <span data-feather="dollar-sign" class="align-text-bottom"></span>
                                Subscription
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
            <!-- display appoinment start -->

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                <!-- Page Heading end-->
                <!-- Appointment list -->
                <h2 class="my-4">Appointment List</h2>
                <div class="table-responsive">
                    <!-- Table -->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="filters">
                                <th>Appointment Id</th>
                                <th>Patient Id</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Symptoms</th>
                                <th>Time Slot</th>
                                <th>Print</th>
                            </tr>
                        </thead>
                        <?php
                        $res = mysqli_query($con, "SELECT a.*, b.*,c.*
                        		FROM patient a
                        		JOIN appointment b
                        		On a.icPatient = b.patientIc
                        		JOIN doctorschedule c
                        		On b.scheduleId=c.scheduleId
                        		WHERE b.patientIc ='$session'");
                        while ($userRow = mysqli_fetch_array($res)) {
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<td>" . $userRow['appId'] . "</td>";
                            echo "<td>" . $userRow['patientIc'] . "</td>";
                            echo "<td>" . $userRow['patientFirstName'] .' '. $userRow['patientLastName']. "</td>";
                            echo "<td>" . $userRow['scheduleDate'] . "</td>";
                            echo "<td>" . $userRow['appSymptom'] . "</td>";
                            echo "<td>" . $userRow['startTime'] . "</td>";
                            echo "<td><a href='invoice.php?appid=" . $userRow['appId'] . "' target='_blank'><span data-feather='printer' aria-hidden='true'></span></a> </td>";
                            echo "</tr>";
                            echo "</tbody>";
                        }
                        ?>
                    </table>
                </div>
            </main>
        </div>
        <div class="container-fluid fixed-bottom bg-dark text-light mb-0">
    <p class="text-center mb-0">
        copyright &copy; 2023 Rakshak | All rights reserved
    </p>
    </div>
    <!-- display appoinment end -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script> -->
    <script src="assets/js/feather.min.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>