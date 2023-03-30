<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';

    $user_fname = $_POST['patientFirstName'];
    $user_lname = $_POST['patientLastName'];
    $user_email = $_POST['signupEmail'];
    $user_dob=$_POST['patientDOB'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];
    $gender =$_POST['patientGender'];

    // Check whether this email exists
    $existSql = "SELECT * FROM `patient` WHERE patientEmail = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email already in use";
    }
    else{
        if($pass == $cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `patient` (`patientFirstName`,`patientLastName`,`patientDOB`,`patientGender`,`patientEmail`, `password`, `timestamp`) VALUES ('$user_fname',' $user_lname','$user_dob','$gender', '$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            
            if($result){
                $showAlert = true;
                header("Location: /rakshak/index.php?signupsuccess=true");
                exit();
            }

        }
        else{
            $showError = "Passwords do not match"; 
            
        }
    }
    header("Location: /rakshak/index.php?signupsuccess=false&error=$showError");

}
?>