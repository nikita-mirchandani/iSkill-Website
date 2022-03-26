
<!-- This module is being prepared by Akhil - 19ce089 -->

<?php
include('./dbConnection.php');
include('./maininclude/header.php');

?>
<!-- Start Video background -->
<div class="contaner-fluid remove-vid-marg">
    <div class="vid-parent">
        <video playsinline autoplay muted loop>
            <source src="video/Coding.mp4">
        </video>
        <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
        <h1 class="my-content" style="color:black">Welcome to iSkill</h1>
        <small class="my-content" style="color:black">Learn and Explore</small><br>
        <?php
            //session is already been started as we have included header.php in index.php
            if(!isset($_SESSION['is_login'])){
                echo '<a href="#" class="btn btn-danger mt-3" data-toggle="modal" data-target="#StuRegModalCenter">Get started</a>
                ';
            }
            else{
                echo '<a href="student/studentProfile.php" class="btn btn-primary mt-3">My Profile</a>';
            }
        ?>

    </div>
</div>
<!-- End video background -->


<!-- Start Text Banner -->
<!-- icons taken from fontawesome.com -->
<div class="container-fluid bg-danger txt-banner">
    <div class="row bottom-banner">
        <div class="col-sm">
            <h5><i class="fas fa-book-open mr-3"></i> 100+ Online Courses</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-users mr-3"></i> Expert Instructors</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-rupee-sign mr-3"></i> Money Back Guarantee</h5>
        </div>
    </div>
</div>

<!-- End Text Banner -->
<!-- Start Most Popular Course -->
<a name="Courses">
    <div class="container mt-5">
        <h1 class="text-center" name="Courses">Popular Course</h1>
        <!-- Start Most Popular Course 1st Card Deck -->

        <div class="card-deck mt-4">
            <?php
            $sql = "SELECT * FROM tblCourse LIMIT 3 "; 
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



        <!-- End Most Popular Course 1st Card Deck -->
        <!-- Start Most Popular Course 2nd Card Deck -->
        <div class="card-deck mt-4">
            <?php
            $sql = "SELECT * FROM tblCourse LIMIT 3,3 "; 
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
        <!-- End Most Popular Course 2nd Card Deck -->
        <div class="text-center m-2">
            <a class="btn btn-danger" href="courses.php">View All Course</a>
        </div>
    </div>
    <!-- End Most Popular Course -->

    <!-- Start Contact Us-->
    <a name="contact">
        <?php
    include('./contact.php')
    ?>
    </a>
    <!--End Contact Us -->


    </div>

    <!-- Start Social Follow -->

    <div class="container-fluid bg-danger">
        <div class="row text-white text-center p-1">
            <div class="col-sm">
                <a class="text-white social-hover" href="#"><i class="fab fa-facebook-f"></i>Facebook</a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="#"><i class="fab fa-twitter"></i>Twitter</a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="#"><i class="fab fa-whatsapp"></i>whatsapp</a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="#"><i class="fab fa-linkedin"></i>linkedin</a>
            </div>
        </div>
    </div>
    <!-- End Social Follow -->






    <!--Start About Section-->
    <div class="container-fluid p-4" style="background-color:#E9ECEF">
        <div class="container" style="background-color:#E9ECEF">
            <div class="row text-center">
                <div class="col-sm">
                    <h5>About Us</h5>
                    <p>iSkill provides universal access to the world's best education and also
                        all the courses , meeting and materials which are being taught in possible every
                        engineering
                    </p>
                </div>
                <div class="col-sm">
                    <h5>Category</h5>
                    <a href="#" class="text-dark">Web Development</a><br />
                    <a href="#" class="text-dark">Web Designing</a><br />
                    <a href="#" class="text-dark">Android App Development</a><br />
                    <a href="#" class="text-dark">ioS Development</a><br />
                    <a href="#" class="text-dark">Data Analysis</a><br />
                </div>
                <div class="col-sm">
                    <h5>Contact Us</h5>
                    <p>iCharusat Pvt Ltd<br>
                        CHARUSAT Campus Off. Nadiad-Petlad Highway,<br />
                        Changa 388 421 <br />
                        Anand, Gujarat, INDIA<br />
                        Telephone: 02697-265011<br/>
                        Email: info@charusat.ac.in</p>
                </div>
            </div>
        </div>
    </div>
    <!--End About Section-->

    <!-- Including Footer -->
    <?php
include('./maininclude/footer.php');
?>
    <!-- End Footer -->