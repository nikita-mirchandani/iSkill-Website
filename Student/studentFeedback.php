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

$sql = "SELECT * FROM tblStudent WHERE StudentEmail = '$stuEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $stuId = $row['StudentId'];   
}

if(isset($_REQUEST['submitFeedbackBtn'])){
    if(($_REQUEST['f_content'] == "")){
        $passmsg = '<div class="alert alert-warning col-sm-6  mt-2 role = "alert" > Fill All Fields !<div>'; 
    }else{
        $fcontent = $_REQUEST["f_content"];
        $sql = "INSERT INTO tblfeedback (FeedbackContent, StudentId) VALUES ('$fcontent' , '$stuId')";
        
        if($conn->query($sql)== TRUE){
            $passmsg= '<div class="alert alert-success col-sm-6  mt-2 role = "alert" >Submitted Successfully</div>';
        }else
        {
            $passmsg= '<div class="alert alert-danger col-sm-6  mt-2 role = "alert" >Unable to SUbmit</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5">
    <form action="" method="POST" class="mx-5"  enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId">Student Id</label>
            <input type="text" class="form-control" id="stuId" name="stuId" value ="<?php if(isset($stuId)){ echo $stuId;}?>" readonly>
        </div>
        <div class="form-outline mb-4">
        <label for="f_content"> Write Feedback: </label>
        <textarea class="form-control" id="f_content" 
            name="f_content" rows="3"></textarea>
        </div>
        <!-- <div class="form-group col-md-4">
            <label for="inputState">Select Enrolled Course</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>
            php code starts here 
                $sql = "SELECT CourseId FROM tblStudent WHERE StudentEmail = '$stuEmail'";
                $result = $conn->query($sql);
                if($result->num_rows == 1){
                    $row = $result->fetch_assoc();
                    $stuId = $row["stu_id"];   
                }
            php code ends here 
                </option>
            </select>
        </div> -->
        <button type="submit" class="btn btn-primary" name="submitFeedbackBtn">Submit</button>
        <?php if(isset($passmsg)) { echo $passmsg; } ?>
    </form>
</div>



<?php
    include('./stuInclude/footer.php');
?>