<!-- This module is being prepared by Nikita-19ce076 -->
<?php 
if(isset($_POST['signup'])){
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
    $mail->addAddress($_POST['stuemail']);     // Add a recipient          
    $mail->addReplyTo(EMAIL);
 
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Verfication Email from iSkill-Online Education Website';
    $mail->Body    = '<b>You have successfully created your account in iSkill website</b>
                    <br />You can now login from your account and Explore new courses!<br / >
                        <br/> Thank You,
                        <br/> iSkill Team.';

    if(!$mail->send()) {
        echo '<div class="alert alert-warning" role="alert">Message could not be sent.</div>';
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo '<div class="alert alert-warning" role="alert">Message has been sent</div>';
    }
}
?>
<!-- Start Student Registration Form  -->
<form id="stuRegForm" action="" method="POST">
    <div class="form-group">
        <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label>
        <small id="statusMsg1"></small>
        <input type="text" class="form-control" placeholder="Name" name="stuname" id="stuname" value="">
    </div>    
    <div class="form-group">
        <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold">Email</label>
        <small id="statusMsg2"></small>
        <input type="email" class="form-control" placeholder="Email" name="stuemail" id="stuemail" value="">
        <small class="form-text">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">New Password</label>
        <small id="statusMsg3"></small>
        <input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass" value="" autocomplete="on">
    </div>
    <div class="form-group">
        <i class="fas fa-key"></i><label for="stucpass" class="pl-2 font-weight-bold">Confirm Password</label>
        <small id="statusMsg4"></small>
        <input type="password" class="form-control" placeholder="cPassword" name="cstupass" id="cstupass" value="" autocomplete="on">
    </div>
        <small class="form-text">We've sent a verification code to your email</small>
        <div>
        <input class="btn btn-primary" type="submit" id ="signup" value="Signup" name="signup" onclick="addStu()"><br><br>
</div>
</form>

<!-- End Student Registration Form  -->