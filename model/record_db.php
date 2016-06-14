<?php
function get_record($memberId) {
    global $db;
    $query = "SELECT quizSeq, record.quizCode, quizName, regDate, quizScore 
                FROM record, quiz_type
                WHERE memberID = '$memberId'
                    AND record.quizCode = quiz_type.quizCode
                ORDER BY quizSeq";
    
    //echo $query;
    $statement = $db->query($query);
    $record = $statement->fetchAll();

    return $record;
}

function add_record($memberid, $quizcode, $quizscore) {
    //echo '<h2>in add_member</h2>';
    global $db;
    $query = "INSERT INTO record
                 (quizSeq, memberID, quizCode, quizScore, regDate)
             VALUES
                 (default , '$memberid', '$quizcode', '$quizscore', now())";
    //echo $query;
    $rows = $db->exec($query);
    return $rows;
}

?>