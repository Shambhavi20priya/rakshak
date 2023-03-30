<?php
// include_once 'assets/conn/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $doctorId = mysqli_real_escape_string($conn, $_POST['doctorId']);
    $password  = mysqli_real_escape_string($conn, $_POST['password']);

    $res = mysqli_query($conn, "SELECT * FROM doctor WHERE doctorId = '$doctorId'");
    $numRows = mysqli_num_rows($res);
    if ($numRows>0) {
        # code...
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        // echo $row['password'];
        if ($row['password'] == $password) {
            session_start();
            $_SESSION['doctorSession'] = $row['doctorId'];
            $_SESSION['doctorloggedin'] = true;
            ?>
        <script type="text/javascript">
            alert('Login Success');
            </script>
    <?php
        header("Location: ../doctor/doctordashboard.php");
    }
    else {
        # code...
        header("Location: ../doctorlogin.php");
    }
    } 
    else {
        # code...
        header("Location: ../doctorlogin.php");
    }
    ?>
        <!-- <script>
            alert("Wrong input");
            </script> -->
<?php

}
?>