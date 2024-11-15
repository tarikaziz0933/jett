<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$delete_about = "DELETE FROM education_contents WHERE id=$id";
$delete_about_result = mysqli_query($db_connect, $delete_about);
$_SESSION['success'] = "Deleted Successfull";
header('location:view_education.php')
?>