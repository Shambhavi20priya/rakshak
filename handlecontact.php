<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'partials/_dbconnect.php';
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$agegroup=$_POST["agegroup"];
$message=$_POST["message"];
$insert = "INSERT INTO `contactus` (`fname`, `lname`, `email`, `agegroup`, `message`) VALUES ('$fname','$lname','$email','$agegroup','$message')";
$results = mysqli_query($conn,$insert) or die(mysqli_error($link));
if($results){
    header("Location: contact.php");
}
else{
    echo"Connection error";
}
}
?>