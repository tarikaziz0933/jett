<?php
require 'db.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$email_check = "SELECT count(*) as email_count, id FROM users WHERE email='$email'";
$email_check_result = mysqli_query($db_connect, $email_check);
$email_check_result_assoc = mysqli_fetch_assoc($email_check_result);

if($email_check_result_assoc['email_count'] == 1){
    $get_email_data_query = "SELECT * FROM users WHERE email='$email'";
    $get_email_data_result = mysqli_query($db_connect, $get_email_data_query);
    $get_email_data_result_assoc = mysqli_fetch_assoc($get_email_data_result);

    if(password_verify($password, $get_email_data_result_assoc['password'])){
        $_SESSION['check_login'] = "Login properly";
        $_SESSION['login_msg'] = "Login successfull";
        $_SESSION['id'] = $email_check_result_assoc['id'];
        
        header('location:users/users.php');
    }
    else{
        $_SESSION['email_doesnot_exitt'] = "Password not matched";
        header('location:login.php');
    }

}
else{
    $_SESSION['email_doesnot_exitt'] = "EMail not found";
    header('location:login.php');
}


?>