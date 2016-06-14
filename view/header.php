<?php
clearstatcache();
session_start();
$username = $_SESSION['fname'];
//echo $username;
if(!isset($username)){
    $error = "You need to login";
    //include('../errors/error.php');
    header("Location: ../errors/error.php");
}   
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
    <head>
        <title>Pearl Quiz</title>
        <link rel="stylesheet" type="text/css" href="../styles/main.css" />
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    </head>

    <!-- the body section -->
    <body>
    <div id="page">
        <div id="header">
            
              <nav id="nav"> 
                 <?php if(!strrpos($_SERVER["REQUEST_URI"],"account.php")) { ?>
                  <a href="../account/account.php"><img src ="../images/title2.png"></a>
                 <?php } ?>
                  <a href="../account/info_change.php" class="icon icon-user active" id = "user"><span><?php echo $username ?></span></a> 
                  <a href="../account/record.php"><img src="../images/Books.png" id = "icon" alt = "Record"></a>
                  <a href="../index.php?action=logout"><img src="../images/logout.png" id = "icon" alt = "Log out"></a>
                    
              </nav>
        </div>