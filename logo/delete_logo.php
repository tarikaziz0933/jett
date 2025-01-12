<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$select_logo = "SELECT * FROM logos WHERE id=$id";
$select_logo_result = mysqli_query($db_connect, $select_logo);
$select_logo_result_assoc = mysqli_fetch_assoc($select_logo_result);

$delete_form = '../uploads/logo/'.$select_logo_result_assoc['logo'];
unlink($delete_form);

$delete_logo = "DELETE FROM logos WHERE id=$id";
$delete_form_result = mysqli_query($db_connect, $delete_logo);
header('location:view_logo.php');

?>