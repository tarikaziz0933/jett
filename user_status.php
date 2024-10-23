<?php
session_start();
require 'db.php';
$id = $_GET['id'];

$select = "SELECT * FROM users WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

// echo $after_assoc['status'];
// die();
if($after_assoc['status'] == 0){
    $query = "UPDATE users SET status=1 WHERE id=$id";
    $update_status_result = mysqli_query($db_connect, $query);
    $_SESSION["status_changed"] = 'Status Changed';
    header('location:users.php');
}
else{
    $query = "UPDATE users SET status=0 WHERE id=$id";
    $update_status_result = mysqli_query($db_connect, $query);
    $_SESSION["status_changed"] = 'Status Changed';
    header('location:users.php');
}

?>