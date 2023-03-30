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
<?php

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `doctorschedule` WHERE scheduleId = '$sno'";
    $result = mysqli_query($con, $sql);
  }

if (isset($_POST['submit'])) {
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time     = mysqli_real_escape_string($con, $_POST['starttime']);
    $did= $_SESSION['doctorSession'];
    $bookavail = "available";
    //INSERT
    $query = "INSERT INTO doctorschedule (doctorId, scheduleDate, startTime, bookAvail)
    VALUES ($did ,'$date', '$time', '$bookavail' ) ";
    $result = mysqli_query($con, $query);
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
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="doctordashboard.php">Welcome Dr.
            <?php echo $userRow['doctorFirstName']; ?> <?php echo $userRow['doctorLastName']; ?>
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
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
                            <a class="nav-link active" href="addschedule.php">
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

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-uppercase">
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
            <!-- navigation -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Schedule</h1>
                </div>
                <h2 class="my-4">Manage your schedule</h2>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add
                    Schedule</button>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Add schedule</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- form start -->
                                <form action="<?php $_PHP_SELF ?>" method="post">
                                    <table class="table table-hover table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Schedule Date:</td>
                                                <td><input type="date" class="form-control" name="date"
                                                        min=<?php echo date("Y-m-d",strtotime('+1 days'))?> /></td>
                                            </tr>
                                            <tr>
                                                <td>Time slot</td>
                                                <td>
                                                    <div class="radio">
                                                        <label><input type="radio" name="starttime" value="10 AM - 12 PM">10 AM
                                                            -12 PM</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label><input type="radio" name="starttime" value="2 PM - 4 PM">2 PM - 4
                                                            PM</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label><input type="radio" name="starttime" value="6 PM - 8 PM">6 PM -
                                                            8 PM</label>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="submit" name="submit" class="btn btn-success my-2 ms-2"
                                        value="Add Schedule">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br /><br />
                <div class="table-responsive">
                    <!-- Table -->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="filters">
                                <th>Schedule Id</th>
                                <th>Schedule Date</th>
                                <th>Time</th>
                                <th>Availability</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php
                        $result = mysqli_query($con, "SELECT * FROM doctorschedule WHERE doctorId=".$_SESSION['doctorSession']);
                        while ($doctorschedule = mysqli_fetch_array($result)) {
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<td>" . $doctorschedule['scheduleId'] . "</td>";
                            echo "<td>" . $doctorschedule['scheduleDate'] . "</td>";
                            echo "<td>" . $doctorschedule['startTime'] . "</td>";
                            echo "<td>" . $doctorschedule['bookAvail'] . "</td>";
                            echo "<form method='POST' action=deleteschedule.php>";
                            echo "<td class='text-center'><a href='addschedule.php?delete=" . $doctorschedule['scheduleId'] . "'id='d" . $doctorschedule['scheduleId'] . "' class='delete'><span  data-feather='trash' aria-hidden='true'></span></a></td>";
                        }
                        echo "</tr>";
                        echo "</tbody>";
                        ?>
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script> -->
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="dashboard.js"></script>
    </script>
</body>

</html>