
<!-- This module is being prepared by Kesha - 19ce073 -->

<?php
include('./maininclude/header.php');

if(isset($_POST['submit'])){
    require 'PHPMailer/class.phpmailer.php';
    require 'PHPMailer/class.smtp.php';
    require 'PHPMailerAutoload.php';
    require 'credential.php';
      
$mail = new PHPMailer;

    $mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                 // SMTP username
    $mail->Password = PASS;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom(EMAIL, 'iSkill Website');
    $mail->addAddress($_POST['email']);     // Add a recipient
                
    $mail->addReplyTo(EMAIL);
 
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Query Email To iSkill-Online Education Website From '.$_POST['name'];
    $mail->Body    = $_POST['subject'];

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
?>

<div class="container" style="margin-top:100px">
 <!-- Start Contact Us-->
 <div class="container mt-4" id="Contact"><!-- Start Contact Us Container -->
    <h2 class="text-center mb-4">Contact Us</h2><!-- Contact Us Heading-->
        <div class="row"><!-- start Contact Us row-->
        <div class="col-md-8"><!-- Start Contact Us 1st column-->
            <form action="" method="post">
                <input type="text" class="form-control" name="name" placeholder="Name"><br>
                <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                <input type="email" class="form-control" name="email" placeholder="E-mail"><br>
                <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px;"></textarea><br>
                <input class="btn btn-primary" type="submit" value="Send" name="submit" ><br><br>
            </form>
        </div><!--End Contact Us 1st Column-->
        
        <div class="col-md-4 stripe text-white text-center"><!-- Start Contact Us 2nd Column-->
            <h4>iSkill</h4>
            <p>iSkill,
            CHARUSAT Campus Off. Nadiad-Petlad Highway,
            Changa 388 421 <br />
            Anand, Gujarat, INDIA<br /> 
            Telephone: 02697-265011<br /> 
            Email: info@charusat.ac.in</p>
        </div><!-- End Contact Us 2nd column-->
    </div><!--End Contact Us row-->         
</div><!--End Contact Us Container-->

</a>
<!--End Contact Us -->
</div> 
