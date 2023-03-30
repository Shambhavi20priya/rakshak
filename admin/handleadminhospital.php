<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include_once '../assets/conn/dbconnect.php';

    $hospitalId=$_POST['hospitalId'];
    $password=$_POST['password'];
    $name=$_POST['hospitalName'];
    $address=$_POST['hospitalAddress'];
    $phone=$_POST['hospitalContact'];
    $email=$_POST['hospitalEmail'];
    $sql = "INSERT INTO `hospital` (`password`,`hospitalId`, `hospitalName`, `hospitalAddress`, `hospitalContact`, `hospitalEmail`)
    VALUES ('$password' ,'$hospitalId', '$name','$address','$phone','$email' ) ";
    $result = mysqli_query($con, $sql);
    if($result){
    $showAlert = true;
    header("Location: /rakshak/admin/adminhospital.php");
    exit();
    }
}
