<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if (!isset($_SESSION['patientSession'])) {
    header("Location: ../appointment.php");
}
$usersession = $_SESSION['patientSession'];
$res = mysqli_query($con, "SELECT * FROM patient WHERE icPatient=" . $usersession);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
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
    <title>Welcome <?php echo $userRow['patientEmail']; ?></title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="patient.php">Welcome
            <?php echo $userRow['patientFirstName'] . ' ' . $userRow['patientLastName']; ?>
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
                            <a class="nav-link " aria-current="page" href="patient.php">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>">
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
                            <a class="nav-link" href="profile.php?patientId=<?php echo $userRow['icPatient']; ?>">
                                <span data-feather="user" class="align-text-bottom"></span>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="subscription.php?patientId=<?php echo $userRow['icPatient']; ?>">
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
            <!-- Page Heading -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Subscription</h1>
                </div>
                <!-- Page Heading end-->
                <!-- Appointment list -->
                <h2 class="my-4"> <?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?>. View Your Subscription information here!</h2>
                
               <?php
            $res1 = mysqli_query($con, "SELECT *,30 - (DATEDIFF(CURDATE(),dos)+1) AS diff FROM subscription WHERE userid=" . $usersession);
            $numrows = mysqli_num_rows($res1);
            if ($numrows == 1){
                $userRow1 = mysqli_fetch_array($res1, MYSQLI_ASSOC);
                if($userRow1['planid'] == 1){
                    $plan = "Basic";
                }
                else if($userRow1['planid'] == 2){
                    $plan = "Individual";
                }
                else if($userRow1['planid'] == 3){
                    $plan = "Family";
                }
               
               echo '<h3>You are a subscribed member! </h3><br>

               <table class="table table-hover table-bordered">
  
               <tbody>
                 <tr>
                   <td>Subscription Plan</td>
                   <td>' .$plan.'
                   </td>
                 </tr>
                 <tr>
                   <td>Free Appointments allowed </td>
                   <td>'. $userRow1['freeapt'].'</td>
                 </tr>
                 
                 <tr>
                 <td>Questions allowed </td>
                 <td>'. $userRow1['ques'].'</td>
                 <tr>
                 <td>Days Left </td>
                 <td>'. $userRow1['diff'].'</td>
                 
               </tr>
                 
               </tbody>
             </table>';
            } else {
               echo '<h3>You are not a subscribed member! <a href="/rakshak/subscription.php" class="btn btn-outline-primary me-4">Subscribe Now</a></h3>';
            }
          
 
            

            

               ?>

            </main>
        </div>
    </div>
    <div class="container-fluid fixed-bottom bg-dark text-light mb-0">
        <p class="text-center mb-0">
            copyright &copy; 2023 Rakshak | All rights reserved
        </p>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"> -->
    <!-- </script> -->
    <script src="assets/js/feather.min.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>