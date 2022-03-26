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
    $stuId = $row["StudentId"];
    $stuName = $row["StudentName"];
    $stuOcc = $row["StudentOccupation"];
    $stuImg = $row["StudentImage"];    
}


if(isset($_REQUEST['updateStuNameBtn'])){
    if(($_REQUEST['stuName'] == "")|| ($_REQUEST['stuOcc'] == "")){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role = "alert" > Fill All Fields <div>'; 
    }else{
        $stuName = $_REQUEST['stuName'];
        $stuOcc = $_REQUEST['stuOcc'];
        $stu_image = $_FILES['uploadfile']['name'];
        $stu_image_temp = $_FILES['uploadfile']['tmp_name'];
        $img_folder = '../image/student/'.$stu_image;
        move_uploaded_file($stu_image_temp,$img_folder);

        $sql = "UPDATE tblStudent SET StudentName = '$stuName', StudentOccupation = '$stuOcc' , StudentImage ='$img_folder' WHERE StudentEmail = '$stuEmail' ";

        if($conn->query($sql)== TRUE){
            $passmsg = '<div class="alert alert-success" role="alert">Updated Successfully</div>';
        }else
        {
            $passmsg = '<div class="alert alert-primary" role="alert">Unable to Update</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5">
    <form method="POST" action="" class="mx-5"  enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId">Student Id</label>
            <input type="text" class="form-control" id="stuId" name="stuId" value ="<?php if(isset($stuId)){ echo $stuId;}?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuEmail">Email</label>
            <input type="email" class="form-control" id="stuEmail" value ="<?php if(isset($stuEmail)){echo $stuEmail;}?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuName">Name</label>
            <input type="text" class="form-control" id="stuName" name="stuName" value ="<?php if(isset($stuName)){ echo $stuName;}?>">
        </div>
        <div class="form-group">
            <label for="stuOcc">Occupation</label>
            <input type="text" class="form-control" id="stuOcc" name="stuOcc" value ="<?php if(isset($stuOcc)){ echo $stuOcc;}?>">
        </div>

        <div class="form-group">
            <label for="stuImg">Upload Image</label>
            <input type="file" name="uploadfile" value=""/>
            <!-- <input type="file" class="form-control-file" id="stuImg" name="stuImg"> -->
        </div>
        
        
            <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Update</button>
            <?php if(isset($passmsg)) { echo $passmsg;} ?>
        
    </form>
</div>

</div><!--Close Row Div From header file-->

<?php
    include('./stuInclude/footer.php');
?>

