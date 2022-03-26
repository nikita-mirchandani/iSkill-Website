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
?>


<div class="col-sm-9 mt-5">
    <!-- Table-->
    <p class="bg-dark text-white p-2">List of Students</p>
    <?php
        $sql = "SELECT * FROM tblStudent";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
      ?>
    <table class="table">
        <thread>
            <tr>
                <th scope="col">Student ID </th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thread>
        <tbody>
            <?php while($row = $result->fetch_assoc()){
           echo '<tr>';
           echo '<th scope="row">'.$row['StudentId'].'</th>';
           echo '<td>'.$row['StudentName'].'</td>';
           echo '<td>'.$row['StudentEmail'].'</td>';
           echo '<td>';
        //    here form's data will be procedded in editcourse.php where we'll have the selected course's CourseId.
           echo '<form action="editstudent.php" method="POST" class="d-inline">
           <input type ="hidden" name="id" value='.$row["StudentId"].'>
           <button
                    type="submit"
                    class="btn btn-info mr-3"
                    name="view"
                    value="View"
                >
                <i class="fas fa-pen"></i>
                </button>
                </form>
                <form action= "" method="POST" class="d-inline">
                <input type ="hidden" name="id" value='.$row["StudentId"].'>
                <button
                    type="submit"
                    class="btn btn-secondary"
                    name="delete"
                    value="Delete"
                >
                <i class="fas fa-trash-alt"></i>
                </button>
                </form>';
               echo '</td>
                </tr>';
             } ?>
</tbody>
</table>
<?php } else{
    echo "0 Result !";
}

if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM tblStudent WHERE StudentId = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv= "refresh" content="0;URL=?deleted" />';

    }else{
        echo 'Unable to Delete Data !';
    }
}

?>
</div>
</div>

<!-- div Row close from header -->
<div>

<a class="btn btn-danger box" 
href="./addnewstudent.php"><i class="fas fa-plus fa-2x"></i></a>
</div>
</div>

<!-- div container-fluid close from header -->

<?php
include('./admininclude/footer.php');
?>