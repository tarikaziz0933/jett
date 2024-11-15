<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$delete_about_image = "DELETE FROM about_images WHERE id=$id";
$delete_about_image_result = mysqli_query($db_connect, $delete_about_image);
$_SESSION['success'] = "Deleted Successfull";
header('location:view_about.php')
?>