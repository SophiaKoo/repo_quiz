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
    	<h1>Database Error</h1>
            <p>There was an error connecting to the database.</p>
            <p>The database must be installed as described in the appendix.</p>
            <p>MySQL must be running</p>
            <p>Error message: <?php echo $error_message; ?></p>
            <p>&nbsp;</p>
 
</div>
</section>
  
<?php include("view/footer.php") ?> 

