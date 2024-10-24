<?php
session_start();
require 'db.php';
require 'session_check.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM users WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc($select_img_result);

$delete_from = 'uploads/users/'.$after_assoc['profile_picture'];
// echo $delete_from;
// die();
unlink($delete_from);

$delete = "DELETE FROM users WHERE id = $id";
$delete_result = mysqli_query($db_connect, $delete);
echo $_SESSION['delete'] = "User Deleted Successfully";
header('location:users.php');
// echo $id;

?>