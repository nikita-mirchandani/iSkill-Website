// check if same email exists in db
$(document).ready(function(){
    //Ajax call form already exists email verification
    $("#stuemail").on("keypress blur",function(){
        var stuemail = $("#stuemail").val();
        $.ajax({
            url:'addstudent.php',
            method:'POST',
            data:{
                checkemail : "checkmail",
                stuemail:stuemail,
            },
            success : function(data){
                console.log(data);
                if(data != 0){
                    $('#statusMsg2').html(
                        '<small style="color:red;">Email Id Already in Use !</small>'
                    ); 
                    //also disable the button
                    $("#signup").attr("disabled",true); 
                }
            },
        });
    });
});



function addStu(){
    var reg = /^[A-Z0-9._%+=]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var ch = /.@/;
    var stuname = $("#stuname").val(); //taking id from signup form from footer.php
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();
    var cstupass = $("#cstupass").val();


    // Validate password strength
    var error = "Password must use a combination " + 
    "of these:<br />I.Atleast 1 upper case letters (A – Z)" + 
    "<br />II.Lower case letters (a – z)<br />III." + 
    "Atleast 1 number (0 – 9)<br />IV.Atleast 1 " + 
    "non-alphanumeric symbol (e.g. @ ‘$%£!’)";
            
    // Checking Form Fields on Form Submission
    if(stuname.trim() == ""){
        $("#statusMsg1").html(
            '<small style="color:red;">Please Enter Name !</small>'
        );
        $('#stuname').focus();
        return false;
    }  else if(!reg.test(stuemail)){
        $('#statusMsg2').html(
            '<small style="color:red;">Please Enter Valid Email e.g. example@gmail.com</small>'
        );
        $('#stuemail').focus();
        return false;
    }else if(stuemail.trim() == ""){
        $('#statusMsg2').html(
            '<small style="color:red;">Please Enter Email !</small>'
        );
        $('#stuemail').focus();
        return false;
    }
    else if (!((ch).test(stuemail))){
        $('#statusMsg2').html(
            '<small style="color:red;">Please Enter Valid Email e.g. example@gmail.com</small>'
        );
        $('#stuemail').focus();
        return false;
    }
   else if(stupass.trim() == ""){
        $('#statusMsg3').html(
            '<small style="color:red;">Please Enter new Password !</small>'
        );
        $('#stupass').focus();
        return false;
    }else if(cstupass.trim() == ""){
        $('#statusMsg4').html(
            '<small style="color:red;">Please Enter Confirm Password !</small>'
        );
        $('#cstupass').focus();
        return false;
    }else if(stupass.trim() != cstupass.trim()){
        $('#statusMsg4').html(
            '<small style="color:red;">New Password and Confirm password doesn\'t match</small>'
        );
        $('#cstupass').focus();
        return false;
    }
    else{
        $.ajax({
            url:'addstudent.php',
            method:'POST',
            dataType: "json",
            data:{
                stuname:stuname,
                stuemail:stuemail,
                stupass:stupass,
                cstupass: cstupass,
            },
            success:function(data){
                // console.log(data);
                if(data == "OK"){
                    $('#successMsg').html("<span class='alert alert-success'>Registration Successful !</span>");
                    clearStuRegField();
                    jQuery('#stuRegForm').trigger('reset');
                }else if(data == "Failed"){
                    $('#successMsg').html("<span class='alert alert-failed'>Registration Failed !</span>");
                    jQuery('#stuRegForm').trigger('reset');

                }
            }

        })
    }

}
function close(){
    $.ajax({
        success:function(){
            jQuery('#stuRegForm').trigger('reset');
            document.getElementById("stuRegForm").reset();
        },
    }); 
}
// Empty All Fields
function clearStuRegField(){
    $("#stuRegForm").trigger("reset");
    $("#stautsMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
    $("#statusMsg4").html(" ");
    // $("#successMsg").html("");
}

// Ajaz call for students Login verificatiom
function checkStuLogin(){
    var stuLogEmail = $("#stuLogemail").val();
    var stuLogPass = $("#stuLogpass").val();

    $.ajax({
        url: 'addstudent.php' ,
        method: "POST",
        data:{
            checkLogemail: "checklogmail",
            stuLogEmail: stuLogEmail,
            stuLogPass: stuLogPass,
        },
        success:function(data){
            console.log(data);
            if(data == 0){
                $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email Id or Password ! </small>');

            }else if(data == 1) {
                //progressbar and then move to index.php
                $("#statusLogMsg").html('<div class="spinner-border text-success role="status"></div>');
                setTimeout( () =>{
                    window.location.href = "index.php";
                }, 1000); //after 1 sec
            }

        },
    }); 
}
$(function () {
        $("#stupass").bind("keyup", function () {
          
            //Regular Expressions.
            var regex = new Array();
            regex.push("[A-Z]"); //Uppercase Alphabet.
            regex.push("[a-z]"); //Lowercase Alphabet.
            regex.push("[0-9]"); //Digit.
            regex.push("[$@$!%*#?&]"); //Special Character.
 
            var passed = 0;
 
            //Validate for each Regular Expression.
            for (var i = 0; i < regex.length; i++) {
                if (new RegExp(regex[i]).test($(stupass).val())) {
                    passed++;
                }
            }
 
 
            //Validate for length of Password.
            if (passed > 2 && $(stupass).val().length > 8) {
                passed++;
            }
 
            //Display status.
            var color = "";
            var strength = "";
            switch (passed) {
                case 0:
                case 1:
                    strength = "Weak";
                    color = "red";
                      //also disable the button
                      $("#signup").attr("disabled",true); 
                    break;
                case 2:
                    strength = "Good";
                    color = "darkorange";
                      //also disable the button
                      $("#signup").attr("disabled",true); 
                    break;
                case 3:
                case 4:
                    strength = "Strong";
                    color = "green";
                    $("#signup").attr("disabled",false);
                    break;
                case 5:
                    strength = "Very Strong";
                    color = "darkgreen";
                    $("#signup").attr("disabled",false); 
                    break;
            }
            $('#statusMsg3').html(strength);
            $('#statusMsg3').css("color", color);
        });
    });
