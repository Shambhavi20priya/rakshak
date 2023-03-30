
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <style>
        .container {
            min-height: 87vh;
        }

        #ques {
            min-height: 433px;
        }

        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        .wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .background-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
        }

        .bg-1 {
            flex: 1;
            background-color: white;
        }

        .bg-2 {
            flex: 1;
            background-color: white;
        }

        .about-container {
            width: 85%;
            min-height: 80vh;
            position: absolute;
            background-color: white;
            box-shadow: 24px 24px 30px whitesmoke;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 40px;
            border-radius: 5px;
        }

        .image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-container img {
            width: 500px;
            height: 500px;
            margin: 20px;
            border-radius: 10px;
        }

        .text-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            font-size: 22px;
        }

        .text-container h1 {
            font-size: 70px;
            padding: 20px 0px;
        }

        .text-container a {
            text-decoration: none;
            padding: 12px;
            margin: 50px 0px;
            background-color: #0d6efd;
            border: 2px solid transparent;
            color: white;
            border-radius: 5px;
            transition: .3s all ease;
        }

        .text-container a:hover {
            background-color: transparent;
            color: black;
            border: 2px solid #0d6efd;
        }

        @media screen and (max-width: 1600px) {
            .about-container {
                width: 90%;
            }

            .image-container img {
                width: 400px;
                height: 400px;
            }

            .text-container h1 {
                font-size: 50px;
            }
        }

        @media screen and (max-width: 1100px) {
            .about-container {
                flex-direction: column;
            }

            .image-container img {
                width: 300px;
                height: 300px;
            }

            .text-container {
                align-items: center;
            }
        }
    </style>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Rakshak - One for all</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <div class="wrapper">

        <div class="background-container">
            <div class="bg-1"></div>
            <div class="bg-2"></div>

        </div>
        <div class="about-container">

            <div class="image-container">
                <img src="img/logo.png" alt="">

            </div>

            <div class="text-container">
                <h1>Contact Us</h1>
                <p>Feel free to write to us in case of any suggestion or complaints<br> Just click on the button below fill the form and we will get back to you as soon as possible</p>
                <a href="" data-bs-toggle="modal" data-bs-target="#myModal">Contact Us</a>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:80px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Contact Us Form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- form start -->
                                <form action="handlecontact.php" method="post">
                                    <table class="table table-hover table-bordered">
                                        <tbody>
                                            <td>First Name:</td>
                                            <td><input type="text" class="form-control" name="fname" placeholder="First Name" /></td>
                                            </tr>
                                            <tr>
                                                <td>Last Name</td>
                                                <td><input type="text" class="form-control" name="lname" placeholder="Last Name" /></td>
                                            </tr>
                                            <tr>
                                                <td>Age Group:</td>
                                                <td>
                                                    <div class="radio">
                                                        <label><input type="radio" name="agegroup" value="below18">Below 18</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label><input type="radio" name="agegroup" value="18-35">18-35</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label><input type="radio" name="agegroup" value="35-60">35-60</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label><input type="radio" name="agegroup" value="60+">60+</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>E-mail Id</td>
                                                <td>
                                                    <input class="form-control" type="email" id="email" name="email" placeholder="patient@gmail.com" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Your message</td>
                                                <td><input type="text" class="form-control" name="message" placeholder="message" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="submit" name="submit" class="btn btn-primary my-2" value="Send message">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'partials/_footer.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>