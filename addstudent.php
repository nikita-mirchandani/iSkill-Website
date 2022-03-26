
<?php
if(!isset($_SESSION)){
    //if session isn't start , start it.
    session_start();
}
include_once('./dbConnection.php');

// checking email already registered

if(isset($_POST['checkemail']) && isset($_POST['stuemail'])){
    $stuemail = $_POST['stuemail'];
    $sql = "SELECT StudentEmail FROM tblStudent WHERE StudentEmail = '".$stuemail."'";
    $result = $conn->query($sql);
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
//student login Verification
//if not login then login would be possible 
if(!isset($_SESSION['is_login'])){
    if(isset($_POST['checkLogemail']) && isset($_POST['stuLogEmail']) && isset($_POST['stuLogPass'])){
        $stuLogEmail = $_POST['stuLogEmail'];
        $stuLogPass = $_POST['stuLogPass'] ;

        $sql = "SELECT StudentEmail, StudentPassword FROM tblStudent Where StudentEmail = '".$stuLogEmail."' AND StudentPassword='".$stuLogPass."'";

        $result = $conn->query($sql);

        $row = $result->num_rows;

        if($row === 1){
            //after successful login, this session will be created and can be used anywhere
            $_SESSION['is_login'] = true;
            $_SESSION['stuLogEmail'] = $stuLogEmail ;
            echo json_encode($row);

        }else if($row === 0){
            echo json_encode($row);
        }
    }
}
?>