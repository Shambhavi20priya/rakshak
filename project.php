<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rakshak</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="common.css/comm.css" rel="Stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .availability-form {
      margin-top: -50px;
      z-index: 3;
      position: relative;
    }

    @media screen and (max-width:575px) {
      .availability-form {
        margin-top: 0px;
        padding: 0 35px;
      }

    }
.d-flex{
  padding-right: 8px;
  justify-content: space-around;
}

.btn {
  background-color: DodgerBlue; /* Blue background */
   border: none; /*Remove borders */
  color: white; /* White text */
  padding: 12px 16px; /* Some padding */
  font-size: 16px; /* Set a font size */
  cursor: pointer; /* Mouse pointer on hover */
  border-radius: 72.3rem;

}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
    
  </style>
</head>

   <?php
   require('inc/links.php');
   ?>
   

<body class="bg-light">

<?php
require('inc/header_login.php');
?>

</body>
</html>