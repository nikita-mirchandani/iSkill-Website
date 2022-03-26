<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');



if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
      <!-- Font Awesome CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- Google Font (ubuntu bold) -->
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link rel = "stylesheet" href="../css/style.css"></link>

    <title>Lessons</title>
</head>
<body>
    <div class="container-fluid bg-success p-2">
        <h3>Welcome to iSkill - Online Education</h3>
        <a class="btn btn-danger" href="./myCourse.php">My Courses</a>
</div>
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul class="nav flex-column" id="playlist">
                    <?php
                        if(isset($_GET['course_id'])){
                            $course_id = $_GET['course_id'];
                            $sql = "SELECT * FROM tblLesson WHERE CourseId='$course_id'";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo '<li class="nav-item border-bottom py-2" movieurl='.$row['LessonLink'].' style="cursor: pointer;">'.$row['LessonName'].'</li>';
                                }
                            }
                        }
                    ?>
                </ul>
            </div>
            <div class="col-sm-8">
                <video id="videoarea" src="" class="mt-5 w-75 ml-2" controls></video>
            </div>
        </div>
    </div>

<script type="text/javascript" src="../js/jquery.min.js"></script>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>
    
    <!-- Font Awesome JS -->
    <script type="text/javascript" src = "../js/all.min.js"></script>

    <!-- Admin Ajax Call Javascript
    <script type="text/javascript" src = "../js/adminajaxrequest.js"></script> -->

    <!-- CUstom JavaScript -->
    <script type="text/javascript" src = "../js/custom.js"></script>

    
</body>
</html>
 

