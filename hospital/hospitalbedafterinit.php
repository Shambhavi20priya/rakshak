<!-- update -->
<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if (!isset($_SESSION['hospitalSession'])) {
    header("Location: index.php");
}
$usersession = $_SESSION['hospitalSession'];
$res = mysqli_query($con, "SELECT * FROM `hospital2` WHERE hospitalId='$usersession'");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
$g=$userRow['Tgeneralbed'];
$h=$userRow['Tprivatebednonac'];
$i=$userRow['Tprivatebedac'];
$j=$userRow['Ticu'];
$k=$userRow['Tnicu'];
$l=$userRow['Tventilator'];

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

    $res = mysqli_query($con, "UPDATE hospital2 SET Tgeneralbed='$generalbed',generalbed=generalbed+($generalbed-$g), Tprivatebednonac='$privatebednonac',privatebednonac=privatebednonac+($privatebednonac-$h),Tprivatebedac='$privatebedac',privatebedac=privatebedac+($privatebedac-$i),Ticu='$icu',icu=icu+($icu-$j),Tnicu='$nicu',nicu=nicu+($nicu-$k),Tventilator='$ventilator',ventilator=ventilator+($ventilator-$l) WHERE hospitalId='$usersession'");
    // $userRow=mysqli_fetch_array($res);
    header('Location: hospitalbed.php');
}
?>