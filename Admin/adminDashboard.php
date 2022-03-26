<!-- This module is being prepared by Krupal - 19ce092 -->

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

$sql = "SELECT * FROM tblCourse";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

$sql = "SELECT * FROM tblStudent";
$result = $conn->query($sql);
$totalstu = $result->num_rows;

$sql = "SELECT * FROM tblCourseOrder";
$result = $conn->query($sql);
$totalsold = $result->num_rows;
?>
<div class="col-sm-9 mt-5">
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Courses</div>
                <div class="card-body">
                    <h4 class="card-title">
                    <?php echo $totalcourse ; ?>
                    </h4>
                    <a class="btn text-white" href="courses.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Students</div>
                <div class="card-body">
                    <h4 class="card-title">
                    <?php echo $totalstu ; ?>
                    </h4>
                    <a class="btn text-white" href="students.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Sold</div>
                <div class="card-body">
                    <h4 class="card-title">
                    <?php echo $totalsold; ?>
                    </h4>
                    <a class="btn text-white" href="sellReport.php">View</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-5 mt-5 text-center">

        <!-- TABLE -->
        <p class=" bg-dark text-white p-2">Courses Ordered </p>
                  <?php
                $sql = "SELECT * FROM tblCourseOrder";
                $result = $conn->query($sql);

                if($result->num_rows > 0){
                    echo' 
                    <table class="table">
                    <thread>
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Course ID</th>
                            <th scope="col">Student Email</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Action</th>
                        </tr>
                    </therad>
                    <tbody>';

                    while($row = $result->fetch_assoc()){
                        echo '<tr>';
                        echo '<th scope="row"> '.$row["OrderId"].'</th>';
                        echo '<td>'.$row["CourseId"].'</td>';
                        echo '<td>'.$row["StudentEmail"].'</td>';
                        echo '<td>'.$row["OrderDate"].'</td>';
                        echo '<td>'.$row["Amount"].'</td>';
                        echo '<td><form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='.$row["CourseOrderId"].'><button type="submit" class="btn btn-secondry" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>';
                        echo '</tr>';
                    }
                    echo '</tbody>
                    </table>';
                } else {
                    echo "0 result";
                }
                
                if(isset($_REQUEST['delete'])){
                    $sql = "DELETE FROM tblCourseOrder WHERE CourseOrderId = {$_REQUEST['id']}";

                    if($conn->query($sql) === TRUE){
                        echo '<meta http-equiv="refresh" content= "0;URL=?deleted"/>';
                    }else{
                        echo "Unable to Delete Data";
                    }
                }
            ?>
                
        
            
    </div>
</div>
</div>
</div>

</div>
<!--div Row close from header-->
</div>
<!--div Container-fluid close from header-->
<?php
include('./admininclude/footer.php');
?>