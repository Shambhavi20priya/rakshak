<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
            box-shadow: 24px 24px 24px 24px whitesmoke;
            display: flex;
            /* flex-direction: row; */
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
                <h1>About us</h1>
                <p>Rakshak - One for all <br> One place to look for all medical Helps. No need to worry for quick medical advices</p>
                <a href="#">Read More</a>
            </div>

        </div>
    </div>

    <?php include 'partials/_footer.php'; ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>