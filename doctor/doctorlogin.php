<?php
if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==true){
    header("Location: doctor/doctordashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctor Login</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->

</head>
<style>
@import url("https://fonts.googleapis.com/css?family=Lato:400,700");

#bg {
    background-image: url('img/background.png');
    position: absolute;
    left: 0;
    top: 0;
    background-repeat: no-repeat;
    width: 100vw;
    height: 100vh;

    background-size: contain;
    filter: blur(3px);
}

body {
    font-family: 'Lato', sans-serif;
    color: #4A4A4A;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    overflow: hidden;
    margin: 0;
    padding: 0;
}

form {
    width: 350px;
    position: relative;
}

form .form-field::before {
    font-size: 20px;
    position: absolute;
    left: 15px;
    top: 17px;
    color: #888888;
    content: " ";
    display: block;
    background-size: cover;
    background-repeat: no-repeat;
}

form .form-field:nth-child(1)::before {
    background-image: url(../img/user-icon.png);
    width: 20px;
    height: 20px;
    top: 15px;
}

form .form-field:nth-child(2)::before {
    background-image: url(../img/lock-icon.png);
    width: 16px;
    height: 16px;
}

form .form-field {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-bottom: 1rem;
    position: relative;
}

form input {
    font-family: inherit;
    width: 100%;
    outline: none;
    background-color: #fff;
    border-radius: 4px;
    border: none;
    display: block;
    padding: 0.9rem 0.7rem;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
    font-size: 17px;
    color: #4A4A4A;
    text-indent: 40px;
}

form .btn {
    outline: none;
    border: none;
    cursor: pointer;
    display: inline-block;
    margin: 0 auto;
    padding: 0.9rem 2.5rem;
    text-align: center;
    background-color: #d71f1f;
    color: #fff;
    border-radius: 4px;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
    font-size: 17px;
}
</style>

<body>
    <div id="bg"></div>

    <form class="form" role="form" method="post" action="../partials/_handledoctor.php">
        <div class="form-field">
            <!-- <input type="email" placeholder="Admin Login" required /> -->
            <input name="doctorId" type="text" placeholder="Doctor Login" required>
        </div>

        <div class="form-field">
            <!-- <input type="password" placeholder="Password" required /> -->
            <input name="password" type="password" placeholder="Password" required>
        </div>

        <div class="form-field">
            <button class="btn" type="submit" name="login">Log in</button>
        </div>
    </form>
    <!-- partial -->

</body>

</html>