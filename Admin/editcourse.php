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
if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['course_department'] == "") ||
($_REQUEST['course_desc'] == "") ||($_REQUEST['course_duration'] == "")|| ($_REQUEST['course_author'] == "") || 
($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_price'] == "") ){
    //msg displayed if required field missing
    $msg = '<div class="alert alert-danger" role="alert">
    Fill All The Fields!
    </div> ';
}else{
    //Assigning User Values to Variable
    $cid = $_REQUEST['course_id'];
    $cname = $_REQUEST['course_name'];
    $cdepartment = $_REQUEST['course_department'];
    $cauthor = $_REQUEST['course_author'];
    $cdesc = $_REQUEST['course_desc'];
    $cduration = $_REQUEST['course_duration'];
    $cprice = $_REQUEST['course_price'];
    $coriginalprice = $_REQUEST['course_original_price'];
    // $cimg = '../image/courseimage/'.$_FILES['course_img']['name'];


    $cimg = $_FILES['course_img']['name'];
    $course_image_temp = $_FILES['course_img']['tmp_name'];
    $img_folder = '../image/courseimage/'.$cimg;
    move_uploaded_file($course_image_temp,$img_folder);
     
    // if(!$course_img){
    //      // if no image selected the old image remain as it is. Logic here 
    //      $msg = '<div class="alert alert-danger" role="alert">
    //             Upload Image for the Course!
    //             </div> ';
    // }
   


    $sql = "UPDATE tblCourse SET CourseId = '$cid', CourseName = '$cname' , CourseDepartment = '$cdepartment' , 
    CourseDescription = '$cdesc', CourseAuthor = '$cauthor' ,CourseDuration= '$cduration',
    CoursePrice = '$cprice', CourseOriginalPrice = '$coriginalprice',
    CourseImage = '$img_folder' WHERE CourseId = '$cid'";

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
    <h3 class="text-center">Update Course Details</h3>

    <?php

    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM tblCourse WHERE CourseId = {$_REQUEST['id']} ";
        $result = $conn->query($sql);
        $row = $result ->fetch_assoc();
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value = "<?php if(isset($row['CourseId'])){ echo $row["CourseId"]; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value = "<?php if(isset($row['CourseName'])){ echo $row["CourseName"]; } ?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description </label>
            <textarea class="form-control" id="course_desc" name="course_desc" row=2><?php if(isset($row['CourseDescription'])){ echo $row["CourseDescription"]; } ?></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author" value = "<?php if(isset($row['CourseAuthor'])){ echo $row["CourseAuthor"]; } ?>">
        </div>
        <div class="form-group">
            <label for="course_department">Course Department </label>
            <input type="text" class="form-control" id="course_department" name="course_department" value = "<?php if(isset($row['CourseDepartment'])){ echo $row["CourseDepartment"]; } ?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" value = "<?php if(isset($row['CourseDuration'])){ echo $row["CourseDuration"]; } ?>">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price" name="course_original_price" value = "<?php if(isset($row['CourseOriginalPrice'])){ echo $row["CourseOriginalPrice"]; } ?>">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price" value = "<?php if(isset($row['CoursePrice'])){ echo $row["CoursePrice"]; } ?>">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <img src= "<?php if(isset($row['CourseImage'])){ echo $row["CourseImage"]; } ?>" alt="CourseImage" class="img-thumbnail">
            <input type="file" class="form-control-file" id="course_img" name="course_img" value="<?php if(isset($row['CourseImage'])){ echo $row["CourseImage"];} ?>">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
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