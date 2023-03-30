<?php
include_once 'assets/conn/dbconnect.php';
?>
<?php
session_start();
if (isset($_SESSION['patientSession'])) {
    header("Location: patient/bed.php");
}
else {
    header("Location: index.php?bedwlgn=true");
}
?>