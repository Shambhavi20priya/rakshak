<!doctype html>
<html lang="en">

<head>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
    #ques {
        min-height: 433px;
    }
    *{
    font-family: 'Roboto', sans-serif;
}
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
    </style>
    <title>Welcome Rakshak- One for all</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // Insert into thread db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        
        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title); 
        
        $th_dept = $_POST['department'];

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc); 

        $sno = $_POST['sno']; 
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`,`departmentName`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '$sno','$th_dept', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $sno = $_POST['sno']; 
        if ($result) {
            # code...
            $sql2 = "UPDATE subscription SET quesleft=quesleft- 1 WHERE userid='$sno' AND quesleft<>0";
            $result2 = mysqli_query($conn, $sql2);
        }
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Success!</strong> You thread has been added. Please wait for response
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>';
        } 
    }
    ?>


    <!-- Category container starts here -->
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-4">
            <h1 class="display-4">Welcome to <?php echo $catname;?> information page</h1>
            <p class="lead"> <?php echo $catdesc;?></p>
            <hr class="my-4">
            <p>This is a medical advisory page. Spam / Advertising / Self-promote is not allowed. Do not post “wrong” information. Remain respectful of other members at all times.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <?php 
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
    echo '<div class="container">
            <h1 class="py-2">Ask you Problem</h1> 
            <form action="'. $_SERVER["REQUEST_URI"] . '" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Keep your title as short</small>
                </div>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Elaborate Your Concern</label>
                    <textarea class="form-control my-2" id="desc" name="desc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="department">Special requests for any department (if any)</label>
                    '?><?php
                    $sql = "SELECT * FROM `departments` WHERE departmentName <> 'Physician' "; 
                    $result = mysqli_query($conn, $sql);
                    
                    echo '<select name="department" class="form-select form-select-sm my-2" aria-label=".form-select-sm example">';
                    echo '<option value="Physician" selected>Physician</option>';
                    while($row = mysqli_fetch_assoc($result)){
                      $cat = $row['departmentName'];
                      
                    echo '<option value="'.$cat.'">'.$cat.'</option>';

                    }
                    echo'
                    </select>                    
                </div>
                <button type="submit" class="btn btn-success my-2">Submit</button>
            </form>
        </div>';
    }

    ?>
    
    <div class="container mb-5" id="ques">
        <h1 class="py-2">Browse Questions</h1>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id ORDER BY timestamp DESC"; 
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['thread_id'];
        $title = $row['thread_title'];
        $desc = $row['thread_desc']; 
        $thread_time = $row['timestamp']; 
        $thread_user_id = $row['thread_user_id']; 
        $sql2 = "SELECT patientEmail FROM `patient` WHERE icPatient='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        



        echo '<div class="media my-3">
            <img src="img/userdefault.jpg" width="54px" class="mr-3" alt="...">
            <div class="media-body">'.
             '<h5 class="mt-0"> <a class="text-dark" href="thread.php?threadid=' . $id. '">'. $title . ' </a></h5>
                '. $desc . ' </div>'.'<div class="font-weight-bold my-0"> Asked by: Patient at '. $thread_time. '</div>'.
        '</div>';

        }
        // echo var_dump($noResult);
        if($noResult){
            echo '<div class="p-5 mb-4 bg-danger bg-opacity-25 rounded-3">
                    <div class="container-fluid py-5">
                        <p class="display-4">No Threads Found</p>
                        <p class="lead"> Be the first person to ask a question</p>
                    </div>
                 </div> ';
        }
    ?>

    </div>

    <?php include 'partials/_footer.php';?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>