<!-- update -->
<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if (!isset($_SESSION['hospitalSession'])) {
    header("Location: index.php");
}
$usersession = $_SESSION['hospitalSession'];
$res = mysqli_query($con, "SELECT * FROM `hospital2` WHERE hospitalId ='$usersession'");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<?php
if (isset($_POST['submit'])) {
    //variables
    $generalbed = $_POST['Tgeneralbed'];
    $privatebednonac = $_POST['Tprivatebednonac'];
    $privatebedac = $_POST['Tprivatebedac'];
    $icu = $_POST['Ticu'];
    $nicu = $_POST['Tnicu'];
    $ventilator = $_POST['Tventilator'];

    $res = mysqli_query($con, "UPDATE hospital2 SET Tgeneralbed='$generalbed',generalbed='$generalbed', Tprivatebednonac='$privatebednonac', privatebednonac='$privatebednonac',Tprivatebedac='$privatebedac',privatebedac='$privatebedac',Ticu='$icu',icu='$icu',Tnicu='$nicu',nicu='$nicu',Tventilator='$ventilator',ventilator='$ventilator' WHERE hospitalId ='$usersession'");
    // $userRow=mysqli_fetch_array($res);
    header('Location: hospitalbed.php');
}
?>