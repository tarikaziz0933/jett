<?php
require '../db.php';

$id = $_GET['id'];

$update_banner_image_status = "UPDATE banner_image SET status=0";
$update_banner_image_status_result = mysqli_query($db_connect, $update_banner_image_status);

$update_banner_image_status1 = "UPDATE banner_image SET status=1 WHERE id=$id";
$update_banner_image_status1_result = mysqli_query($db_connect, $update_banner_image_status1);
header('location: view_banner.php');

?>