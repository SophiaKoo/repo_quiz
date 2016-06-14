<?php
    require('../model/database.php');
    require('../model/member_db.php');
    
    session_start();
    $member = get_member_by_id($_SESSION['memberid']);
    /*
    if(isset($_POST['submit'])){
        //echo "submit_form";
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $addr = $_POST['addr'];
           
        $rows = update_member_info($_SESSION['memberid'], $email, $fname, $lname, $phone, $addr);
        
        if($rows){
            $msg = "saved successfully";
            $member = get_member_by_id($_SESSION['memberid']);
        }else{
            include("../errors/error.php");
        }
    }*/
?>

<script>
    $('#btnSubmit').click(function(){
        alert( "click" );
        return;
    });
</script>

<?php include("../view/header.php") ?> 

   <div data-role="main" class="ui-content" style="clear: both">
    <h3>Password Change</h3>
  	<div data-role="fieldcontain" class="ui-hide-label"	>
            <form method="post" action="" id="frm">
            <fieldset data-role="controlgroup" style="padding: 10px; border: 3px solid #75AE18; border-radius:15px">
		<input type="text" style="margin-bottom: 5px" name="oldpass" id="fname" value="" placeholder="Old Password"/>
		<input type="text" style="margin-bottom: 5px" name="newpass" id="lname" value="" placeholder="New Password"/>
		<input type="text" style="margin-bottom: 5px" name="confirm" id="sign_email" value="" placeholder="Confrim Password"/>
					
		<input type="button" id="btnSubmit" name="btnSubmit" value="Submit" data-theme="b" class="ui-corner-all"/>
            </fieldset>
            </form>
	</div>
  </div>
  
<?php include("../view/footer.php") ?> 