<?php
function get_quiztypes(){
    global $db;
    $query = 'SELECT * FROM quiz_type
                  ORDER BY dislayOrder';
    $quiztypes = $db->query($query);
    return $quiztypes;
}

function get_quiztype($quiz_code) {
    global $db;
    $query = "SELECT * FROM quiz_type
                  WHERE quizCode = '$quiz_code'";
    //echo $query;
    $quiz = $db->query($query);
    $quiz = $quiz->fetch();
    return $quiz;
}
?>