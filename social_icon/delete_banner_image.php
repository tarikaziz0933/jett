<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$select_img = "SELECT * FROM banner_image WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$select_img_result_assoc = mysqli_fetch_assoc($select_img_result);

$delete_from = '../uploads/banner_images/'. $select_img_result_assoc['banner_image'];
unlink($delete_from);

$delete_banner_image = "DELETE FROM banner_image WHERE id=$id";
$delete_banner_image_result = mysqli_query($db_connect, $delete_banner_image);
header('location:view_banner.php')
?>