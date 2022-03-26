
<!-- This module is being prepared by Nikita - 19ce076 -->

<?php
include("./dbConnection.php");
session_start();
$ORDER_ID = $_POST["ORDER_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];
$STATUS = "TXN_SUCCESS";
if ($STATUS == "TXN_SUCCESS") {
    echo "<b>Transaction status is success</b>" . "<br/>";

    if(isset($_POST['ORDER_ID']) && isset($_POST['TXN_AMOUNT'])){
        $order_id = $_POST['ORDER_ID'];
        $stu_email = $_SESSION['stuLogEmail'];
        $course_id = $_SESSION['course_id'];
        $status = "TXN SUCCESS";
        $respmsg = "Txn success";
        $amount = $_POST['TXN_AMOUNT'];
        $date = $date = date('Y/m/d H:i:s');

        $sql = "INSERT INTO tblCourseOrder(OrderId, StudentEmail, CourseId, Tstatus, ResponseMessage ,Amount, OrderDate) VALUES ('$order_id','$stu_email','$course_id','$status','$respmsg','$amount','$date')";

        if($conn->query($sql) == TRUE){
            echo "Redirecting to My Profile......";
            echo "<script> setTimeout(() => {window.location.href = './Student/myCourse.php';}, 1500); </script>";
        
        }else{
            echo "not done!";
        }
    }

}
else {
    echo "<b>Transaction status is failure</b>" . "<br/>";
}

?>