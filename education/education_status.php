<?php
session_start();
require '../db.php';

$id = $_GET['id'];
$education_status = "SELECT * FROM education_contents WHERE id=$id";
$education_status_result = mysqli_query($db_connect, $education_status);
$education_status_result_assoc = mysqli_fetch_assoc($education_status_result);

if($education_status_result_assoc['status'] == 0){
    $count_education_status = "SELECT COUNT(*) as total FROM education_contents WHERE status=1";
    $count_education_status_result = mysqli_query($db_connect, $count_education_status);
    $count_education_status_result_assoc = mysqli_fetch_assoc($count_education_status_result);

    if($count_education_status_result_assoc['total'] == 3){
        $_SESSION['error'] = "Maximum 3 can be activated";
        header('location: view_education.php');
    }
    else{
        $update_education_status1 = "UPDATE education_contents SET status=1 WHERE id=$id";
        $update_education_status1_result = mysqli_query($db_connect, $update_education_status1);
        $_SESSION['success'] = "Status Updated Successfull";
        header('location: view_education.php');
    }
}else{
    $count_education_status = "SELECT COUNT(*) as total FROM education_contents WHERE status=1";
    $count_education_status_result = mysqli_query($db_connect, $count_education_status);
    $count_education_status_result_assoc = mysqli_fetch_assoc($count_education_status_result);

    if($count_education_status_result_assoc['total'] == 1){
        $_SESSION['error'] = "Minimum 1 must be activated";
        header('location: view_education.php');
    }
    else{
        $update_education_status1 = "UPDATE education_contents SET status=0 WHERE id=$id";
        $update_education_status1_result = mysqli_query($db_connect, $update_education_status1);
        $_SESSION['success'] = "Status Updated Successfull";
        header('location: view_education.php');
    }
}

?>