<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Hospital Details</title>



    

    

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

  <div class="px-4 py-5 my-2">
    <img class="d-block mx-auto mb-4" src="../img/logo.png" alt="" width="150" height="150">

    <h1 class="display-5 fw-bold text-center mb-4">
    <?php 
    include_once '../assets/conn/dbconnect.php';
        $hid=$_GET['hid'];
       $sql = "SELECT * FROM `hospital` WHERE Reg_no='$hid'"; 
       $result = mysqli_query($con, $sql);
       $row = mysqli_fetch_assoc($result);
        echo $row['Hospital_Name'].'</h1>';
        
    ?>
    
 
    <div class="col-lg-6 mx-auto">
      <table class="table table-hover table-bordered">
  
  <tbody>
    <tr>
      <td>Registration Id</td>
      <td><?php echo $row['Reg_no']; ?></td>
    </tr>
    <tr>
      <td>Accreditation </td>
      <td><?php echo $row['Accreditation'];?></td>
    </tr>
    <tr>
      <td>Speciality</td>
      <td><?php echo $row['speciality']; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $row['Address'];?></td>
    </tr>
    <tr>
      <td>State</td>
      <td><?php echo $row['State']; ?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $row['District']; ?></td>
    </tr>
    <tr>
      <td>PIN</td>
      <td><?php echo $row['Pincode']; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $row['Email']; ?></td>
    </tr>
    <tr>
      <td>Telephone</td>
      <td><?php echo $row['Telephone_no']; ?></td>
    </tr>
    <tr>
      <td>Mobile No.</td>
      <td><?php echo $row['Mobile_No']; ?></td>
    </tr>
    <tr>
      <td>Ambulance No.</td>
      <td><?php echo $row['Ambulance_no']; ?></td>
    </tr>
    <tr>
      <td>Helpline No.</td>
      <td><?php echo $row['helpline_no']; ?></td>
    </tr>
    <tr>
      <td>Website</td>
      <td><?php echo $row['Website']; ?></td>
    </tr>
    
  </tbody>
</table>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="adminhospital.php" type="button" class="btn btn-primary btn-lg px-4 gap-3">Go Back</a>
      </div>
    </div>
  </div>


  
</main>


    <script src="assets/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
