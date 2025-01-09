<?php
require '../db.php';

$id = $_GET['id'];

$update_banner_status = "UPDATE banner_contents SET status=0";
$update_banner_status_result = mysqli_query($db_connect, $update_banner_status);

$update_banner_status1 = "UPDATE banner_contents SET status=1 WHERE id=$id";
$update_banner_status1_result = mysqli_query($db_connect, $update_banner_status1);
header('location: view_banner.php');

?>