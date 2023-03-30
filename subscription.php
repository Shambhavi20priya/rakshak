<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Subscription</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="subscription.css" rel="stylesheet">

  <style>
    body {
      background-image: linear-gradient(180deg, #eee, #fff 100px, #fff);
    }

    .container {
      max-width: 960px;
    }
    .pricing-header {
  max-width: 700px;
}
    *{
      font-family: 'Roboto', sans-serif;
    }
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
  </style>


  <!-- Custom styles for this template -->
</head>

<body>
  <?php include 'partials/_dbconnect.php'; ?>
  <?php include 'partials/_header.php'; ?>



  <div class="container py-3">
    <header>


      <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Our Subscription Plans</h1>
        <p class="fs-5 text-muted">Please subscribe to avail full benefits of our services. We value your privacy and don't keep records of your banking details</p>
      </div>
    </header>

    <main>
      <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
          <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
              <h4 class="my-0 fw-normal">Basic</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">Rs.10<small class="text-muted fw-light">/mo</small></h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>1 question per month</li>
                <li>No free appointment</li>
                <li>Email support</li>
              </ul>
              <a href="payment.php?planid=<?php echo '1' ?>" class="w-100 btn btn-lg btn-outline-primary">Proceed with basic plan</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
              <h4 class="my-0 fw-normal">Individual</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">Rs.50<small class="text-muted fw-light">/mo</small></h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>5 question per month</li>
                <li>1 free appointment</li>
                <li>Priority email support</li>
              </ul>
              <a href="payment.php?planid=<?php echo '2' ?>" class="w-100 btn btn-lg btn-primary">Proceed and pay</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card mb-4 rounded-3 shadow-sm border-primary">
            <div class="card-header py-3 text-bg-primary border-primary">
              <h4 class="my-0 fw-normal">Family</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">Rs. 500<small class="text-muted fw-light">/mo</small></h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>10 questions month</li>
                <li>5 free appointments</li>
                <li>Phone and email support</li>
              </ul>
              <a href="payment.php?planid=<?php echo '3' ?>" class="w-100 btn btn-lg btn-primary">Proceed and Pay</a>
            </div>
          </div>
        </div>
      </div>


    </main>


  </div>

  <div class="container-fluid bg-dark fixed-bottom text-light mb-0">
			<p class="text-center mb-0">
				copyright &copy; 2023 Rakshak | All rights reserved
			</p>
		</div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>