<?php
session_start();
require 'db.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$insert = "INSERT INTO users(name,email,password) values('$name', '$email', '$password')";
$insert_result = mysqli_query($db_connect, $insert);
$_SESSION['success'] = 'User added sucessfully';
header('location:register.php');

?>