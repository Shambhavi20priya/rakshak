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
    <title>Rakshak-One for all</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        // Query the users table to find out the name of OP
        $sql2 = "SELECT patientEmail FROM `patient` WHERE icPatient='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['patientEmail'];
    }
    
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        //Insert into comment db
        $comment = $_POST['comment'];
        $departmentName=$_POST['doctorDepartment']; 
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment); 
        $sno = $_POST['sno']; 
        $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
        $sql8="UPDATE threads SET departmentName='$departmentName' WHERE thread_id='$id'";
        $result = mysqli_query($conn, $sql);
        $result8 = mysqli_query($conn, $sql8);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Success!</strong> Reply has been posted. Back to <a href="doctor/question.php" class="btn btn-danger btn-sm">Question Page</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
            </div>';
        } 
    }
    ?>


    <!-- Category container starts here -->
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-4">
            <h1 class="display-4"><?php echo $title;?></h1>
            <p class="lead">  <?php echo $desc;?></p>
            <hr class="my-4">
            <p>Asked by: <em>Patient</em></p>
        </div>
    </div>

     <?php 
    if(isset($_SESSION['doctorloggedin']) && $_SESSION['doctorloggedin']==true){ 
        
    echo '
    
    <div class="container">
    <h1 class="py-2">Post a Comment</h1> 
    <div class="alert alert-danger " role="alert">
    <div>
       Please go to your dashboard to reply to queries asked to you.
    </div>
</div>
    </div>
    ';
    }
    else{
        echo '
        
        <div class="container">
        <h1 class="py-2">Post a Comment</h1> 
           <p class="lead">Only authorised doctors can reply. You can read the responses till then</p>
        </div>
        ';
    }

    ?>


    <div class="container mb-5" id="ques">
        <h1 class="py-2">Discussions</h1>
       <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id=$id ORDER BY comment_time DESC"; 
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['comment_id'];
        $content = $row['comment_content']; 
        $comment_time = $row['comment_time']; 
        $thread_user_id = $row['comment_by']; 

        $sql2 = "SELECT * FROM `doctor` WHERE doctorId='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        echo '<div class="media my-3">
            <img src="img/userdefault.jpg" width="54px" class="mr-3" alt="...">
            <div class="media-body">
               <p class="font-weight-bold my-0">Dr. '. $row2['doctorFirstName'] .' '.$row2['doctorLastName'].' at '. $comment_time. '</p> '. $content . '
            </div>
        </div>';

        }
     
        if($noResult){
            echo '<div class="p-5 mb-4 bg-danger bg-opacity-25 rounded-3">
                    <div class="container-fluid py-5">
                        <p class="display-4">No Response Yet</p>
                        <p class="lead"> Wait for some doctor to respond</p>
                    </div>
                 </div> ';
        }
    
    ?> 

    </div>

    <?php include 'partials/_footer.php';?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>