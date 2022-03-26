<?php
if(!isset($_SESSION)){
    session_start();

}


include('./admininclude/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail =  $_SESSION['adminLogEmail'];

}else{
    echo "<script> location.href='../index.php';</script>";
} 

if(isset($_REQUEST['requpdate'])){
    //checking for empty field

    if(($_REQUEST['stu_id']== "") || ($_REQUEST['stu_name']== "") || ($_REQUEST['stu_email']== "") || ($_REQUEST['stu_pass']== "") || ($_REQUEST['stu_occ']== "")){

        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields! </div>';
    }else {
        $sid = $_REQUEST['stu_id'];
        $sname = $_REQUEST['stu_name'];
        $semail = $_REQUEST['stu_email'];
        $spass = $_REQUEST['stu_pass'];
        $socc = $_REQUEST['stu_occ'];

        $sql = "UPDATE tblStudent SET StudentId = '$sid', StudentName = '$sname', StudentEmail = '$semail', StudentPassword = '$spass', StudentConfirmPassword =  '$spass',StudentOccupation = '$socc' WHERE StudentId = '$sid'";

        if($conn -> query($sql) == TRUE){
            //below msg display on form submit success
            $msg = '<div class = "alert alert-success col-sm-6 ml-5 mt-2"
            role ="alert">Updated Successfully!</div>';
        }else{
            //below msg display on form submit failed
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"
            role = "alert">Unable to Update !</div>';
        }
        }
}


?>
 <div class="col-sm-6 mt-5 mx-3 jumbotron">
    <?php
    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM tblStudent WHERE StudentId={$_REQUEST['id']}";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }

    ?>
    <h3 class="text-center"> Update Student Detail</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">ID</label>
            <!-- value must be the those variable which are columns/fields in database -->
            <input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if(isset($row['StudentId'])){ echo $row['StudentId'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stu_name">Name </label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($row['StudentName'])){ echo $row['StudentName'];} ?>">
        </div>
        <div class="form-group">
            <label for="stu_Email">Email</label>
            <input type="email" class="form-control" id="stu_email" name="stu_email" value="<?php if(isset($row['StudentEmail'])){ echo $row['StudentEmail'];} ?>">
        </div>
        <div class="form-group">
            <label for="stu_pass">Password </label>
            <input type="text" class="form-control" id="stu_pass" name="stu_pass" value="<?php if(isset($row['StudentPassword'])){ echo $row['StudentPassword'];} ?>">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" id="stu_occ" name="stu_occ" value="<?php if(isset($row['StudentOccupation'])){ echo $row['StudentOccupation'];} ?>">
        </div>
        <div class="text-center">
            <button type="submit" class = "btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="students.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>      

</div>
</div>


<?php
include('./admininclude/footer.php');
?>