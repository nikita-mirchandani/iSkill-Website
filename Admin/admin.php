
<?php
if(!isset($_SESSION)){
    //if session isn't start , start it.
    session_start();
}
include_once('../dbConnection.php');


// Admin login Verification
//if not login then login would be possible 
if(!isset($_SESSION['is_admin_login'])){
    if(isset($_POST['checkLogemail']) && isset($_POST['adminLogEmail']) && isset($_POST['adminLogPass'])){
        $adminLogEmail = $_POST['adminLogEmail'];
        $adminLogPass = $_POST['adminLogPass'] ;

        $sql = "SELECT AdminEmail, AdminPassword FROM tblAdmin Where AdminEmail = '".$adminLogEmail."' AND AdminPassword='".$adminLogPass."'";

        $result = $conn->query($sql);

        $row = $result->num_rows;

        if($row === 1){
            //after successful login, this session will be created and can be used anywhere
            $_SESSION['is_admin_login'] = true;
            $_SESSION['adminLogEmail'] = $adminLogEmail ;
            echo json_encode($row);

        }else if($row === 0){
            echo json_encode($row);
        }
    }
}
?>