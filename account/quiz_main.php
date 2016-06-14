<?php
    require('../model/database.php');
    require('../model/quiztype_db.php');
    require('../model/quizdetail_db.php');
    
    if (isset($_GET['code'])) {

    $quizCode = $_GET['code'];
    $quizType = get_quiztype($quizCode);
    $quizDetails = get_quizdetail($quizCode);

    $num = 0;
    //echo $num;
    }
    
    function addBr($str){
        /*if(strlen($str) > 50){
            echo substr_replace($str, '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 50, 0);
            //echo $tmp.subtr($str, 35);
        }else{*/
            echo $str;
        //}
    }
?>

<?php include("../view/header.php") ?> 

<script>
    
    var num = 0;
    $(document).ready(function() {
        $("#quiz_main_0").show();
    });
    
    function next_click(){
        if($("#ans1_"+num).is(":checked")){
            $("#checkopt_"+num).val("1");
        }else if($("#ans2_"+num).is(":checked")){
            $("#checkopt_"+num).val("2");
        }else if($("#ans3_"+num).is(":checked")){
            $("#checkopt_"+num).val("3");
        }else if($("#ans4_"+num).is(":checked")){
            $("#checkopt_"+num).val("4");
        }else{
            alert("select answer");
            return;
        }
        //$("#radio_1").attr('checked', 'checked');
        
        $("#quiz_main_"+num).hide();
        num=num+1;
        $("#quiz_main_"+num).show();
    }
    
    function finish_click(){
        next_click();
        $("#frm_final").submit();
    }
    
    function prev_click(){
        $("#quiz_main_"+num).hide();
        num=num-1;
        $("#quiz_main_"+num).show();
        
        if($("#checkopt_"+num).val() == "1"){
            $("#ans1_"+num).attr('checked', 'checked');
        }else if($("#checkopt_"+num).val() == "2")
            $("#ans2_"+num).attr('checked', 'checked');
        else if($("#checkopt_"+num).val() == "3")
            $("#ans3_"+num).attr('checked', 'checked');
        else if($("#checkopt_"+num).val() == "4")
            $("#ans4_"+num).attr('checked', 'checked');
    }
    
    
</script>

<div id ="view">
   
    
<div id="quiz"> 

    <div id = "quizimage">
    <img src ="../images/<?php echo $quizCode ?>.jpg" alt = "quizImage">
    </div>
    <form method="post" id="frm_final" action="quiz_final.php?code=<?php echo $quizCode ?>&name=<?php echo $quizType['quizName'] ?>">
        <?php foreach ($quizDetails as $idx => $quizDetail) { ?>
            <div id="quiz_main_<?php echo $idx ?>" style="display:none">
                <div id = "question">
                    <h2>Question <?php echo $idx + 1 ?>.</h2>
                    <label><?php echo $quizDetail['quizQuest'] ?></label><br /><br />
                    <input type="hidden" name="num" id="num_<?php echo $idx ?>" value="<?php echo $idx ?>">
                    <input type="hidden" name="no" value="<?php echo $quizDetail['quizNo'] ?>">
                    <input type="hidden" name="ans_<?php echo $idx ?>" value="<?php echo $quizDetail['quizAns'] ?>">
                    <input type="hidden" name="checkopt_<?php echo $idx ?>" id="checkopt_<?php echo $idx ?>" value="0">

                    <div id = "options">
                        <input type="radio" name="quizopt_<?php echo $idx ?>" id="ans1_<?php echo $idx ?>" value="1"><?php echo addBr($quizDetail['quizOpt1']) ?></span><br>
                        <input type="radio" name="quizopt_<?php echo $idx ?>" id="ans2_<?php echo $idx ?>" value="2"><?php echo addBr($quizDetail['quizOpt2']) ?><br>
                        <input type="radio" name="quizopt_<?php echo $idx ?>" id="ans3_<?php echo $idx ?>" value="3"><?php echo addBr($quizDetail['quizOpt3']) ?><br>
                        <input type="radio" name="quizopt_<?php echo $idx ?>" id="ans4_<?php echo $idx ?>" value="4"><?php echo addBr($quizDetail['quizOpt4']) ?><br><br>	
                    </div>
                    <div>
                        <?php if($idx > 0) { ?>
                        <input type="button" name="prev" value="Prev" onclick="prev_click()">
                        <?php } ?>
                        <?php if($idx == 9) { ?>
                        <input type="button" name="next" value="Finish" onclick="finish_click()">
                        <?php }else{ ?>
                        <input type="button" name="next" value="Next" onclick="next_click()">
                        <?php } ?>
                        <br /><br /><br /><br />
                    </div>
                </div>
            </div> 
        <?php } ?>
        </form>
   
</div> 
    
<?php include("../view/footer.php") ?> 