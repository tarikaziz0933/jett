<?php
session_start();
require "db.php";

$id = $_POST['id'];

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

if(empty($password)){
    $update_user = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    $update_user_result = mysqli_query($db_connect, $update_user);
    $_SESSION['update'] = 'User Updated';
    // print_r( $_SESSION['update']);
    // die();
    header('location:users.php');
}else{
    $update_user = "UPDATE users SET name='$name', email='$email', password='$password_hash' WHERE id=$id";
    $update_user_result = mysqli_query($db_connect, $update_user);
    $_SESSION['update'] = 'User Updated!';
    // echo $_SESSION['update'];
    // die();
    header('location:users.php');
}


?>