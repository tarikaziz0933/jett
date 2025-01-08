<?php
session_start();
require '../db.php';

$id = $_GET['id'];

// $update_about_status = "UPDATE education_contents SET status=0";
// $update_about_status_result = mysqli_query($db_connect, $update_about_status);


$update_about_status2 = "SELECT * FROM education_contents WHERE id=$id";
$update_about_status2_result = mysqli_query($db_connect, $update_about_status2);
$update_about_status2_result_assoc = mysqli_fetch_assoc($update_about_status2_result);
// print_r($update_about_status2_result_assoc);
// die();
if($update_about_status2_result_assoc['status'] == 0){
    $update_about_status1 = "UPDATE education_contents SET status=1 WHERE id=$id";
    $update_about_status1_result = mysqli_query($db_connect, $update_about_status1);
    $_SESSION['success'] = "Status Updated Successfull";
    header('location: view_education.php');
}else{
    $update_about_status1 = "UPDATE education_contents SET status=0 WHERE id=$id";
    $update_about_status1_result = mysqli_query($db_connect, $update_about_status1);
    $_SESSION['success'] = "Status Updated Successfull";
    header('location: view_education.php');
}


// $update_about_status1 = "UPDATE education_contents SET status=1 WHERE id=$id";
// $update_about_status1_result = mysqli_query($db_connect, $update_about_status1);
// $_SESSION['success'] = "Status Updated Successfull";
// header('location: view_education.php');

?>