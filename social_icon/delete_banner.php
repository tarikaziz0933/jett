<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$delete_banner = "DELETE FROM banner_contents WHERE id=$id";
$delete_banner_result = mysqli_query($db_connect, $delete_banner);
header('location:view_banner.php')
?>