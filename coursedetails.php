
<!-- This module is being prepared by Kushal - 19ce083 -->

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

<!-- Start Main Content -->
<div class="container mt-5">
    <?php
        if(isset($_GET['course_id'])){
            $course_id =$_GET['course_id'];
            $_SESSION['course_id'] = $course_id;
            $sql = "SELECT * FROM tblCourse WHERE CourseId = '$course_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }


    ?>
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo str_replace('..','.', $row['CourseImage']) ?>" class="card-img-top" alt="img">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title mb-2"><b>Course Name: </b><?php echo $row['CourseName'] ?></h5>
                <p class="card-text"><b>Description: </b><?php echo $row['CourseDescription'] ?></p>
                <p class="card-text"><b>Department:</b> <?php echo $row['CourseDepartment'] ?></p>
                <form action="checkout.php" method="post">
                    <p class="card-text d-inline"><b>Price: </b><small><del>&#8377 <?php echo $row['CourseOriginalPrice'] ?></del></small><span class="font-weight-bolder">&#8377 <?php echo $row['CoursePrice'] ?></span></p>
                    <input type="hidden" name="id" value="<?php echo $row['CoursePrice'] ?>">
                    <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="buy">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
    <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Lesson No.</th>
                    <th scope="col">Lesson Name</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $sql = "SELECT * FROM tblLesson";
            $result = $conn->query($sql);
            
            if($result->num_rows > 0){
                $num=0;
                while($row = $result->fetch_assoc()) {
                    if($course_id == $row['CourseId']){

                        $num++;

                        echo '<tr>
                            <th scope="row">'.$num.'</th>
                            <td>'.$row['LessonName'].'</td>
                            </tr>';
                
                        }     
                     }
             }           
        ?>
        
                
            </tbody>
        </table>
    </div>
</div>

<!-- End Main Content -->

<!-- This module is being prepared by Akhil - 19ce089 -->

  <!-- final Start Students Testimonial-->
  <div class="container-fluid mt-5" style="background-color:#4B7289" id="Feedback">

<h1 class="text-center  p-4">Student's Feedback</h1>
 <div class="row">
        <?php
                             $sql = "SELECT StudentName, StudentOccupation, StudentImage, FeedbackContent FROM tblStudent AS s JOIN tblFeedback AS f ON s.StudentId = f.StudentId ";

                             $result = $conn->query($sql);

                             if($result->num_rows>0){
                             while($row = $result ->fetch_assoc()){
                                 
                                 ?>
                                 <div class="card text-white bg-dark mb-3 ml-3 mr-3" style="max-width: 18rem;">
                                
        <div class="col-md-12">
            <?php $s_img = $row['StudentImage'];
                                $n_img = str_replace('..','.',$s_img);
                            ?>


           
            <div class="card-header" >
                <div class="pic">
                    <img src="<?php echo $n_img ?>" style="border-radius: 50%;width:50px;" alt="DP" />
                </div>
                <h5 class="card-title"><?php echo $row['StudentName'] ?></h5>
                <small><?php echo $row['StudentOccupation'] ?></small>
            </div>
            <p class="description card-body">
                <?php echo $row['FeedbackContent']; ?>
            </p>
        </div>
                             </div>

        <?php 
                }
             }?>
    </div>
</div>
</div>

<!-- final End student testimonial-->




<!-- Including Footer -->
<?php
include('./maininclude/footer.php');
?>
