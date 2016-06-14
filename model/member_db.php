<?php
//echo '<h2>in member_db</h2>';
function get_members() {
    global $db;
    $query = 'SELECT * FROM members
                  ORDER BY memberID';
    $members = $db->query($query);
    return $members;
}

function get_member($email, $passwd) {
    global $db;
    $query = "SELECT * FROM members
                  WHERE email = '$email' AND passwd='$passwd'";
    //echo $query;
    $statement = $db->query($query);
    $member = $statement->fetch();

    return $member;
}

function get_member_by_id($id) {
    global $db;
    $query = "SELECT * FROM members
                  WHERE memberID = '$id'";
    //echo $query;
    $statement = $db->query($query);
    $member = $statement->fetch();

    return $member;
}

function get_member_by_email($email) {
    global $db;
    $query = "SELECT * FROM members
                  WHERE email = '$email'";
    //echo $query;
    $statement = $db->query($query);
    $member = $statement->fetch();

    return $member;
}

function get_member_by_pass($id, $passwd) {
    global $db;
    $query = "SELECT * FROM members
                  WHERE memberID = '$id'
            AND passwd = '$$passwd'";
    //echo $query;
    $statement = $db->query($query);
    $member = $statement->fetch();

    return $member;
}

function add_member($email, $passwd, $fname, $lname, $phone, $addr) {
    //echo '<h2>in add_member</h2>';
    global $db;
    $query = "INSERT INTO members
                 (memberID, email, passwd, firstName, lastName, phone, address, regDate)
             VALUES
                 (default, '$email', '$passwd', '$fname', '$lname', '$phone', '$addr', now())";
    //echo $query;
    $rows = $db->exec($query);
    return $rows;
}

function update_member_info($id, $email, $fname, $lname, $phone, $addr){
    global $db;
    $query = "UPDATE members SET
                email = '$email',
                firstName = '$fname',
                lastName = '$lname',
                phone = '$phone',
                 address = '$addr'   
              WHERE memberID = '$id'";
    echo $query;
    $rows = $db->exec($query); 
    return $rows;
}

function update_member_pswd($id, $email, $passwd, $fname, $lname, $phone, $addr){
    global $db;
    $query = "UPDATE members SET
                passwd = '$passwd'
              WHERE memberID = '$id'";
    echo $query;
    $db->exec($query);          
}

function update_member($id, $email, $passwd, $fname, $lname, $phone, $addr){
    global $db;
    $query = "UPDATE members SET
                email = '$email',
                passwd = '$passwd',   
                firstName = '$fname',
                lastName = '$lname',
                phone = '$phone',
                 address = '$addr'   
              WHERE memberID = '$id'";
    //echo $query;
    $rows = $db->exec($query); 
    return $rows;
}
?>