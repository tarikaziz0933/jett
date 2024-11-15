<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$update_about_image_status = "UPDATE about_images SET status=0";
$update_about_image_status_result = mysqli_query($db_connect, $update_about_image_status);

$update_about_image_status1 = "UPDATE about_images SET status=1 WHERE id=$id";
$update_about_image_status1_result = mysqli_query($db_connect, $update_about_image_status1);
$_SESSION['success'] = "Status Updated Successfull";
header('location: view_about.php');

?>