<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if (!isset($_SESSION['hospitalSession'])) {
    header("Location: index.php");
}
$usersession = $_SESSION['hospitalSession'];
$res = mysqli_query($con, "SELECT * FROM `hospital` WHERE Reg_no='$usersession'");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<?php

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `doctor` WHERE doctorId = '$sno'";
    $results = mysqli_query($con, $sql);
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
    <title>Welcome Hospital</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>


    <!-- Navigation -->
    <header class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="hospitaldashboard.php">Welcome
            <?php echo $usersession; ?>
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
                            <a class="nav-link" aria-current="page" href="hospitaldashboard.php">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="doctor.php">
                                <span data-feather="user" class="align-text-bottom"></span>
                                Manage doctor
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="hospitalbed.php">
                                <span data-feather="inbox" class="align-text-bottom"></span>
                                Bed Status
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
                    <h1 class="h2">Manage Doctors</h1>
                </div>
                <!-- Page Heading end-->
                <!-- Appointment list -->
                <h2 class="my-4">Add / Delete Doctors</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add Doctor</button>
                <div class="modal modal-signin" tabindex="-1" aria-labelledby="signupModalLabel" id="myModal" aria-hidden="true">
                    <div class="modal-dialog" style=" width: 600px;transition: bottom .75s ease-in-out;" role="document">
                        <div class="modal-content rounded-4 shadow">
                            <div class="modal-header p-5 pb-4 border-bottom-0">
                                <h1 class="fw-bold mb-0 fs-2">Doctor Registration Form</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-5 pt-0">
                                <form action="handleadmindoctor.php" method="post">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control rounded-3" id="doctorId" name="doctorId" placeholder="doctorId/Registration Number" aria-describedby="doctorId" required>
                                        <label for="doctorId">doctorId / Registration Number</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control rounded-3" id="doctorFirstName" name="doctorFirstName" placeholder="First Name" aria-describedby="doctorFirstName" required>
                                        <label for="doctorFirstName">First Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control rounded-3" id="doctorLastName" name="doctorLastName" placeholder="Last Name" aria-describedby="doctorLastName" required>
                                        <label for="doctorLastName">Last Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <!-- <input type="text" class="form-control rounded-3" id="doctorDepartment" name="doctorDepartment" placeholder="Department" aria-describedby="doctorDepartment" required> -->
                                        
                                        <?php
                                            $sql = "SELECT * FROM `departments`";
                                            $result = mysqli_query($con, $sql);
                                            echo '<select name="doctorDepartment" class="form-select" required>';
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $cat = $row['departmentName'];
                                                echo '<option value="' . $cat . '">' . $cat . '</option>';
                                            }
                                            echo '</select>';
                                            ?>
                                            <label for="doctorDepartment">department</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control rounded-3" id="doctorDOB" name="doctorDOB" placeholder="Date of Birth" aria-describedby="DOB" required>
                                        <label for="doctorDOB">Date of Birth</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <h6 class="mb-2">Gender: </h6>
                                        <div class="form-check form-check-inline mb-3 me-4">
                                            <input class="form-check-input" type="radio" name="doctorGender" id="doctorGender" value="female" />
                                            <label class="form-check-label" for="doctorGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-3 me-4">
                                            <input class="form-check-input" type="radio" name="doctorGender" id="doctorGender" value="male" />
                                            <label class="form-check-label" for="doctorGender">Male</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="doctorGender" id="doctorGender" value="other" />
                                            <label class="form-check-label" for="doctorGender">Other</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control rounded-3" id="doctorPhone" name="doctorPhone" placeholder="name@example.com" aria-describedby="phone" required>
                                        <label for="doctorPhone">Phone No. </label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control rounded-3" id="doctorEmail" name="doctorEmail" placeholder="name@example.com" aria-describedby="doctorEmail" required>
                                        <label for="doctorEmail">Email address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Password">
                                        <label for="password">Password</label>
                                    </div>
                                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Sign up</button>
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
                                <th>doctor Id</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Phone No.</th>
                                <th>Email Id</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php
                        $result = mysqli_query($con, "SELECT * FROM doctor WHERE hid='$usersession'");
                        while ($doctor = mysqli_fetch_array($result)) {
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<td>" . $doctor['doctorId'] . "</td>";
                            echo "<td>Dr. " . $doctor['doctorFirstName'] . ' ' . $doctor['doctorLastName'] . "</td>";
                            echo "<td>" . $doctor['doctorDepartment'] . "</td>";
                            echo "<td>" . $doctor['doctorPhone'] . "</td>";
                            echo "<td>" . $doctor['doctorEmail'] . "</td>";
                            echo "<td class='text-center'><a href='admindoctor.php?delete=" . $doctor['doctorId'] . "'id='d" . $doctor['doctorId'] . "' class='delete'><span  data-feather='trash' aria-hidden='true'></span></a></td>";
                        }
                        echo "</tr>";
                        echo "</tbody>";
                        ?>
                </div>
            </main>
        </div>

    </div>
    <!-- Bootstrap Core JavaScript -->

    
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>