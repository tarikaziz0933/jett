<?php
require '../db.php';

$id = $_GET['id'];

$update_logo_status = "UPDATE logos SET status=0";
$update_logo_status_result = mysqli_query($db_connect, $update_logo_status);

$update_logo_status1 = "UPDATE logos SET status=1 WHERE id=$id";
$update_logo_status1_result = mysqli_query($db_connect, $update_logo_status1);
header('location: view_logo.php');

?>