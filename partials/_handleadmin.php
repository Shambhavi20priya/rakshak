<?php
// include_once 'assets/conn/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $adminId = mysqli_real_escape_string($conn, $_POST['adminId']);
    $password  = mysqli_real_escape_string($conn, $_POST['password']);

    $res = mysqli_query($conn, "SELECT * FROM admin WHERE adminId = '$adminId'");

    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    // echo $row['password'];
    if ($row['password'] == $password) {
        session_start();
        $_SESSION['adminSession'] = $row['adminId'];
        $_SESSION['adminloggedin'] = true;
?>
        <script type="text/javascript">
            alert('Login Success');
        </script>
    <?php
        header("Location: ../admin/admindashboard.php");
    } else {
    ?>
        <script type="text/javascript">
            alert("Wrong input");
        </script>
<?php
    header("Location: ../adminlogin.php");
    }
}
?>