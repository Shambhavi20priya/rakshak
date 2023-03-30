<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Checkout</title>






    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
        
        
        *{
    font-family: 'Roboto', sans-serif;
}
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
    </style>


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <div class="container" id="ques">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="img/logo.png" alt="" width="150" height="150">
                <h2>Checkout</h2>
                <p class="lead">Please fill in the details to continue</p>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your Plan</span>
                        <span class="badge bg-primary rounded-pill">1</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Chosen Plan</h6>
                                <?php
                                $planid = $_GET['planid'];
                                $price = 0;
                                if ($planid == '1') {
                                    $plan = "Basic";
                                    $price = 10;
                                } elseif ($planid == '2') {
                                    $plan = "Individual";
                                    $price = 50;
                                } elseif ($planid == '3') {
                                    $price = 500;
                                    $plan = "Family";
                                }
                                echo '<small class="text-muted">' . $plan . '</small>';
                                echo '</div>
            <span class="text-muted">' . $price . '</span>';
                                ?>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (INR)</span>
                            <strong>Rs. <?php echo $price ?></strong>
                        </li>
                    </ul>


                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" action="pay.php" method="post" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input name="fname" type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName"  class="form-label">Last name</label>
                                <input type="text" name="lname"class="form-control" id="lastName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for future updates.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Contact No.</label>
                                <input type="text" name="mob" class="form-control" id="address" required>
                                <div class="invalid-feedback">
                                    Please enter your Moile number.
                                </div>
                                <input type="hidden" name="plan" value="<?php echo $_GET['planid']?>">
                            </div>




                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary my-4 btn-lg" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </main>

    </div>
    <div class="container-fluid bg-dark text-light mb-0">
        <p class="text-center mb-0">
            copyright &copy; 2023 Rakshak | All rights reserved
        </p>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="form-validation.js"></script>
</body>

</html>