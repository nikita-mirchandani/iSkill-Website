
<!-- This module is being prepared by Nikita - 19ce076 -->

<?php

include('./dbConnection.php');
include('./maininclude/header.php');

?>

<!-- Start Course Page Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/coursebanner.jpg" alt="course" style="height:500px; width:100%; object-fir:cover;box-shadow:10px;" />
    </div>
</div>
<!-- End Course Page Banner -->
<!-- Start All Course -->
<a name="Courses">
    <div class="container mt-5">
        <h1 class="text-center" name="Courses">All Courses</h1>
        <!-- Start All Course 1st Card Deck -->
        <div class="row mt-4">
            <?php
                $departmentname = $_GET['dn'];
                $sql = "SELECT * FROM tblCourse where CourseDepartment='$departmentname' ";
                $result = $conn->query($sql);

                if($result->num_rows > 0){
                while($row = $result ->fetch_assoc()){
                    $course_id = $row['CourseId'];
                    echo'
                    <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
                    <div class="card">
                        <img src="'.str_replace('..','.', $row['CourseImage']). '" class="card-img-top " alt="image" style="width: 21.5rem; height: 18rem; object-fit: cover;"/>
                        <div class="card-body">
                            <h5 class="card-title">'.$row['CourseName']. '</h5>
                            <p class="card-text">'.$row['CourseDescription']. '</p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text d-inline">Price: <small><del>
                            &#8377 '.$row['CourseOriginalPrice']. '</del></small>
                            <span class = "font-weight-bolder">&#8377 '.$row['CoursePrice']. '</span></p>
                            <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>  
                        </div>     
                    </div>    
                </a>     
                    ';
                    }
                }
            ?>

        </div>
       
    </div>
    </div>
    <!-- End All Course -->
  

<!-- Including Footer -->
<?php
include('./maininclude/footer.php');
?>
