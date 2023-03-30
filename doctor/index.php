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
                    <img src="https://s-i.huffpost.com/gen/3991424/images/o-DOCTOR-facebook.jpg" class="w-100"
                        height="400px">
                </div>
                <div class="swiper-slide">
                    <img src="https://www.concentra.com/-/media/project/concentra/dotcom/usa/images/hero-banner/occupational-medicine-500-hero.jpg?t=20200920015358"
                        class="w-100" height="400px">
                </div>
                <div class="swiper-slide">
                    <img src="https://ak3.picdn.net/shutterstock/videos/4808243/thumb/1.jpg" class="w-100"
                        height="400px">
                </div>
                <div class="swiper-slide">
                    <img src="https://www.sutterhealth.org/images/medical-doctors/indian-doctor-and-patient-584x285.jpg"
                        class="w-100" height="400px">
                </div>
            </div>
        </div>


        <!--introduction-->
        <h2 class="mt-5 mb-5 pt-4 text-center fw-bold h-font">Healing Hands, Trusted Treatment</h2>
        <div class="intro " style="max-width: 600px; writing-mode: horizontal-tb;">
            <p align="justify">Rakshak is providing a Multi-Speciality hospital providing unique services in the field
                of General Surgery, Pulmonology, Endoscopy surgery, Lap surgery, Ortho surgery, Neuro surgery and Gynae
                surgery etc in addition to all broad specialties. Hospital has fully equipped operating theaters with
                C-ARM facility managed by highly qualified surgical teams in all respective field.</p>

            <p align="justify">
                We have on board, outstanding clinicians record to lead and develop teams for excellence in practice,
                education and research. We have highly experienced consultation Doctors for OPD and IPD.
            </p>

        </div>

        <div class="imghos">
            <div class=" col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="https://th.bing.com/th/id/OIP.bjda2IPGn7tvWEXpnKJWIwHaE8?pid=ImgDet&rs=1"
                    style="width : 450px" alt="">
            </div>
        </div>
        <br></br>

        <!--Hospitals-->

        <h2 class="mt-5 mb-4 pt-4 text-center fw-bold h-font">Top Doctors Providing Services Through Rakshak</h2>
        <br></br>
        <div class="container">
            <div class="row justify-content-evenly">
                <?php
        $sql = "SELECT * FROM `doctor` JOIN `hospital` WHERE hid=Reg_no ORDER BY RAND() LIMIT 3";
        $result = mysqli_query($con, $sql);
        $num = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $address = $row['Address'];
          $name = $row['doctorFirstName'] . ' ' . $row['doctorLastName'];
          $state = $row['State'];
          $hname = $row['Hospital_Name'];
          $department = $row['doctorDepartment'];
          $email = $row['doctorEmail'];
          $num = $num + 1;

          if ($num <= 3) {

            echo '
           <div class="col-lg-4 col-md-6 my-3">
           <div class="card border-0 shadow" style="max-width:350px;">
           <img src="img/doctor.png" height="180px" class="card-img-top" alt="...">
           <div class="card-body">
           <h5>Dr. ' . $name . '</h5>
           
           <div class="features mb-4">
           <h6 mb-1>Address</h6>
           <span class="badge bg-light text-dark ">' . $hname . '</span>
           <span class="badge bg-light text-dark ">' . $state . '</span>
           <span class="badge bg-light text-dark ">' . $department . '</span>
           
           </div>
           <div class="Facilities mb-4">
           <h6 mb-1>Contact</h6>
           <span class="badge bg-light text-dark ">' . $email . '</span>
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

          while ($row = mysqli_fetch_assoc($result)) {
            $review = $row['review'];
            $name = $row['Hospital_Name'];
            $email = $row['Email'];



            echo '
               <div class="swiper-slide bg-white p-4 ">
                 <div class="profile align-items-center p-4 shadow m-0 ms-2">
                   <div class="d-flex">
                     
                     <h6>' . $name . '</h6>
                   </div>
                   <br>
                   <p>' . $review . '</p>
                   <div class="Ratings mb-4">
                     <h6 mb-1>Contact Us</h6>
                     <span class="badge rounded-pill bg-li">
                     <span class="badge bg-light text-dark ">' . $email . '</span>
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

            <!--Reach Us-->
            <h2 class="mt-5 mb-4 pt-4 text-center fw-bold h-font">Reach Us</h2>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1
      d1878015.8043668908!2d78.9103001624415!3d23.170214047053307!2m3!1f0!2f0!3f0!3m2!
      1i1024!2i768!4f13.1!3m3!1m2!1s0x3981a94302fd3737%3A0x15bb031669298acf!2sVisitor&#39;s%20Hostel%20I
      iitdm%20Jabalpur!5e0!3m2!1sen!2sin!4v1666948264971!5m2!1sen!2sin" height="" style="border:0;" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
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

        <!-- </div> -->
</body>

</html>