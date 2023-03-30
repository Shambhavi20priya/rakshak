<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if (isset($_GET['appid'])) {
    $appid = $_GET['appid'];
}
$res = mysqli_query($con, "SELECT a.*, b.*,c.* FROM patient a
JOIN appointment b
On a.icPatient = b.patientIc
JOIN doctorschedule c
On b.scheduleId=c.scheduleId
WHERE b.appId  =" . $appid);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
$did=$userRow['doctorId'];
$pid=$userRow['icPatient'];
$res2 = mysqli_query($con, "SELECT * FROM doctor JOIN hospital on doctor.hid=hospital.Reg_no WHERE doctorId='$did' ");
$userRow2 = mysqli_fetch_array($res2, MYSQLI_ASSOC);
$res3 = mysqli_query($con, "SELECT * FROM subscription WHERE userid='$pid' ");
$userRow3 = mysqli_fetch_array($res2, MYSQLI_ASSOC);

date_default_timezone_set("Asia/Calcutta");
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Print Invoice</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/invoice.css">
</head>
<style>
    .feather {
        width: 16px;
        height: 16px;
    }
</style>


<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="assets/img/logo.png" style="width:100%; max-width:300px;">
                            </td>

                            <td>
                                Invoice #: <?php echo $userRow['appId']; ?><br>
                                Created: <?php echo date("d-m-Y"); ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td> Patient Id : <?php echo $userRow['patientIc']; ?><br>
                                Patient Name : <?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?><br>
                                Patient Email : <?php echo $userRow['patientEmail']; ?> <br>
                                Free appointment  : <?php echo $userRow['freeapt']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Appointment Details
                </td>
                <td>
                    #
                </td>
            </tr>
            <tr class="item">
                <td>
                    Appointment ID
                </td>

                <td>
                    <?php echo $userRow['appId']; ?>
                </td>
            </tr>
            <tr class="item">
                <td>
                    Schedule ID
                </td>

                <td>
                    <?php echo $userRow['scheduleId']; ?>
                </td>
            </tr>
            <tr class="item">
                <td>
                    Doctor Name
                </td>
                <td>
                    <?php echo 'Dr. '. $userRow2['doctorFirstName'].' '.$userRow2['doctorLastName']; ?>
                </td>
            </tr>
            <tr class="item">
                <td>
                    Hospital Details
                </td>
                <td>
                    <?php echo $userRow2['Hospital_Name']; ?>
                </td>
            </tr>
            <tr class="item">
                <td>
                    Appointment Date
                </td>

                <td>
                    <?php echo $userRow['scheduleDate']; ?>
                </td>
            </tr>
            <tr class="item">
                <td>
                    Appointment Time
                </td>
                <td>
                    <?php echo $userRow['startTime']; ?>
                </td>
            </tr>
            <tr class="item">
                <td>
                    Patient Symptom
                </td>

                <td>
                    <?php echo $userRow['appSymptom']; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="print">
        <button type="button" class="btn btn-sm btn-outline-success my-4" onclick="myFunction()">
            Print This Page
            <span data-feather="printer" class="align-text-bottom"></span>
        </button>
    </div>
</body>
<script>
    function myFunction() {
        window.print();
    }
</script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
     </script> -->
<script src="assets/js/feather.min.js"></script>
<script src="dashboard.js"></script>

</html>