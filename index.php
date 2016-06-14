<!DOCTYPE html>
<html>
    <!-- the head section -->
    <head>
        <title>Pearl Quiz</title>
        <link rel="stylesheet" type="text/css" href="styles/main.css" />
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    </head>

    <!-- the body section -->
    <body>
    <div id="page">
        <div id="header">
            <img src ="images/title2.png">
        </div>
<div id ="view">
<?php
    require('model/database.php');
    require('model/quiztype_db.php');
    require('model/member_db.php');
    
    $quizTypes = get_quiztypes();
    
    if(isset($_POST['action'])){
        $action = $_POST['action'];
    
        if($action == "get_member"){
            //echo "in get member";
            $member = get_member($_POST['email'], $_POST['passwd']);
            //echo $member[memberID];

            if (! $member){ //FAIL
                //echo "not member";
                //$errmsg = "The email and password you entered did not match our records.";
                echo "<script>alert('The email and password you entered did not match our records.');</script>";
            
            }else{
                session_start();
                $_SESSION['fname'] = $member['firstName'];
                $_SESSION['memberid'] = $member['memberID'];
                //header("Location: account/account.php");
                echo "<script>location.href='account/account.php';</script>";
                //echo "is member";
                //exit();
                //echo "<script>window.location.replace(account/account.php);</script>";
            }
        }else if ($action == 'add_member') {
            //echo "in add member";
            $email = $_POST['email'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone = $_POST['phone'];
            $addr = $_POST['addr'];
            $passwd = $_POST['passwd'];
            //echo $email;
            // Validate the inputs
            if (empty($email) || empty($fname) || empty($lname) || empty($passwd)) {
                $error = "Invalid data. Check all fields and try again.";
                header("Location: errors/error.php");
            } else {
                $member = get_member_by_email($email);
                if($member){
                    echo "<script>alert('Already your email was signuped.');</script>";
                }else{
                    $row = add_member($email, $passwd, $fname, $lname, $phone, $addr);
                    //echo $row['firstName'];

                    if ($row <= 0) {
                        //header("Location: errors/error.php");
                        echo "<script>location.href='errors/error.php';</script>";
                    } else {
                        $member = get_member($email, $passwd);
                        session_start();
                        $_SESSION['fname'] = $member['firstName'];
                        $_SESSION['memberid'] = $member['memberID'];
                        //header("Location: account/account.php");
                        echo "<script>location.href='account/account.php';</script>";
                    }
                }
            }
        }
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
        
        if($action == "logout"){
            session_start();
            // remove all session variables
            session_unset(); 

            // destroy the session 
            session_destroy(); 

        }
    }
?>
<script>
    
    function validation(){
        if($('#fname').val() == ""){
            alert("Please enter First Name");
            $('#fname').focus();
            return;
        }else if($('#lname').val() == ""){
            alert("Please enter Last Name");
            $('#lname').focus();
            return;
        }else if($('#email_new').val() == ""){
            alert("Please enter E-Mail");
            $('#email_new').focus();
            return;
        }else if (!validateEmail($('#email_new').val())) {
            alert("Invalid email format");
            $('#email_new').focus();
            return;
        }else if ($('#phone').val() != '' && !validatePhone($('#phone').val())) {
            alert("Invalid phone number format");
            $('#phone').focus();
            return;
        }else if($('#passwd_new').val() == ""){
            alert("Please enter Password");
            $('#passwd_new').focus();
            return;
        }else if($('#cfmpasswd_new').val() == ""){
            alert("Please enter Confirm Password");
            $('#cfmpasswd_new').focus();
            return;
        }else if($('#passwd_new').val() != $('#cfmpasswd_new').val()){
            alert("passwords don\'t match");
            return;
        }
        
        $("#frm_signup").submit();
    }
    
    function validateEmail(email) 
    { 
        var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
        if (reg.test(email)){
            return true; 
        }else{
            return false;
        } 
    } 
    
    function validatePhone(phone) 
    { 
        var reg = /^\\+[0-9]{1,16}|^[0-9]{1,4}-[0-9]{1,4}-[0-9]{4}|^\\d{1,16}$/;
        if (reg.test(phone)){
            return true; 
        }else{
            return false;
        } 
    } 
</script>   
<aside>
    <label>
        Hyunjoo &AMP;Youngjin's Quiz
    </label>
    
    
</aside>
<section>
<div id="content">
        <form action="" method="post">
            <fieldset>
                <legend>Log In</legend>
                <input type="hidden" name="action" value="get_member" />
                <label>E-Mail:</label>
                <input type="text" name="email" id="email" value="" required/>
                <label>Password:</label>
                <input type="password" name="passwd" id="passwd" required/>
                <?php if (isset($errmsg)) { ?>
                    <span style="color: blue; padding-left: 10px "><?php echo $errmsg ?></span>
                <?php } ?>
                <br />
                <br />
                <label>&nbsp;</label>
                <input type="submit" name="login" value="Log In"/>
            </fieldset>
        </form>
        <form action="" method="post" id="frm_signup">
            <fieldset>
                <legend>Sign Up</legend>
                <input type="hidden" name="action" value="add_member" />
                <label>First Name:</label>
                <input type="text" name="fname" id="fname" value="" required/>
                <label>Last Name:</label>
                <input type="text" name="lname" id="lname" value="" required/>
                <label>E-Mail:</label>
                <input type="text" name="email" id="email_new" value="" required/>
                <label>Phone Number:</label>
                <input type="text" name="phone" id="phone" value="" />
                <label>Address:</label>
                <input type="text" name="addr" id="addr" value=""/>
                <label>Password:</label>
                <input type="password" name="passwd" id="passwd_new" value="" required/>
                <label>Confirm Password:</label>
                <input type="password" name="cfmpasswd" id="cfmpasswd_new" value="" required/>
                <br />
                <br />
                <label>&nbsp;</label>
                <!--input type="submit" name="submit" value="Sign Up" data-theme="f"  class="ui-corner-all"/-->
                <input type="button" value="Sign Up" onclick="validation()"/>

            </fieldset>
        </form>

    </div>
</section>
  
<?php include("view/footer.php") ?> 
    
