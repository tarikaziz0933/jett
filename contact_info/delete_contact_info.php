<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$delete_contact_info = "DELETE FROM contact_info WHERE id=$id";
$delete_contact_info_result = mysqli_query($db_connect, $delete_contact_info);
header('location:view_contact_info.php')
?>