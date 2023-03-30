<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];
    $sql = "SELECT * FROM `patient` where patientEmail='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['icPatient'];
            $_SESSION['patientSession'] = $row['icPatient'];
            $_SESSION['useremail'] = $email;
            echo "logged in". $email;
            $sql2="SELECT *,DATEDIFF(CURDATE(),dos)+1 AS diff FROM subscription WHERE userid = '$uid'";
            $result2 = mysqli_query($conn, $sql2);
            $numrows=mysqli_num_rows($result2);
            $userrows=mysqli_fetch_assoc($result2);
            if ($numrows==1) {
                if (($userrows['planid']==1 && $userrows['diff']>30) || ($userrows['planid']==2 && $userrows['diff']>30) || ($userrows['planid']==3 && $userrows['diff']>30)) {
                    mysqli_query($conn, "DELETE FROM subscription WHERE userid = '$uid'");
                }
            }
        } 
        header("Location: /rakshak/index.php");  
    }
    else{
        $showError = "Try again with correct credential"; 
        header("Location: /rakshak/index.php?loginsuccess=false&error=$showError"); 
    }
    }
?>