<?php
function get_quizdetail($quiz_code) {
    global $db;
    $query = "SELECT * FROM quiz_detail
                WHERE quizCode = '$quiz_code'
                ORDER BY rand()
                LIMIT 10";
    //echo $query;
    $statement = $db->query($query);
    $quiz = $statement->fetchAll();
    return $quiz;
}
?>