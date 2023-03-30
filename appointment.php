<?php
include_once 'assets/conn/dbconnect.php';
?>
<?php
session_start();
if (isset($_SESSION['patientSession']) != "") {
    header("Location: patient/patient.php");
}
else {
    header("Location: index.php?makeaptwlgn=true");
}
?>