<?php include("../view/header.php") ?> 

<div id ="view">

    
<div id="selectquiz"> 
    <div>
        <br /><br /><br />
    <label>Welcome <?php echo $_SESSION['fname'] ?></label>
    <label>Select Quiz</label>
    </div>
    <div id = "image1">
        <a href="quiz_main.php?code=FM"><input type="submit" name="action" value="finance" ></a>
    <!--<img src ="images/english.jpg" alt = "English">-->
    </div>
    <div id = "image2">
        <a href="quiz_main.php?code=EG"><input type="submit" name="action" value="english"/></a>
    <!--<img src ="images/finance.jpg" alt = "finance">-->
    </div>
    
</div>
   
  <?php include("../view/footer.php") ?> 