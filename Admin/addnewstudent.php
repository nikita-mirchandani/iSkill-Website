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


// if(isset($_SESSION['is_admin_login'])){
//     $adminEmail =  $_SESSION['adminLogEmail'];

// }else{
//     echo "<script> location.href='../index.php';</script>";
// } 

if(isset($_REQUEST['newStuSubmitBtn'])){
    //CHECKING FOR EMPTY FIELDS
    if( ($_REQUEST['stu_name']== "") || ($_REQUEST['stu_email']== "") || ($_REQUEST['stu_pass']== "") 
    ||($_REQUEST['stu_occ']== "")){
        $msg= '<br><div class="alert alert-warning" role="alert">
                Fill all the Fields!
                </div> ';
    }
    else
    {

        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_occ = $_REQUEST['stu_occ'];
      
        $sql = "INSERT INTO tblStudent (StudentName,StudentEmail, StudentPassword, StudentConfirmPassword,StudentOccupation) VALUES
         ('$stu_name', '$stu_email', '$stu_pass', '$stu_pass','$stu_occ')";

        if($conn->query($sql)== TRUE){
            $msg= '<div class="alert alert-success" role="alert">
            Student Added Succesfully!
            </div> ';
           
        }else
        {
            $msg= '<div class="alert alert-danger" role="alert">
            Unable to Add Student!
            </div> ';
            
        }
    }
}

?>
<br>
<br>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
<h3 class="text-center"> Add New Student </h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_name">Name </label>
            <input type="text" class="form-control" id="stu_name" name="stu_name">
        </div>
        <div class="form-group">
            <label for="stu_Email">Email</label>
            <input type="text" class="form-control" id="stu_email" name="stu_email">
        </div>
        <div class="form-group">
            <label for="stu_pass">Password</label>
            <input type="text" class="form-control" id="stu_pass" name="stu_pass">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" id="stu_occ" name="stu_occ">
        </div>
        <div class="text-center">
            <button type="submit" class = "btn btn-danger" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
            <a href="students.php" class="btn btn-secondary">Close</a>
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