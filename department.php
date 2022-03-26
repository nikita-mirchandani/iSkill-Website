
<!-- This module is being prepared by Nikita - 19ce076 -->

<?php

include_once('./dbConnection.php');
include('./maininclude/header.php');
if(!isset($_SESSION)){
    //if session isn't start , start it.
    session_start();
}
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
        <h1 class="text-center" name="Courses">Departments</h1>
        <!-- Start All Course 1st Card Deck -->
        <div class="card-deck mt-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                <img src="image/department/CE.jpg" class="card-img-top" alt="CE" style="height: 215px;width:350px"/>
                    <div class="card-body">
                        <h5 class="card-title">Computer Engineering</h5>
                       
                    </div>
                   
                    <div class="card-footer">
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="DepartmentCourses.php?dn=<?php  $dept_name = "CE";  echo $dept_name; ?>">View All CE Courses</a>  
                    </div>     
                </div>    
            </a>
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                <img src="image/department/IT.jpg" class="card-img-top" alt="CE" style="height: 215px;width:350px"/>
                    <div class="card-body">
                        <h5 class="card-title">Information Technology</h5>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="DepartmentCourses.php?dn=<?php  $dept_name = "IT";  echo $dept_name;?>">View All IT Courses</a>  
                    </div>     
                </div>    
            </a>
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                <img src="image/department/EC.jpg" class="card-img-top" alt="CE" style="height: 215px;width:350px"/>
                    <div class="card-body">
                        <h5 class="card-title">Electronics & Communication</h5>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="DepartmentCourses.php?dn=<?php  $dept_name = "EC";  echo $dept_name;?>">View All EC Courses</a>  
                    </div>     
                </div>    
            </a>
        </div>
</a>
        
        <!-- End All Course 1st Card Deck -->
        <!-- Start All Course 2nd Card Deck -->
        <div class="card-deck mt-4">
            <a href="#" class="btn" style="text-align: left; padding:0px;">
                <div class="card">
                <img src="image/department/ME.jpg" class="card-img-top" alt="CE" style="height: 215px;width:350px"/>
                    <div class="card-body">
                        <h5 class="card-title">Mechanical Engineering</h5>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="DepartmentCourses.php?dn=<?php  $dept_name = "ME";  echo $dept_name; ?>">View All ME Courses</a>  
                    </div>     
                </div>    
            </a>
            <a href="#" class="btn" style="text-align: left; padding:0px;">
                <div class="card">
                <img src="image/department/CL.jpg" class="card-img-top" alt="CE" style="height: 215px;width:350px"/>
                    <div class="card-body">
                        <h5 class="card-title"> Civil Engineering</h5>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="DepartmentCourses.php?dn=<?php  $dept_name = "CL";  echo $dept_name; ?>">View All CL Courses</a>  
                    </div>     
                </div>    
            </a>
            <a href="#" class="btn" style="text-align: left; padding:0px;">
                <div class="card">
                <img src="image/department/CSE.jpg" class="card-img-top" alt="CE" style="height: 215px;width:350px"/>
                    <div class="card-body">
                        <h5 class="card-title"> Computer Science Engineering</h5>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="DepartmentCourses.php?dn=<?php  $dept_name = "CSE";  echo $dept_name; ?>">View All CSE Courses</a>  
                    </div>        
                   
                </div>    
            </a>
        </div>
        <!-- End All Course 2nd Card Deck -->
    </div>
    <!-- End All Course -->
  

<!-- Including Footer -->
<?php
include('./maininclude/footer.php');
?>
