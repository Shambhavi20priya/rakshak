<?php
include 'partials/_dbconnect.php';
session_start();
$uid=$_SESSION['sno'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Thank You</title>


    

    

<link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    
  </head>
  <body>
    
<main>

  <div class="px-4 py-5 my-2 text-center">
    <img class="d-block mx-auto mb-4" src="img/logo.png" alt="" width="150" height="150">

    <h1 class="display-5 fw-bold">
    
    <?php
    include 'instamojo/Instamojo.php';
    $api = new Instamojo\Instamojo('test_e21d0a5d3ec617ae448058512e0', 'test_ef151341507d0d4a62bffaa9dd8','https://test.instamojo.com/api/1.1/');
    $payid=$_GET['payment_request_id'];
    $payid2=$_GET['payment_id'];
    try {
        $response = $api->paymentRequestStatus($payid);
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
    ?>
    <?php
     $planid=0;
     $freeapt=0;
     $ques=0;
     if($response['purpose']=="Basic")
     {
       $planid=1;
       $freeapt=0;
       $ques=1;
     }
     elseif($response['purpose']=="Individual")
     {
       $planid=1;
       $freeapt=1;
       $ques=1;
     }
     elseif($response['purpose']=="Family")
     {
       $planid=3;
       $freeapt=5;
       $ques=12;
     }
    $status=$_GET['payment_status'];
    if($status=='Failed')
      echo 'Oops!! Transaction Failed..Try Again </h1>';
      else
      {
        echo 'Thank You for purchasing our subscription </h1>';
        $sql = "INSERT INTO `subscription` ( `userid`, `pid`, `planid`,`dos`,`freeapt`,`ques`,`aptleft`,`quesleft`) VALUES ('$uid', '$payid2','$planid',current_timestamp(),'$freeapt','$ques','$freeapt','$ques')";
        $result = mysqli_query($conn, $sql);
      }
   

    
    ?>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Please find the details of your purchase below.</p>
      <table class="table table-hover table-bordered">
  
  <tbody>
    <tr>
      <td>Plan Purchased</td>
      <td><?php echo $response['purpose']; ?></td>
    </tr>
    <tr>
      <td>Payment Id: </td>
      <td><?php echo $payid2;?></td>
    </tr>
    <tr>
      <td>Payee Name</td>
      <td><?php echo $response['payments'][0]['buyer_name'];?></td>
    </tr>
    <tr>
      <td>Payee Email</td>
      <td><?php echo $response['payments'][0]['buyer_email']; ?></td>
    </tr>
    <tr>
      <td>Payee Phone</td>
      <td><?php echo $response['payments'][0]['buyer_phone']; ?></td>
    </tr>
    <tr>
      <td>Amount Paid(INR)</td>
      <td><?php echo $response['amount']; ?></td>
    </tr>
    
  </tbody>
</table>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="index.php" type="button" class="btn btn-primary btn-lg px-4 gap-3">Go to Home</a>
      </div>
    </div>
  </div>


  
</main>


    <script src="assets/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
