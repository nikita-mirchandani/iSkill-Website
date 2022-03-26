<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <!-- <link rel = "stylesheet" href="css/bootstrap.min.css"> -->

    <!-- Font Awesome CSS -->
    <!-- <link rel = "stylesheet" href="css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Google Font (ubuntu bold) -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

    <!--Student Testimonial Owl Slider CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/1-horizontal.css"> -->
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> -->


    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    </link>
    <title>iSkill</title>
</head>

<body>
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top bg-dark">
        <a class="navbar-brand" href="index.php"> <img src="image/ilogo.png" alt="logo"
                style="width: 100px;height: 50px;" /></a>
        <span class="navbar-text"></span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav custom-nav pl-5">
                <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item custom-nav-item"><a href="department.php" class="nav-link">Courses</a></li>
                <!-- <li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link" >Payment</a></li> -->
                <?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        if(isset($_SESSION['is_login'])){
            echo '<li class="nav-item custom-nav-item"><a href="student/studentProfile.php" class="nav-link" >My Profile</a></li>
            <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link" >Logout</a></li>    
            ';
          }else {
            echo ' <li class="nav-item custom-nav-item"><a href= "#" class="nav-link" data-toggle="modal" data-target="#LoginModalCenter">Login</a></li>
            <li class="nav-item custom-nav-item"><a href="#" class="nav-link"  data-toggle="modal" data-target="#StuRegModalCenter">Signup</a></li>   
            ';
          }
        ?>
                <li class="nav-item custom-nav-item"><a href="index.php #contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>


    <!-- End Navigation -->