<?php
if(!isset($_SESSION)){
    session_start();
}
include('./admininclude/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
} else{
    echo "<script>location.href = '../index.php';</script>";
}
//update
if(isset($_REQUEST['requpdate'])){
//Checking for Empty Fields
if(($_REQUEST['lesson_id'] == "") || ($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") ||
($_REQUEST['course_id'] == "") ||($_REQUEST['course_name'] == "")){
    //msg displayed if required field missing
    $msg = '<div class="alert alert-danger" role="alert">
    Fill All The Fields!
    </div> ';
}else{
    //Assigning User Values to Variable
    $lid = $_REQUEST['lesson_id'];
    $lname = $_REQUEST['lesson_name'];
    $ldesc = $_REQUEST['lesson_desc'];
    $cid = $_REQUEST['course_id'];
    $cname = $_REQUEST['course_name'];
    $llink = '../lessonvid/'.$_FILES['lesson_link']['name'];
    
    $sql = "UPDATE tblLesson SET LessonId = '$lid', LessonName = '$lname' , LessonDescription = '$ldesc' , 
    CourseId = '$cid', CourseName = '$cname' ,LessonLink= '$llink' WHERE LessonId = '$lid'";

    if($conn -> query($sql) == TRUE){
        //below msg display on form submit success
        $msg = '<div class = "alert alert-success col-sm-6 ml-5 mt-2"
        role ="alert">Updated Successfully!</div>';
    }else{
        //below msg display on form submit failed
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"
        role = "alert">Unable to Update !</div>';
    }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Lesson Details</h3>
    <?php
    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM tblLesson WHERE LessonId = {$_REQUEST['id']} ";
        $result = $conn->query($sql);
        $row = $result ->fetch_assoc();
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lesson_id">Lesson ID</label>
            <input type="text" class="form-control" id="lesson_id" name="lesson_id" value = "<?php if(isset($row['LessonId'])){ echo $row["LessonId"]; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name" value = "<?php if(isset($row['LessonName'])){ echo $row["LessonName"]; } ?>">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description </label>
            <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2><?php if(isset($row['LessonDescription'])){ echo $row["LessonDescription"]; } ?></textarea>
        </div>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value = "<?php if(isset($row['CourseId'])){ echo $row["CourseId"]; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" onkeypress="isInputNumber(event)" value = "<?php if(isset($row['CourseName'])){ echo $row["CourseName"]; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Link</label>
            <div class="embed-responsive-item embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?php if(isset($row['LessonLink'])){ echo $row['LessonLink'];}?>"
                 allowfullscreen></iframe></div>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link" >
        </div>
    
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
        </div>
        
        <?php
         if(isset($msg)){
             echo $msg;
            }
         ?>
    </form>
</div>

</div><!--div Row close from header-->
</div><!--div Container-fluid close from header-->

<?php
include('./admininclude/footer.php');
?>