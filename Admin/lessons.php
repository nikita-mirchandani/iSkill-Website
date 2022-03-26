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
<div class="col-sm-9 mt-5 mx-3">
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Course ID:</label>
            <input type="text" class="form-control ml-3" id="checkid" name="checkid">
        </div>
        <button type="submit" class="btn btn-danger">Search</button>
    </form>

    <?php
    $sql = "SELECT CourseId FROM tblCourse";
    $result=$conn->query($sql);
    $CourseFound= false;
    
    while($row = $result->fetch_assoc()){
                // else(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['CourseId']){
            if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['CourseId']){
                $CourseFound = true;
                    $sql = "SELECT * FROM tblCourse WHERE CourseId = {$_REQUEST['checkid']}";
                    $result=$conn->query($sql);
                    $row = $result->fetch_assoc();
                    if(($row['CourseId'])==$_REQUEST['checkid']){//keeping selected courseid and coursename in session for future use
                        $_SESSION['course_id'] = $row['CourseId'];
                        $_SESSION['course_name'] = $row['CourseName'];
                    ?>
                    <h3 class="mt-5 bg-dark text-white p-2">Course ID: <?php if(isset($row['CourseId'])) { echo $row['CourseId']; }?>
                        Course Name: <?php if(isset($row['CourseName'])) { echo $row['CourseName']; }?></h3>
                    <?php //showing lessons of searched course
                            $sql = "SELECT * FROM tblLesson WHERE CourseId = {$_REQUEST['checkid']}";
                            $result=$conn->query($sql);
                            echo '<table class="table">
                                    <thread>
                                    <tr>
                                        <th scope="col">Lesson ID </th>
                                        <th scope="col">Lesson Name</th>
                                        <th scope="col">Lesson Link</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thread>
                                <tbody>';
                        while($row = $result->fetch_assoc()){
                        echo '<tr>';
                        echo '<th scope="row">'.$row['LessonId'].'</th>';
                        echo '<td>'.$row['LessonName'].'</td>';
                        echo '<td>'.$row['LessonLink'].'</td>';
                        //    here form's data will be procedded in editlesson.php where we'll have the selected course's CourseId.
                        echo '<td><form action="editlesson.php" method="POST" class="d-inline">
                        <input type ="hidden" name="id" value='.$row["LessonId"].'>
                        <button
                                    type="submit"
                                    class="btn btn-info mr-3"
                                    name="view"
                                    value="View"
                                ><i class="fas fa-pen"></i></button>
                                </form>
                                <form action= "" method="POST" class="d-inline">
                                <input type ="hidden" name="id" value='.$row["LessonId"].'>
                                <button
                                    type="submit"
                                    class="btn btn-secondary"
                                    name="delete"
                                    value="Delete"
                                ><i class="fas fa-trash-alt"></i></button>
                                </form></td>
                                </tr>';
                            }
                    echo '</tbody>
                    </table>';

                        }
                    // else{
                    //     $CourseFound = false; 
                    //     echo '<div class="alert alert-dark mt-4 role="alert"> Lectures Not Found !</div>';
                    // }
                
                if(isset($_REQUEST['delete'])){
                    $sql = "DELETE FROM tblLesson WHERE LessonId = {$_REQUEST['id']}";
                    if($conn->query($sql) === TRUE){
                        echo '<meta http-equiv= "refresh" content="0;URL=?deleted" />';
                
                    }else{
                        echo 'Unable to Delete Data !';
                    }
                }
     
         }
         if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['CourseId']){
            $CourseFound = false; 
         }
    }
 if(isset($_REQUEST['checkid']) && $CourseFound == false){ 
         echo '<div class="alert alert-dark mt-4 role="alert"> Course Not Found !</div>';
 }
         
       
?>
</div>
<!-- plus symbol should only be visible when course-id is set (i.e if course is being search is found) -->
<?php
if(isset($_SESSION['course_id'])){
    echo '<div>
    <a href="./addLesson.php" class="btn btn-danger box">
    <i class="fas fa-plus fa-2x"></i></a>
    </div>';
}
?>

<?php
include('./admininclude/footer.php');
?>