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

?>

    <div class="col-sm-9 mt-5">
        <p class="bg-dark text-white p-2">List of Feedbacks </p>
        <?php
            $sql = "SELECT * FROM tblFeedback";
            $result = $conn->query($sql);
            if($result->num_rows >0){
                echo '<table class="table">
                <thread>
                    <tr>
                        <th scope="col">Feedback ID </th>
                        <th scope="col">Content </th>
                        <th scope="col">Student ID </th>
                        <th scope="col">Action </th>
                    </tr>
                </thread>
                <tbody>';
                while($row = $result->fetch_assoc()){
                    echo '<tr>';
                    echo '<th scope="row">' .$row["FeedbackId"]. '</th>';
                    echo '<td>' .$row["FeedbackContent"].'</td>' ;
                    echo '<td>' .$row["StudentId"]. '</td>';
                    echo '<td><form action="" method = "POST" class="d-inline"><input type="hidden" name="id" value='.$row["FeedbackId"].'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td></tr>';                  
                }

                echo '</tbody>
                </table>';
                
            } else {
                echo "0 result";
            }

            if(isset($_REQUEST['delete'])){
                $sql = "DELETE FROM tblFeedback WHERE FeedbackId ={$_REQUEST['id']}";

                if($conn->query($sql) === TRUE){
                    // below code will refresh the page after deleting the record
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                   }
                else{
                    echo '<div class="alert alert-danger col-sm-6 ml-5 mt-2 role = "alert" >Unable to Delete Data<div>';
                
                }
            }
            
            ?>
        </div>
    </div>
</div>
            

        


<?php
include('./admininclude/footer.php');
?>