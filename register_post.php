<?php
session_start();
require 'db.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$select = "SELECT COUNT(*) as gotit FROM users WHERE email='$email'";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

if($after_assoc['gotit'] == 1){
    echo 'already exit';
}
else{
    $insert = "INSERT INTO users(name,email,password) values('$name', '$email', '$password')";
    $insert_result = mysqli_query($db_connect, $insert);
    $_SESSION['success'] = 'User added sucessfully';
    header('location:register.php');
}




?>