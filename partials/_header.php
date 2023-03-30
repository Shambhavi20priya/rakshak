<?php
session_start();
$uid="";
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
  $bg="primary";
  $uid=$_SESSION['sno'];
}
else if(isset($_SESSION['doctorloggedin']) && $_SESSION['doctorloggedin']==true)
$bg="danger";
else if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==true)
$bg="dark";
else
$bg="primary";

echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-'.$bg.'">
<div class="container-fluid">
<a class="navbar-brand" href="#" style="font-family: "Roboto", sans-serif;"><strong>Rakshak</strong></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link text-light" href="index.php">Home <span class="sr-only"></span></a>
</li>
        <li class="nav-item">
        <a class="nav-link text-light" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        More Options
        </a>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="../rakshak/patient/patient.php">Book Appointment</a></li>
        <li><a class="dropdown-item" href="bed.php">Bed Availability</a></li>
        <li><a class="dropdown-item" href="query.php">Register Query</a></li>
        <li><hr class="dropdown-divider"></li>
        </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="contact.php">Contact Us</a>
        </li>
        </ul>';
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
          echo'
          <a href="patient/patient.php" class="btn btn-outline-light me-4">'.$_SESSION['useremail'].'</a>';
          $sql="SELECT * FROM subscription WHERE userid = '$uid'";
          $result = mysqli_query($conn, $sql);
          $numRows = mysqli_num_rows($result);
          if ($numRows==0) {
          echo '<a href="/rakshak/subscription.php" class="btn btn-outline-light me-4">Subscription</a>';
          }
          echo'
          <a href="partials/_logout.php" class="btn btn-outline-light">Logout</a>
          </form>';
        }
        else if(isset($_SESSION['doctorloggedin']) && $_SESSION['doctorloggedin']==true){
          echo'
          <a href="doctor/doctordashboard.php" class="btn btn-outline-light me-4">'.$_SESSION['doctorSession'].'</a>
          <a href="partials/_logout.php" class="btn btn-outline-light">Logout</a>
          </form>';
        }
        else {
          echo'
       
        <button class="btn btn-outline-light ms-2" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button>
        <button class="btn btn-outline-light mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>';
      }
      echo'
      </div>
      </div>
      </nav>';
      if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
        echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <strong>Success!</strong> You can now login
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
      }
      else if (isset($_GET['signupsuccess'])){
        echo ' <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <strong>Error!</strong> '.$_GET['error'].'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div> ';
      }
      if(isset($_GET['loginsuccess'])){
        echo ' <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <strong>Error!</strong> '.$_GET['error'].'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div> ';
      }
      if(isset($_GET['makeaptwlgn'])){
        echo ' <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <strong>Error!</strong> Only logged in patients can proceed to appointment page
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div> ';
      }
      if(isset($_GET['bedwlgn'])){
        echo ' <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <strong>Error!</strong> Only logged in patients can proceed bed availability page
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div> ';
      }
      include 'partials/_loginModal.php';
      include 'partials/_signupModal.php';
      
      ?>