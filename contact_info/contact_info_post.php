<?php 
session_start();
require '../db.php';

$address = $_POST['address'];
$number = $_POST['number'];
$email = $_POST['email'];

$insert = "INSERT INTO contact_info(address, number, email)VALUES('$address', '$number', '$email')";
$insert_result = mysqli_query($db_connect, $insert);

$_SESSION['success'] = 'Information added sucessfully';
header('location:add_contact_info.php');

?>