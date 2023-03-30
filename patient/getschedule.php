<?php
session_start();
include_once '../assets/conn/dbconnect.php';
$q = $_GET['q'];
$res = mysqli_query($con, "SELECT * FROM doctorschedule NATURAL JOIN doctor WHERE scheduleDate='$q'");
?>
<?php
if (mysqli_num_rows($res) == 0) {
    echo "<div class='alert alert-danger' role='alert'>Doctor is not available at the moment. Please try again later.
        </div>";
} else {
    echo "<table class='table table-hover table-bordered'>";
    echo "<thead>";
    echo " <tr class=filters>";
    echo "<th>Appointment Id</th>";
    echo "<th>Doctor Name</th>";
    echo "<th>Department</th>";
    echo "<th>Day</th>";
    echo "<th>Time Slot</th>";
    echo "<th>Availability</th>";
    echo "<th>Book Now!</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_array($res)) {
?>
        <tr>
            <?php
            if ($row['bookAvail'] != 'available') {
                $avail = "danger";
                $btnstate = "disabled";
                $btnclick = "danger";
            } else {
                $avail = "success";
                $btnstate = "";
                $btnclick = "success";
            }
            echo "<td>" . $row['scheduleId'] . "</td>";
            echo "<td>" . "Dr.". $row['doctorFirstName'] ." ". $row['doctorLastName']. "</td>";
            echo "<td>" . $row['doctorDepartment'] . "</td>";
            echo "<td>" . $row['scheduleDate'] . "</td>";
            echo "<td>" . $row['startTime'] . "</td>";
            echo "<td> <span class='label label-" . $avail . "'>" . $row['bookAvail'] . "</span></td>";
            echo "<td><a href='appointment.php?&appid=" . $row['scheduleId'] . "&scheduleDate=" . $q . "' class='btn btn-" . $btnclick . " ". $btnstate." btn-xs' role='button' aria-disabled='true'".">Book Now</a></td>";
            ?>
        </tr>

<?php
    }
    echo "</tbody>
        </table>";
}
?>