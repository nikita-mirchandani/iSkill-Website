
<!-- This module is being prepared by Krupal - 19ce092 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
     <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

     <!-- Google Font (ubuntu bold) -->
     <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
      
    <!-- Custom CSS -->
    <link rel = "stylesheet" href="../css/adminstyle.css"></link>
    
</head>
<body>
    <!-- Top Navbar -->
  
    <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminDashboard.php"><img src="../image/ilogo.png" alt="logo" style="width: 100px;height: 50px;"/>
    <small class="text-white">Admin Area</small></a>
    </nav>
        <!-- Side bar  -->
        <div class="container-fluid mb-5" style="margin-top:40px;">
             <div class="row">
                <nav class="col-sm-3 col-md-2 bg-light sidebar py-5d-print-none"> <br>
                <br>
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class=nav-item>
                                <a class="nav-link" href="adminDashboard.php">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class=nav-item>
                                <a class="nav-link" href="courses.php">
                                    <i class="fab fa-accessible-icon"></i>
                                    Courses
                                </a>
                            </li>
                            <li class=nav-item>
                                <a class="nav-link" href="lessons.php">
                                    <i class="fab fa-accessible-icon"></i>
                                    Lessons
                                </a>
                            </li>
                            <li class=nav-item>
                                <a class="nav-link" href="students.php">
                                    <i class="fas fa-user"></i>
                                    Students
                                </a>
                            </li>
                            <li class=nav-item>
                                <a class="nav-link" href="sellReport.php">
                                    <i class="fas fa-table"></i>
                                    Sell Report
                                </a>
                            </li>
                            <li class=nav-item>
                                <a class="nav-link" href="adminPaymentStatus.php">
                                    <i class="fas fa-table"></i>
                                    Payment Status
                                </a>
                            </li>
                            <li class=nav-item>
                                <a class="nav-link" href="feedback.php">
                                    <i class="fab fa-accessible-icon"></i>
                                    Feedback
                                </a>
                            </li>
                            <li class=nav-item>
                                <a class="nav-link" href="adminChangePassword.php">
                                <i class="fas fa-key"></i>
                                    Change Password
                                </a>
                            </li>
                            <li class=nav-item>
                                <a class="nav-link" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                    Logout
                                </a>
                            </li>                           
                        </ul>
                    </div>
                </nav>