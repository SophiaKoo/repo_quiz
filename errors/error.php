<!DOCTYPE html>
<html>
    <!-- the head section -->
    <head>
        <title>Pearl Quiz</title>
        <link rel="stylesheet" type="text/css" href="../styles/main.css" />
    </head>

    <!-- the body section -->
    <body>
    <div id="page">
        <div id="header">
            <a href="../index.php"><img src ="../images/title2.png"></a>
        </div>
<div id ="view" style="height:300px">

<section>
<div id="content">
    	<h3>Error</h3>
        <p><?php echo $error; ?></p>
        <?php if(!isset($_SESSION['fname'])) {?>
        <a href="../index.php"> Log In</a>
        <?php } ?>
 
</div>
</section>
  
<?php include("../view/footer.php") ?> 
