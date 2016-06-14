<?php include("../view/header.php") ?> 
<?php
    require('../model/database.php');
    require('../model/member_db.php');
    
    session_start();
    $member = get_member_by_id($_SESSION['memberid']);
    
    if(isset($_POST['email'])){
       
        //echo "submit_form";
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $addr = $_POST['addr'];
        $passwd = $_POST['passwd'];
        
           
        $rows = update_member($_SESSION['memberid'], $email, $passwd, $fname, $lname, $phone, $addr);
        //$rows = update_member(3, $email, $passwd, $fname, $lname, $phone, $addr);
        
        if($rows){
            //$msg = "saved successfully";
            $member = get_member_by_id($_SESSION['memberid']);
            session_start();
            $_SESSION['fname'] = $member['firstName'];
        echo "<script>alert('saved successfully');location.href='../account/account.php';</script>";
            
        }else{
            //include("../errors/error.php");
            echo "<script>location.href='../errors/error.php';</script>";
        }
    }
?>

<script>
    function validation(){
        if($('#passwd').val() != $('#cfmpasswd').val()){
            alert("passwords don\'t match");
            return;
        }
        
        $('#frm_change').submit();
    }
</script>

<div id ="view">
    

<div id="content">
        <form id="frm_change" action="" method="post">
            <fieldset>
                <legend>Change Information</legend>
                <label>First Name:</label>
                <input type="text" name="fname" id="fname" value="<?php echo $member['firstName']?>" required><br>
                <label>Last Name:</label>
                <input type="text" name="lname" id="lname" value="<?php echo $member['lastName']?>" required><br>
                <label>E-Mail:</label>
                <input type="text" name="email" id="email" value="<?php echo $member['email']?>" required><br>
                <label>Phone Number:</label>
                <input type="text" name="phone" id="phone" value="<?php echo $member['phone']?>" ><br>
                <label>Address:</label>
                <input type="text" name="addr" id="addr" value="<?php echo $member['address']?>" ><br>
                <label>Password:</label>
                <input type="password" name="passwd" id="passwd" value="<?php echo $member['passwd']?>" required><br>
                <label>Confirm Password:</label>
                <input type="password" name="cfmpasswd" id="cfmpasswd" value="<?php echo $member['passwd']?>" required><br>
                <?php if(isset($msg)) { ?>
                <p style="color:red; text-align: center"><?php echo $msg ?></p>
                <?php } ?>
                <br />
                <label>&nbsp;</label>
                <input type="button" value="Modify" onclick="validation()">
            </fieldset>
        </form>
    </div>
  
<?php include("../view/footer.php") ?> 
