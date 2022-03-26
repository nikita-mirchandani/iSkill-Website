<?php
if(!isset($_SESSION)){
    session_start();
}
include('./stuInclude/header.php');
include_once('../dbConnection.php');


if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['stuLogEmail'];
}else
{
    echo "<script> location.href='../index.php'; </script>";
}

if(isset($_REQUEST['stuPassUpdateBtn'])){
    if(($_REQUEST['stuNewPass'] == "")){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role = "alert" > Fill All Fields <div>'; 
    }else{

        $sql = "SELECT * FROM tblStudent WHERE StudentEmail = '$stuEmail'";
        $result = $conn->query($sql);
        if($result->num_rows ==1){
            
            $stu_pass=$_REQUEST['stuNewPass'];
            $sql = "UPDATE tblStudent SET StudentPassword = '$stu_pass',StudentConfirmPassword = '$stu_pass' WHERE StudentEmail = '$stuEmail'";

        if($conn->query($sql)== TRUE){
                $passmsg= '<div class="alert alert-success col-sm-6 ml-5 mt-2 role="alert" >Updated Successfully</div>';
            }else
            {
                $passmsg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2 role="alert">Unable Update</div>';
            }
        }
    }
}
?>

    <div class="col-sm-9 col-md-10">
        <div class="row">
            <div class="col-sm-6">
                <form class="mt-5 mx-5" method="POST">
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input class="form-control" type="email" id="inputEmail" value="<?php echo $stuEmail ?>" readonly>
                    </div>
                    <div>
                        <label for="inputnewpassword">New Password</label>
                        <input type="password" class="form-control" id="inputnewpassword" 
                        placeholder="New Password" name="stuNewPass">
                    </div>
        
                    <button type="submit" class="btn btn-primary mr-4 mt-4" name="stuPassUpdateBtn">Update</button>
                    <button type = "reset" class = "btn btn-secondary mt-4">Reset</button>
                    <?php if(isset($passmsg)) { echo $passmsg;} ?>
                </form>
            </div>
        </div>
    </div>
</div><!--Close Row Div from header file-->


<?php
    include('./stuInclude/footer.php');
?>