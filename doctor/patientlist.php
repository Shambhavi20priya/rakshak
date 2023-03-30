<?php
session_start();
include_once '../assets/conn/dbconnect.php';
// include_once 'connection/server.php';
if (!isset($_SESSION['doctorSession'])) {
    header("Location: ../index.php");
}
$usersession = $_SESSION['doctorSession'];
$res = mysqli_query($con, "SELECT * FROM doctor WHERE doctorId=" . $usersession);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
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
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <header class="navbar navbar-dark sticky-top bg-danger flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="doctordashboard.php">Welcome Dr.
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
                            <a class="nav-link active" href="patientlist.php">
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
                            <a class="nav-link" href="doctorprofile.php">
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
            <!-- navigation end -->
            <!-- <div class="container-fluid"> -->


            <!-- Page Heading -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Patient List</h1>
                </div>
                <!-- Page Heading end-->
                <!-- Appointment list -->
                <h2 class="my-4">Manage your patient</h2>
                <div class="table-responsive">
                    <!-- Table -->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="filters">
                                <th>Patient Id</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>DOB</th>
                                <th>Contact No.</th>
                                <th>Address</th>
                                <th>Email</th>
                            </tr>
                        </thead>

                        <?php
                        $sql = "SELECT patientIc,patientFirstName, patientLastName,patientGender,patientDOB,patientPhone,patientAddress,patientEmail FROM patient a JOIN appointment b On a.icPatient = b.patientIc JOIN doctorschedule c On b.scheduleId=c.scheduleId WHERE doctorId=$usersession GROUP BY patientIc,doctorId";
                        $res = mysqli_query($con, $sql);
                        if (!$res) {
                            echo("Error: %s\n". mysqli_error($con));
                            exit();
                        }
                        while ($appointment = mysqli_fetch_array($res)) {

                            echo "<tbody>
                                    <tr>
                                    <td>" . $appointment['patientIc'] . "</td>
                                    <td>" . $appointment['patientFirstName'] . " " .$appointment['patientLastName']. "</td>
                                    <td>" . $appointment['patientGender'] . "</td>
                                    <td>" . $appointment['patientDOB'] . "</td>
                                    <td>" . $appointment['patientPhone'] . "</td>
                                    <td>" . $appointment['patientAddress'] . "</td>
                                    <td>" . $appointment['patientEmail'] . "</td>
                            </tr>
                            </tbody>";
                        }
                        ?>
                    </table>
                </div>
            </main>
        </div>

    </div>
    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script> -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="dashboard.js"></script>
    </script>
</body>

</html>