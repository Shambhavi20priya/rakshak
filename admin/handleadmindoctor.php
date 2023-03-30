<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include_once '../assets/conn/dbconnect.php';

    $dob = mysqli_real_escape_string($con, $_POST['doctorDOB']);
    $doctorId=$_POST['doctorId'];
    $password=$_POST['password'];
    $fname=$_POST['doctorFirstName'];
    $lname=$_POST['doctorLastName'];
    $dept=$_POST['doctorDepartment'];
    $gender=$_POST['doctorGender'];
    $address=$_POST['doctorAddress'];
    $phone=$_POST['doctorPhone'];
    $email=$_POST['doctorEmail'];
    $sql = "INSERT INTO `doctor` (`password`,`doctorId`, `doctorFirstName`, `doctorLastName`, `doctorDepartment`, `doctorGender`, `doctorAddress`, `doctorPhone`, `doctorEmail`, `doctorDOB`)
    VALUES ('$password' ,'$doctorId', '$fname', '$lname','$dept','$gender','$address','$phone','$email','$dob' ) ";
    $result = mysqli_query($con, $sql);
    if($result){
    $showAlert = true;
    header("Location: /rakshak/admin/admindoctor.php");
    exit();
    }
}
