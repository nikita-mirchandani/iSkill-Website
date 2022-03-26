
<!--Start Footer-->
<footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white">Copyright &copy; 2021 || Designed By Group-2 || <a href="#Login" data-toggle="modal" data-target="#adminLoginModalCenter"> Admin Login</a></small>
</footer>
<!--End Footer-->

<!-- Start Student Registration Modal -->
 <!-- Button trigger modal -->
 

    <!-- Modal -->
    <div class="modal fade" id="StuRegModalCenter" tabindex="-1" aria-labelledby="StuRegModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="StuRegModalCenterLabel">Student Registration</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Start Student Registration Form  -->
            <?php include('studentRegistration.php'); ?> 
            <!-- End Student Registration Form  -->
        
        </div>
        <div class="modal-footer">
            <span id="successMsg"></span>
            <!-- <button type="button" class="btn btn-primary" onclick="addStu()" id = "signup" name="signup">Sign Up</button>     -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="close()">Close</button> 
        </div>
        </div>
    </div>
    </div>
<!-- End Student Registration Modal -->


<!-- This module is being prepared by Kesha - 19ce073 -->
<!-- Start Student Login Modal -->

    <!-- Modal -->
    <div class="modal fade" id="LoginModalCenter" tabindex="-1" aria-labelledby="LoginModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="LoginModalCenterLabel">Student Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Start Student Login Form  -->
        <form id="stuLoginForm">  
            <div class="form-group">
                <i class="fas fa-envelope"></i><label for="stuLogemail" class="pl-2 font-weight-bold">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="stuLogemail" id="stuLogemail">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i><label for="stuLogpass" class="pl-2 font-weight-bold">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass" autocomplete="on">
             </div>
    
        </form>
            <!-- End Student Login Form  -->
        </div>
        <div class="modal-footer">
            <small id="statusLogMsg"></small>
            <button type="button" class="btn btn-primary" id="stuLoginBtn" name="stuLoginBtn" onclick="checkStuLogin()">Login</button>    
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> 
        </div>
        </div>
    </div>
    </div>
<!-- End Student Login Modal -->


<!-- Start Admin Login Modal -->
 <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="adminLoginModalCenterLabel">Admin Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Start Admin Login Form  -->
        <form id="adminLoginForm">  
            <div class="form-group">
                <i class="fas fa-envelope"></i><label for="adminLogemail" class="pl-2 font-weight-bold">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="adminLogemail" id="adminLogemail" >
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i><label for="adminLogpass" class="pl-2 font-weight-bold">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="adminLogpass" id="adminLogpass" autocomplete="on">
             </div>
    
        </form>
            <!-- End Admin Login Form  -->
        </div>
        <div class="modal-footer">
            <small id="statusAdminLogMsg"></small>
            <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="checkAdminLogin()">Login</button>    
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> 
        </div>
        </div>
    </div>
    </div>
<!-- End Admin Login Modal -->

    
    
    
    <!-- Jquery and Bootstrap Javascript -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>



     <script src = "js/jquery.min.js"></script> 
    <!-- <script src = "js/popper.min.js"></script> -->
    <!-- <script src = "js/bootstrap.min.js"></script> --> 
    
    <!-- Font Awesome JS -->
    <script src = "js/all.min.js"></script>
    

    <!-- Student Testimonial Owl Slider JS
    <script type="text/javascript" src = "js/owl.carousel.js"></script>
    <script type="text/javascript" src = "js/tiny-slider.js"></script> -->

     <!-- Student Ajax call javascript -->
     <script type="text/javascript" src = "js/ajaxrequest.js"></script>
    <!-- Admin Ajax call javascript -->
    <script type="text/javascript" src = "js/adminajaxrequest.js"></script>
    
</body>
</html>