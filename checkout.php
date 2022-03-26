
<?php

include('./dbConnection.php');
session_start();

if(!isset($_SESSION['stuLogEmail'])){
    echo "<script> location.href= 'loginsignup.php' </script>";
} else {
    header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
    $stuEmail = $_SESSION['stuLogEmail']
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="GENERATOR" content="Evrsoft First Page">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


        <!-- Google Font (ubuntu bold) -->
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

         
        <!-- Custom CSS -->
        <link rel = "stylesheet" href="css/style.css"></link>
        <title>Checkout</title>

    </head>
    <body>

    <div class="container">
        <div class="row">
        <div class="col-sm-6 mt-14 offset-sm-3 jumbotron">
        <h3 class="mb-5">Welcome To iSkill Payment Page</h3>    
    <form method="post" action="./pgRedirect.php">
		<div class="form-group row">
            <label for="ORDER_ID" class="col-sm-4 col-form-label">ORDER ID</label>
            <div class="col-sm-8">
            <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS". rand(10000,99999999)?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="CUST_ID" class="col-sm-4 col-form-label">Student Email</label>
                <div class="col-sm-8">
                <input id="CUST_ID" tabindex="2" class="form-control" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php if(isset($stuEmail)){echo $stuEmail;}?>"  readonly>   
                </div>
            </div>
            <div class="form-group row">
                <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
                <div class="col-sm-8">
                <input class="form-control" type="text" title="TXN_AMOUNT" id="TXN_AMOUNT" tabindex="10" name="TXN_AMOUNT"
				value="<?php if(isset($_POST['id'])){ echo $_POST['id']; }?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-8">
                <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8">
                <input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
                </div>
            </div>
            <div class="text-center">
                <input value="CheckOut" type="submit" class="btn btn-primary"	onclick="">
                <a href="" class="btn btn-secondary">Cancel</a>
            </div>
    </form>

    <small class="form-text text-muted">Note : Complete Payment by Clicking Checkout Button</small>
</div>
</div>
</div>



				
	</form>
    </body>
    </html>

    <?php
}

?>