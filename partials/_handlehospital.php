<?php
// include_once 'assets/conn/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $hospitalId = mysqli_real_escape_string($conn, $_POST['hospitalId']);
    $password  = mysqli_real_escape_string($conn, $_POST['password']);

    $res = mysqli_query($conn, "SELECT * FROM hospital WHERE Reg_no = '$hospitalId'");
    $numRows = mysqli_num_rows($res);
    if ($numRows>0) {
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    // echo $row['password'];
    if ($row['Password'] == $password) {
        session_start();
        $_SESSION['hospitalSession'] = $row['Reg_no'];
        $_SESSION['hospitalloggedin'] = true;
?>
        <script type="text/javascript">
            alert('Login Success');
        </script>
    <?php
        header("Location: ../hospital/hospitaldashboard.php");
    } else {
        header("Location: ../hospitallogin.php");
    }
    } 
    else {
        # code...
        header("Location: ../hospitallogin.php");
    }
    ?>
        
<?php
    }
?>