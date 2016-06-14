<?php
    require('../model/database.php');
    require('../model/record_db.php');
    
    session_start();
    $records = get_record($_SESSION['memberid']);
    
    
?>
<?php include("../view/header.php") ?> 

   <div id ="view">

    
<div id="history"> 
<table>
  <tr>
    <td>No.</td>
    <td>Time</td>
    <td>Section</td>
    <td>Score</td>
  </tr>
          <?php if(!$records) {?>
          <tr><td colspan="4" style="text-align: center">NO RECORD</td></tr>
            <?php } ?>
        <?php foreach($records as $idx => $record) { ?>
        <tr>
          <td><?php echo $idx+1 ?></td>
          <td><?php echo $record['regDate']?></td>
          <td><?php echo $record['quizName'] ?></td>
          <td><?php echo $record['quizScore'] ?></td>
        </tr>
          <?php } ?>
      
    </table>
  </div>
  
  <?php include("../view/footer.php") ?> 
