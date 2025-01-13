<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$select_client = "SELECT * FROM clients WHERE id=$id";
$select_client_result = mysqli_query($db_connect, $select_client);
$select_client_result_assoc = mysqli_fetch_assoc($select_client_result);

$delete_form = '../uploads/client/'.$select_client_result_assoc['client'];
unlink($delete_form);

$delete_client = "DELETE FROM clients WHERE id=$id";
$delete_form_result = mysqli_query($db_connect, $delete_client);
header('location:view_client_image.php');

?>