<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if (!isset($_SESSION['hospitalSession'])) {
    header("Location: ../index.php");
}
$usersession = $_SESSION['hospitalSession'];
$res = mysqli_query($con, "SELECT * FROM `hospital` WHERE Reg_no='$usersession'");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
$res2 = mysqli_query($con, "SELECT * FROM `hospital2` WHERE hospitalId='$usersession'");
$userRow2 = mysqli_fetch_array($res2, MYSQLI_ASSOC);


?>
<!-- update -->
<?php
if (isset($_POST['submit'])) {
    //variables
    $Reg_no = $_POST['Reg_no'];
    $password = $_POST['password'];
    $contact = $_POST['Mobile_no'];
    $email = $_POST['Email'];
    $address = $_POST['Address'];
    $res = mysqli_query($con, "UPDATE hospital SET Reg_no='$Reg_no', Password='$password', Mobile_no='$contact',Email='$email',Address='$address' WHERE Reg_no='$usersession'");
    // $userRow=mysqli_fetch_array($res);
    $_SESSION['hospitalSession'] = $Reg_no;
    header('Location: hospitaldashboard.php');
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
    <title>Welcome hospital</title>
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
                            <a class="nav-link active" aria-current="page" href="hospitaldashboard.php">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="doctor.php">
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
                    <h1 class="h2">Dashboard</h1>
                </div>
                <!-- Page Heading end-->
                <!-- Appointment list -->
                <h2 class="my-4">Manage hospital Credentials</h2>
                <div class="row my-4">
                    <div class="col-md-4 my-2">
                        <div class="card text-center" style="width: 14rem; height:25rem;">
                            <img src="assets/img/1.jpg" class="card-img-top" style="height: 225px; width: 220px; " alt="image for this category">
                            <div class="card-body">
                                <h5 class="card-title">Hospital administrator</h5>
                                <p class="card-text"><?php echo $userRow['Hospital_Name'] ?></p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Change Credentials</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Manage Credentials</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- form start -->
                                <form action="<?php $_PHP_SELF ?>" method="post">
                                    <table class="table table-hover table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Login Id:</td>
                                                <td><input type="text" class="form-control" name="Reg_no" value="<?php echo $usersession; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td>Password</td>
                                                <td><input type="text" class="form-control" name="password" value="<?php echo $userRow['Password']; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td>Hospital Name:</td>
                                                <td><?php echo $userRow['Hospital_Name'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Contact No.</td>
                                                <td><input type="text" class="form-control" name="hospitalContact" value="<?php echo $userRow['Telephone_no']; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td><?php echo $userRow['Address'].' '.$userRow['Pincode']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Login Id:</td>
                                                <td><input type="text" class="form-control" name="hospitalEmail" value="<?php echo $userRow['Email']; ?>" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="submit" name="submit" class="btn btn-success my-2 ms-2" value="Update Info">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if ($userRow2['Tgeneralbed'] == 0 && $userRow2['Tprivatebednonac'] == 0 && $userRow2['Tprivatebedac'] == 0 && $userRow2['Ticu'] == 0 && $userRow2['Tnicu'] == 0 && $userRow2['Tventilator'] == 0)
                    echo '<div class="alert alert-danger " role="alert">
						<div>
							Please update Total Bed strength Status to complete your profile. <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myModal2">Update Status</button>
						</div>
					</div>';
                else
                {

                    echo '<div class="alert alert-danger " role="alert">
                    <div>
                    Click here to update total Bed strength Status. <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myModal3">Update Status</button>
                    </div>
					</div>';
                }
                ?>

                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Bed Strength</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- form start -->
                                <form action="hospitalbedinit.php" method="post">
                                    <table class="table table-hover table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Total General Bed:</td>
                                                <td><input type="text" class="form-control" name="Tgeneralbed" value="<?php echo $userRow2['Tgeneralbed']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total Private Bed (Non AC):</td>
                                                <td><input type="text" class="form-control" name="Tprivatebednonac" value="<?php echo $userRow2['Tprivatebednonac']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total Private Bed (AC):</td>
                                                <td><input type="text" class="form-control" name="Tprivatebedac" value="<?php echo $userRow2['Tprivatebedac']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total ICU Bed:</td>
                                                <td><input type="text" class="form-control" name="Ticu" value="<?php echo $userRow2['Ticu']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total NICU Bed:</td>
                                                <td><input type="text" class="form-control" name="Tnicu" value="<?php echo $userRow2['Tnicu']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total ventilators:</td>
                                                <td><input type="text" class="form-control" name="Tventilator" value="<?php echo $userRow2['Tventilator']; ?>" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="submit" name="submit" class="btn btn-success my-2 ms-2" value="Update Status">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Update Total Bed Strength</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- form start -->
                                <form action="hospitalbedafterinit.php" method="post">
                                    <table class="table table-hover table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Total General Bed:</td>
                                                <td><input type="text" class="form-control" name="Tgeneralbed" value="<?php echo $userRow2['Tgeneralbed']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total Private Bed (Non AC):</td>
                                                <td><input type="text" class="form-control" name="Tprivatebednonac" value="<?php echo $userRow2['Tprivatebednonac']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total Private Bed (AC):</td>
                                                <td><input type="text" class="form-control" name="Tprivatebedac" value="<?php echo $userRow2['Tprivatebedac']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total ICU Bed:</td>
                                                <td><input type="text" class="form-control" name="Ticu" value="<?php echo $userRow2['Ticu']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total NICU Bed:</td>
                                                <td><input type="text" class="form-control" name="Tnicu" value="<?php echo $userRow2['Tnicu']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total ventilators:</td>
                                                <td><input type="text" class="form-control" name="Tventilator" value="<?php echo $userRow2['Tventilator']; ?>" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="submit" name="submit" class="btn btn-success my-2 ms-2" value="Update Status">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Table -->
                    <h4 class="my-4">Hospital details :</h2>
                        <table class="table table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <td>Hospital Id</td>
                                    <td><?php echo $userRow['Reg_no']; ?></td>
                                </tr>
                                <tr>
                                    <td>Hospital Name</td>
                                    <td><?php echo $userRow['Hospital_Name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Hospital Address</td>
                                    <td><?php echo $userRow['Address']." ".$userRow['Town']; ?></td>
                                </tr>
                                <tr>
                                    <td>Hospital Contact No.</td>
                                    <td><?php echo $userRow['Mobile_No']; ?></td>
                                </tr>
                                <tr>
                                    <td>Hospital Email Id</td>
                                    <td><?php echo $userRow['Email']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                </div>

            </main>
        </div>

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