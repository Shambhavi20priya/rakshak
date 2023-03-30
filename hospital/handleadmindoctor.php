<?php
$showError = "false";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include_once '../assets/conn/dbconnect.php';
    session_start();
    $usersession = $_SESSION['hospitalSession'];
    $dob = mysqli_real_escape_string($con, $_POST['doctorDOB']);
    $doctorId=$_POST['doctorId'];
    $password=$_POST['password'];
    $fname=$_POST['doctorFirstName'];
    $lname=$_POST['doctorLastName'];
    $dept=$_POST['doctorDepartment'];
    $gender=$_POST['doctorGender'];
    $phone=$_POST['doctorPhone'];
    $email=$_POST['doctorEmail'];
    $sql = "INSERT INTO `doctor` (`password`,`doctorId`, `hid`,`doctorFirstName`, `doctorLastName`, `doctorDepartment`, `doctorGender`, `doctorPhone`, `doctorEmail`, `doctorDOB`)
    VALUES ('$password' ,'$doctorId','$usersession', '$fname', '$lname','$dept','$gender','$phone','$email','$dob' ) ";
    $result = mysqli_query($con, $sql);
    if($result){
    $showAlert = true;
    header("Location: /rakshak/hospital/doctor.php");
    exit();
    }
}
