<?php
include_once('../dbConnection.php');

// checking email already registered

if(isset($_POST['checkemail']) && isset($_POST['stuemail'])){
    $stuemail = $_POST['stuemail'];
    $sql = "SELECT StudentEmail FROM tblStudent WHERE StudentEmail = '".$stuemail."'";
    $result = $conn -> query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}

//Insert student
if(isset($_POST['stuname']) && isset($_POST['stuemail']) 
&& isset($_POST['stupass']) && isset($_POST['cstupass'])){
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = $_POST['stupass'];
    $stucpass = $_POST['cstupass'];
    $sql = "INSERT INTO `tblStudent` (`StudentName`, `StudentEmail`, `StudentPassword`,`StudentConfirmPassword`) VALUES 
   ('$stuname','$stuemail','$stupass','$stucpass')";
    
    if($conn->query($sql)){
        echo json_encode("OK");
    }
    else{
        echo json_encode("Failed");
    }
}
?>