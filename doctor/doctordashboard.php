<?php
session_start();
include_once '../assets/conn/dbconnect.php';
$delete = false;
if (!isset($_SESSION['doctorSession'])) {
    header("Location: ../index.php");
}
$usersession = $_SESSION['doctorSession'];
$res = mysqli_query($con, "SELECT * FROM doctor WHERE doctorId=" . $usersession);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `appointment` WHERE appId = '$sno'";
    $result = mysqli_query($con, $sql);
  }
  date_default_timezone_set("Asia/Calcutta");

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
                            <a class="nav-link active" aria-current="page" href="doctordashboard.php">
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
                                <th>Name</th>
                                <th>Contact No.</th>
                                <th>Symptom</th>
                                <th>Date</th>
                                <th>Time Slot</th>
                                <th>Status</th>
                                <th>Complete</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <?php
                        $sql = "SELECT a.*, b.*,c.* FROM patient a JOIN appointment b On a.icPatient = b.patientIc JOIN doctorschedule c On b.scheduleId=c.scheduleId WHERE doctorId=$usersession Order By appId ASC";
                        $res = mysqli_query($con, $sql);
                        if (!$res) {
                            printf("Error: %s\n", mysqli_error($con));
                            exit();
                        }
                        while ($appointment = mysqli_fetch_array($res)) {

                            if ($appointment['status'] == 'process') {
                                $status = "danger";
                                $icon = 'x-circle';
                                $checked = '';
                            } else {
                                $status = "success";
                                $icon = 'check-circle';
                                $checked = 'disabled';
                            }
                            echo "<tbody>
                                    <tr class='bg-" . $status . " bg-opacity-25'>
                                    <td>" . $appointment['appId'] . "</td>
                                    <td>" . $appointment['patientFirstName'] .' '.$appointment['patientLastName']. "</td>
                                    <td>" . $appointment['patientPhone'] . "</td>
                                    <td>" . $appointment['appSymptom'] . "</td>
                                    <td>" . $appointment['scheduleDate'] . "</td>
                                    <td>" . $appointment['startTime'] . "</td>
                                    <td><span  data-feather='" . $icon . "' aria-hidden='true'></span>" . ' ' . "" . $appointment['status'] . "</td>
                                    <form method='POST'>
                                    <td class='text-center'><input type='checkbox' name='enable' id='enable' value='" . $appointment['appId'] . "' onclick='chkit(" . $appointment['appId'] . ",this.checked);' " . $checked . "></td>
                                    <td class='text-center'><a href='doctordashboard.php?delete=".$appointment['appId']."'id='d".$appointment['appId']."' class='delete'><span  data-feather='trash' aria-hidden='true'></span></a></td>
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
    <script type="text/javascript">
        function chkit(uid, chk) {
            chk = (chk == true ? "1" : "0");
            window.location = `checkdb.php?userid=` + uid + `&chkYesNo=` + chk;
        }
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
        </script> -->
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="dashboard.js"></script>
    </script>
</body>

</html>