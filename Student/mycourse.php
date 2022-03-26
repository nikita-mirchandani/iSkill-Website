<?php
if(isset($_SESSION)){
    session_start();
}
include('./stuInclude/header.php');
include_once('../dbConnection.php');
if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php';</script>";
}

?>
<div class="container mt-5 ml-2">
    <div class="row">
        <div class="jumbotron">
            <h4 class="text-center">All Course</h4>
            <?php
                if(isset($stuLogEmail)){
                    $sql = "SELECT co.OrderId, c.CourseId , c.CourseName, c.CourseDuration, c.CourseDescription,c.CourseDepartment, c.CourseImage, c.CourseAuthor, c.CourseOriginalPrice, c.CoursePrice FROM tblCourseOrder AS co JOIN tblCourse AS c ON c.CourseId = co.CourseId WHERE co.StudentEmail = '$stuLogEmail'";
                    $result = $conn->query($sql);
                    
                    if($result-> num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            ?>
                            <div class="bg-light mb-3">
                                <h5 class="card-header"><?php echo $row['CourseName']; ?></h5>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?php echo $row['CourseImage'];?>" alt="pic" class="card-img-top mt-4">
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="card-body">
                                            <p class="card-title"><?php echo $row['CourseDescription'];?></p>
                                            <small class="card-text">Duration: <?php echo $row['CourseDuration']; ?></small><br/>
                                            <small class="card-text">Instructor: <?php echo $row['CourseAuthor']; ?></small><br/>
                                            <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['CourseOriginalPrice'] ?></del></small> <span class="font-weight-bolder">&#8377 <?php echo $row['CoursePrice'] ?></span></p>
                                            <a href="watchcourse.php?course_id=<?php echo $row['CourseId'] ?>" class="btn btn-primary mt-5">Watch Course</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                }
            ?>
            <hr/>
        </div>
    </div>
</div>

<?php
include('./stuInclude/footer.php');
?>