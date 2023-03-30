<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #ques{
            min-height: 433px;
        }
        *{
    font-family: 'Roboto', sans-serif;
}
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
    </style>
    <title>Welcome to Rakshak - One for All</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    

    <!-- Slider starts here -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/1.jpg" height="500" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/2.webp" height="500" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/3.jpg" height="500" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/4.png" height="500" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/5.png" height="500" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/6.png" height="500" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <!-- Category container starts here -->
    <div class="container my-4" id="ques">
        <h2 class="text-center my-4"> !! Latest Health issues</h2>
        <div class="row my-4">
          <!-- Fetch all the categories and use a loop to iterate through categories -->
          <?php 
         $sql = "SELECT * FROM `categories`"; 
         $result = mysqli_query($conn, $sql);
         $num=0;
         while($row = mysqli_fetch_assoc($result)){
           $id = $row['category_id'];
           $cat = $row['category_name'];
           $desc = $row['category_description'];
           $num=$num+1;
           if ($id<=3) {
            # code...
            echo '<div class="col-md-4 my-2">
            <div class="card" style="width: 18rem; height:25rem;">
            <img src="img/card-'.$id. '.png" class="card-img-top" style="height: 214px;"alt="image for this category">
            <div class="card-body">
            <h5 class="card-title"><a href="'.$id.'.php">' . $cat . '</a></h5>
            <p class="card-text">' . substr($desc, 0, 90). '... </p>
           <a href="'.$id.'.php" class="btn btn-primary">Learn more</a>
           </div>
           </div>
           </div>';
          }
          } 
          ?>
        </div>
        <h2 class="text-center my-4"> !! Other Health issues</h2>
        <div class="row my-4">
          <!-- Fetch all the categories and use a loop to iterate through categories -->
          <?php 
         $sql = "SELECT * FROM `categories`"; 
         $result = mysqli_query($conn, $sql);
        
         while($row = mysqli_fetch_assoc($result)){
           $id = $row['category_id'];
           $cat = $row['category_name'];
           $desc = $row['category_description'];
           $num=$num+1;
           if ($id>3) {
           echo '<div class="col-md-4 my-2">
           <div class="card" style="width: 18rem; height:25rem;">
           <img src="img/card-'.$id. '.png" class="card-img-top" style="height: 214px;"alt="image for this category">
           <div class="card-body">
           <h5 class="card-title"><a href="'.$id.'.php">' . $cat . '</a></h5>
           <p class="card-text">' . substr($desc, 0, 90). '... </p>
           <a href="'.$id.'.php" class="btn btn-primary">Learn more</a>
           </div>
           </div>
           </div>';
           }
          } 
          ?>
        </div>
    </div>

    <?php include 'partials/_footer.php';?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>