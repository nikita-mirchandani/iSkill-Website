
<?php 
    include('./dbConnection.php');
    include('./mainInclude/header.php');
?>

   <!-- Start Course Page Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/coursebanner.jpg" alt="course" style="height:500px; width:100%; object-fir:cover;box-shadow:10px;" />
    </div>
</div>
<!-- End Course Page Banner -->
<br>
    <div class="container jumbotron mb-5">
        <div class="row">
            <div class="col-md-4">
                <h5 class="mb-3">If Already Registered!! Login</h5>
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
           
            <small id="statusLogMsg"></small>
            <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>    
          </div> 

     
            <div class="col-md-6 offset-md-1">
                <h5 class="mb-3">New User!! Sign Up</h5>
                <form id="stuRegForm">
    <div class="form-group">
        <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label>
        <small id="statusMsg1"></small>
        <input type="text" class="form-control" placeholder="Name" name="stuname" id="stuname" value="">
    </div>    
    <div class="form-group">
        <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold">Email</label>
        <small id="statusMsg2"></small>
        <input type="email" class="form-control" placeholder="Email" name="stuemail" id="stuemail" value="">
        <small class="form-text">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">New Password</label>
        <small id="statusMsg3"></small>
        <input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass" value="" autocomplete="on">
    </div>
    <div class="form-group">
        <i class="fas fa-key"></i><label for="stucpass" class="pl-2 font-weight-bold">Confirm Password</label>
        <small id="statusMsg4"></small>
        <input type="password" class="form-control" placeholder="cPassword" name="cstupass" id="cstupass" value="" autocomplete="on">
    </div>
        <!-- <small class="form-text">We've sent a verification code to your email</small> -->
</form> <br/>
            <button type="button" class="btn btn-primary" onclick="addStu()" id = "signup">Sign Up</button>    
                <small id="successMsg"></small>
            </div>
        </div>
    </div>
    <hr/>
</div>

    <?php 
    // Footer Include from mainInclude
    include('./mainInclude/footer.php');
    ?>