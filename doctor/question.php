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
$dept = $userRow['doctorDepartment'];
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
                            <a class="nav-link" href="patientlist.php">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Patient List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="question.php">
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
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Questions Asked</h1>
                </div>
                <h2 class="my-4">Dr. <?php echo $userRow['doctorFirstName']; ?>
                    <?php echo $userRow['doctorLastName']; ?></h2>
                <div class="col-md-12 col-sm-9  user-wrapper">
                    <div class="description">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="container my-4" id="ques">
                                    <h2 class="text-center my-4"> List of question for you </h2>
                                    <div class="row my-4">
                                        <!-- Fetch all the categories and use a loop to iterate through categories -->
                                        <?php
                                        $sql = "SELECT * FROM `threads` JOIN patient ON thread_user_id=icPatient WHERE departmentName='$dept'";
                                        $result = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['thread_id'];
                                            $cat = $row['thread_title'];
                                            $desc = $row['thread_desc'];
                                            echo '<div class="col-md-3 my-2">
                                                    <div class="card" style="width: 15rem; height:auto;">
                                                          <div class="card-body">
                                                            <h5 class="card-title"><strong>Symptom:</strong><br>' . $cat . '</h5>
                                                            <h6 class="card-title"><strong>Detailed Concern:</strong><br> ' . $desc . '</h6>
                                                            <h6 class="card-title"><strong>Asked By:</strong></h6>
                                                            <button class="btn btn-sm btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#questionModal2">' . $row['patientFirstName'] . ' ' . $row['patientLastName'] . '</button>
                                                            <p class="text-muted">Time: ' . $row['timestamp'] . '
                                                            <a href="questionlist.php?threadid=' . $id . '" class="btn btn-primary mt-4">View Replies</a>
                                                            <button class="btn btn-sm btn-success mt-4 ms-2" data-bs-toggle="modal" data-bs-target="#questionModal">Reply</button>
                                                          </div>
                                                    </div>
                                                  </div>';
                                        }
                                        ?>
                                        <div class="modal modal-signin" tabindex="-1" aria-labelledby="signupModalLabel" id="questionModal" aria-hidden="true">
                                            <div class="modal-dialog" style=" width: 600px; transition: bottom .75s ease-in-out;" role="document">
                                                <div class="modal-content rounded-4 shadow">
                                                    <div class="modal-header p-5 pb-4 border-bottom-0">
                                                        <h1 class="fw-bold mb-0 fs-2">Post your reply </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body p-5 pt-0">
                                                        <form action="/rakshak/thread.php?threadid=<?php echo $id ?>" method="post">
                                                            <div class="form-floating mb-3">

                                                                <textarea class="form-control rounded-3" name="comment" aria-label="With textarea" required></textarea>
                                                            </div>
                                                            <input type="hidden" name="sno" value="<?php echo $_SESSION["doctorSession"] ?>">
                                                            <div class="form-floating mb-3">
                                                                <!-- <input type="text" class="form-control rounded-3" id="doctorDepartment" name="doctorDepartment" placeholder="Department" aria-describedby="doctorDepartment" required> -->

                                                                <?php
                                                                $sql = "SELECT * FROM `departments`";
                                                                $result = mysqli_query($con, $sql);
                                                                echo '<select name="doctorDepartment" class="form-select" required>';
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $cat = $row['departmentName'];
                                                                    if ($cat==$dept) {
                                                                        echo '<option value="' . $cat . '"selected>' . $cat . '</option>';
                                                                        # code...
                                                                    }
                                                                    else
                                                                    echo '<option value="' . $cat . '">' . $cat . '</option>';
                                                                }
                                                                echo '</select>';
                                                                ?>
                                                                <label for="doctorDepartment">Refer to</label>
                                                            </div>

                                                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Post Reply</button>
                                                            <small class="text-muted">Thanks for you valuable time.</small>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script type="text/javascript">
        function chkit(uid, chk) {
            chk = (chk == true ? "1" : "0");
            window.location = `checkdb.php?userid=` + uid + `&chkYesNo=` + chk;
        }
    </script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="dashboard.js"></script>
    </script>
</body>

</html>