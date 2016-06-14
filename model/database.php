<?php
    //echo '<h2>in database.php</h2>';
    $dsn = 'mysql:host=localhost;dbname=pearl_quiz';
    $username = 'mgs_user';
    $password = 'pa55word';

    try {
        //echo '<h2>in try</h2>';
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        //echo '<h2>in error</h2>';
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>