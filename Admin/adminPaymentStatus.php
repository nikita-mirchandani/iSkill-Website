<?php
	
    include('../dbConnection.php');
    include('./admininclude/header.php');
     
    ?>
   
        <div class="container">
        <h2 class="text-center my-4">Payment Status</h2>
            <form method="post" action="">
                    <div class="form-group row">
                        <label class="offset-sm-3 col-form-label">Order ID:</label>
                        <div>
                            <input class="form-control mx-3" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off">
                        </div>
                        <div class="form-group mr-5">
                        <button type="submit" class="btn btn-primary" name="findpaymentstatus" type="submit">view</button></div>
                   
                    
            </form>
        </div>
<?php   

if(isset($_REQUEST['findpaymentstatus'])){
    if(($_REQUEST['ORDER_ID'] == "")){
        echo '<div class="alert alert-warning role = "alert" >Order Id must not be empty! <div>'; 
    }
    else
    {
        $ORDER_ID = $_REQUEST['ORDER_ID'];

        $sql = "SELECT * FROM tblCourseOrder WHERE OrderId = '$ORDER_ID'";
        
        $result = $conn->query($sql);
          
        if($result-> num_rows <= 0){
              echo '<div class="alert alert-warning role = "alert" >Order Id Doesn\'t Match! <div>'; 
        }

        if($result-> num_rows > 0){
            while($row = $result->fetch_assoc()){
     ?>

        <div class="justify-content-center mt-12">
           <div class="col-auto">
               <h2 class="text-center">Payment Receipt</h2>
               <table class="table table-bordered">
                <tbody>
                <?php
                echo '<tr>
                <td><label> Order ID : </label></td>
                <td >' .$row['OrderId']. '</td>
                </tr>';

                echo '<tr>
                <td><label> StudentEmail: </label></td>
                <td > '. $row['StudentEmail'] .' </td>
                </tr>';

                echo '<tr>
                <td><label> CourseId: </label></td>
                <td >'. $row['CourseId']. '</td>
                </tr>';

                echo '<tr>
                <td><label> Status: </label></td>
                <td > '. $row['Tstatus'].' </td>
                </tr>';
                
                echo '<tr>
                <td><label> ResponseMessage: </label></td>
                <td > '.$row['ResponseMessage'] .'</td>
                </tr>';


                echo '<tr>
                <td><label> Amount: </label></td>
                <td >'.  $row['Amount'] .'</td>
                    </tr>';

                echo '<tr>
                <td><label> OrderDate: </label></td>
                <td > '.  $row['OrderDate'].' </td>
                </tr>';

             }
            
                ?>
           
                <td><button class="btn btn-primary" type="button" onClick="javascript:window.print();">Print</button></td>
            </tbody>
            </table>  
            </div>
        </div>
        <?php 
        } 
    }
}

include('./admininclude/footer.php');
?>
  