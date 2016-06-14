<?php
    require('../model/database.php');
    require('../model/record_db.php');
    
    if(isset($_GET['code'])){
        //echo $_GET['code'];
        $type = $_GET['code'];
        $typename = $_GET['name'];
        $score = 0;
        for($idx=0; $idx<10; $idx++){
            //echo "check = ".$_POST['checkopt_'.$idx];
            //echo "answer".$_POST['ans_'.$idx];
            if($_POST['checkopt_'.$idx] == $_POST['ans_'.$idx]){
                $score++;
            }
        }
        
        if($score < 8){
            $msg = "Unfortunately you did not pass the test. Please try again later!";
        }else {
            $msg = "You have successfully passes the test. You are now certified in ".$typename.".";
        }
        session_start();
        add_record($_SESSION['memberid'], $type, $score) ;
    }
    
?>
<?php include("../view/header.php") ?>

   <div id ="view">
   
    
<div id="quiz"> 

    <div id = "quizimage">
    <img src ="../images/<?php echo $type ?>.jpg" alt = "quizImage">
    </div>
       <div id = "question">
           <h1>Your score is <?php echo $score ?>/10</h1>
           <label><?php echo $msg ?></label><br /><br /><br /><br />
           <?php if ($score < 8) { ?>
               <input type="button" value="Retry" onclick="location.href='quiz_main.php?code=<?php echo $type ?>'">
           <?php } ?>
           <!--input type="submit" data-inline="true" value="Score Detail" data-theme="b"-->
        </div>
            
  </div>
  
  <?php include("../view/footer.php") ?> 

