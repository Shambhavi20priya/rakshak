<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if (!isset($_SESSION['hospitalSession'])) {
    header("Location: ../index.php");
}
$usersession = $_SESSION['hospitalSession'];
$res = mysqli_query($con, "SELECT * FROM `hospital2` WHERE hospitalId='$usersession'");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<!-- update -->
<?php
if (isset($_POST['submit'])) {
    //variables
    $generalbed = $_POST['generalbed'];
    $privatebednonac = $_POST['privatebednonac'];
    $privatebedac = $_POST['privatebedac'];
    $icu = $_POST['icu'];
    $nicu = $_POST['nicu'];
    $ventilator = $_POST['ventilator'];

    $res = mysqli_query($con, "UPDATE hospital2 SET generalbed='$generalbed', privatebednonac='$privatebednonac',privatebedac='$privatebedac',icu='$icu',nicu='$nicu',ventilator='$ventilator' WHERE hospitalId='$usersession'");
    // $userRow=mysqli_fetch_array($res);
    header('Location: hospitalbed.php');
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
                            <a class="nav-link" aria-current="page" href="hospitaldashboard.php">
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
                            <a class="nav-link active" href="hospitalbed.php">
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
                    <h1 class="h2">Bed Status</h1>
                </div>
                <!-- Page Heading end-->
                <!-- Appointment list -->
                <h2 class="my-4">Manage Bed Status</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Edit Bed Status</button>

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
                                                <td>Total General Bed:</td>
                                                <td><?php echo $userRow['Tgeneralbed']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Available General Bed:</td>
                                                <td><input type="text" class="form-control" name="generalbed" value="<?php echo $userRow['generalbed']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total Private Bed (Non AC):</td>
                                                <td><?php echo $userRow['Tprivatebednonac']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Available Private Bed (Non AC):</td>
                                                <td><input type="text" class="form-control" name="privatebednonac" value="<?php echo $userRow['privatebednonac']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total Private Bed (AC):</td>
                                                <td><?php echo $userRow['Tprivatebedac']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Available Private Bed (AC):</td>
                                                <td><input type="text" class="form-control" name="privatebedac" value="<?php echo $userRow['privatebedac']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total ICU Bed:</td>
                                                <td><?php echo $userRow['Ticu']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Available ICU Bed:</td>
                                                <td><input type="text" class="form-control" name="icu" value="<?php echo $userRow['icu']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total NICU Bed:</td>
                                                <td><?php echo $userRow['Tnicu']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Available NICU Bed:</td>
                                                <td><input type="text" class="form-control" name="nicu" value="<?php echo $userRow['nicu']; ?>" /></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Total ventilators:</td>
                                                <td><?php echo $userRow['Tventilator']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Available ventilators:</td>
                                                <td><input type="text" class="form-control" name="ventilator" value="<?php echo $userRow['ventilator']; ?>" /></td>
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
						<!-- Table --><h4 class="my-4">Bed Availability details :</h2>
						<table class="table table-hover table-bordered">
							<tbody>
								<tr>
									<td>Total general bed</td>
									<td><?php echo $userRow['Tgeneralbed']; ?></td>
								</tr>
								<tr>
									<td>Available general bed</td>
									<td><?php echo $userRow['generalbed']; ?></td>
								</tr>
								<tr>
									<td>Total Private Bed (Non-AC)</td>
									<td><?php echo $userRow['Tprivatebednonac']; ?></td>
								</tr>
								<tr>
									<td>Available Private Bed (Non-AC)</td>
									<td><?php echo $userRow['privatebednonac']; ?></td>
								</tr>
								<tr>
									<td>Total Private Bed (AC)</td>
									<td><?php echo $userRow['Tprivatebedac']; ?></td>
								</tr>
								<tr>
									<td>Available Private Bed (AC)</td>
									<td><?php echo $userRow['privatebedac']; ?></td>
								</tr>
								<tr>
									<td>Total ICU Bed </td>
									<td><?php echo $userRow['Ticu']; ?></td>
								</tr>
								<tr>
									<td>Available ICU Bed </td>
									<td><?php echo $userRow['icu']; ?></td>
								</tr>
								<tr>
									<td>Total NICU Bed </td>
									<td><?php echo $userRow['Tnicu']; ?></td>
								</tr>
								<tr>
									<td>Available NICU Bed </td>
									<td><?php echo $userRow['nicu']; ?></td>
								</tr>
								<tr>
									<td>Total ventilators </td>
									<td><?php echo $userRow['Tventilator']; ?></td>
								</tr>
								<tr>
									<td>Available ventilators </td>
									<td><?php echo $userRow['ventilator']; ?></td>
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