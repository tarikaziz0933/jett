<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$delete_banner_image = "DELETE FROM banner_image WHERE id=$id";
$delete_banner_image_result = mysqli_query($db_connect, $delete_banner_image);
header('location:view_banner.php')
?>