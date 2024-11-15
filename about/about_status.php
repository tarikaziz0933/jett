<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$update_about_status = "UPDATE about_contents SET status=0";
$update_about_status_result = mysqli_query($db_connect, $update_about_status);

$update_about_status1 = "UPDATE about_contents SET status=1 WHERE id=$id";
$update_about_status1_result = mysqli_query($db_connect, $update_about_status1);
$_SESSION['success'] = "Status Updated Successfull";
header('location: view_about.php');

?>