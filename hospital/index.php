<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rakshak</title>
  <?php
  require('links.php');
  ?>
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

    .imghos {
      position: absolute;
      left: 945px;
      top: 751px;
    }
  </style>
</head>

<body class="bg-light">

  <?php
  require('header_login.php');
  ?>

  <!--Caraosel-->
  <div class="container-fluid  px-lg-4 mt-4 mb-500">
    <div class="swiper mySwiper">

      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="img/1.jpg" class="w-100" height="400px">
        </div>
        <div class="swiper-slide">
          <img src="img/2.jpg" class="w-100" height="400px">
        </div>
        <div class="swiper-slide">
          <img src="img/3.jpg" class="w-100" height="400px">
        </div>
        <div class="swiper-slide">
          <img src="img/4.jpg " class="w-100" height="400px">
        </div>
      </div>
    </div>


    <!--introduction-->
    <h2 class="mt-5 mb-5 pt-4 text-center fw-bold h-font">Quality care close to home</h2>
    <div class="intro " style="max-width: 600px; writing-mode: horizontal-tb;">
      <p align="justify"> To excel in this pressured and fast-changing world, hospitals need to become more efficient, competitive, sustainable, and future-proof. But how? By investing in smart infrastructure. However, nearly 85% of digital transformation initiatives fail. Implementing smart infrastructure in a single hospital or network is complex, with varying rates of success. When taking your digitalization plans off the page and into the hospital, the right partner can make all the difference. </p>

      <p align="justify">
        Here we are providing a platform for the hospitals to get the best services and the patients to get the best treatment.
        You can get the best doctors and the best hospitals in your city.
        You can also get the best treatment in your city.
        Our aim is to make hospitals available easily to the patients amd also know about it before going to the hospital.
      </p>

    </div>

    <div class="imghos">
      <div class=" col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
        <img src="https://media.kasperskydaily.com/wp-content/uploads/sites/92/2021/02/19091409/214_smart-hospitals-scaled.jpg" style="width : 450px" alt="">
      </div>
    </div>
    <br></br>

    <!--Hospitals-->

    <h2 class="mt-5 mb-4 pt-4 text-center fw-bold h-font">Few Hospitals Using Our Services</h2><br></br>
    <div class="container">
      <div class="row justify-content-evenly">
      <?php 
         $sql = "SELECT * FROM `hospital` ORDER BY RAND() LIMIT 3"; 
         $result = mysqli_query($con, $sql);
         $num=0;
         while($row = mysqli_fetch_assoc($result)){
           $address = $row['Address'];
           $name = $row['Hospital_Name'];
           $city = $row['Town'];
           $state = $row['State'];
           $email = $row['Email'];
           $num=$num+1;
           if ($num<=3) {
            # code...
            
           echo'
           <div class="col-lg-4 col-md-6 my-3">
           <div class="card border-0 shadow" style="max-width:350px;">
           <img src="img/hospital.jpg" height="180px" class="card-img-top" alt="...">
           <div class="card-body">
           <h5>'.$name.'</h5>
           
           <div class="features mb-4">
           <h6 mb-1>Address</h6>
           <span class="badge bg-light text-dark ">'.$address.'</span>
           <span class="badge bg-light text-dark ">'.$city.'</span>
           <span class="badge bg-light text-dark ">'.$state.'</span>
           
           </div>
           <div class="Facilities mb-4">
           <h6 mb-1>Contact Us</h6>
           <span class="badge bg-light text-dark ">'.$email.'</span>
           </div>
           
           <div class="d-flex justify-content-evenly mb-2">
           <a href="details.php?hid='.$row['Reg_no'].'" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
           </div>
           </div>
           </div>
           
           </div>';
          }
          } 
           ?>
      </div>
      
    </div>


    <!--Testimonials-->
    <h2 class="mt-5 mb-4 pt-4 text-center fw-bold h-font">Testimonials</h2>
    <div class="swiper mySwiper-testimonials">
      <div class="swiper-wrapper mb-5">
      <?php 
         $sql = "SELECT * FROM `hospitaltestimonials` JOIN `hospital` WHERE `hid`=`Reg_no`"; 
         $result = mysqli_query($con, $sql);
       
         while($row = mysqli_fetch_assoc($result)){
           $review = $row['review'];
           $name = $row['Hospital_Name'];
           $email = $row['Email'];
          
           
            
           echo'
           
               <div class="swiper-slide bg-white p-4 ">
                 <div class="profile align-items-center p-4 shadow m-0 ms-2">
                   <div class="d-flex">
                     <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" width="30px">
                     <h6>'.$name.'</h6>
                   </div>
                   <br>
                   <p>'.$review.'</p>
                   <div class="Ratings mb-4">
                     <h6 mb-1>Contact Us</h6>
                     <span class="badge rounded-pill bg-li">
                     <span class="badge bg-light text-dark ">'.$email.'</span>
                     </span>
                   </div>
                 </div>
               </div>
           ';
          }
          
           ?> 
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="col-lg-12 text-center mt-5">
      <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Know More >>></a>
    </div>
    <!--Reach Us-->
    <h2 class="mt-5 mb-4 pt-4 text-center fw-bold h-font">Reach Us</h2>
    <div class="container" id="contact">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1
      d1878015.8043668908!2d78.9103001624415!3d23.170214047053307!2m3!1f0!2f0!3f0!3m2!
      1i1024!2i768!4f13.1!3m3!1m2!1s0x3981a94302fd3737%3A0x15bb031669298acf!2sVisitor&#39;s%20Hostel%20I
      iitdm%20Jabalpur!5e0!3m2!1sen!2sin!4v1666948264971!5m2!1sen!2sin" height="" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-4 col-md-4  p-3 mb-lg-0 mb-3 bg-white rounded">
          <div class="bg-white p-4 rounded mb-4">
            <h5>Call Us</h5>
            <a href="tel +919876509321 " class="d-inline-block mb-2 text-decoration-none  text-dark">
              <i class="bi bi-telephone-fill"></i> +919876509321</a><br>
            <a href="tel +919876509321 " class="d-inline-block mb-2 text-decoration-none  text-dark">
              <i class="bi bi-telephone-fill"></i> +919876509321</a>
          </div>

        </div>
      </div>
    </div>
    <?php
    require('footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
          delay: 2000,
          displayOnInteraction: false
        }
      });
    </script>
    <script>
      var swiper = new Swiper(".mySwiper-testimonials", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "3",
        loop: true,
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: false,
        },

        autoplay: {
          delay: 1000,
          displayOnInteraction: false
        },
        //for mobile devices
        breakpoints: {
          320: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          640: {
            slidesPerView: 1,
          }
        },
        pagination: {
          el: ".swiper-pagination",
        },
      });
    </script>

  </div>
</body>

</html>