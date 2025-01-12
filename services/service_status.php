<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$select_service_status1 = "SELECT * FROM services WHERE id=$id";
$select_service_status_result1 = mysqli_query($db_connect, $select_service_status1);
$select_service_status_result_assoc1 = mysqli_fetch_assoc($select_service_status_result1);

if($select_service_status_result_assoc1['status'] == 1){
    $select_service_status = "SELECT COUNT(*) as total FROM services WHERE status=1";
    $select_service_status_result = mysqli_query($db_connect, $select_service_status);
    $select_service_status_result_assoc = mysqli_fetch_assoc($select_service_status_result);

    if($select_service_status_result_assoc['total'] == 1){
        $_SESSION['limit'] = 'Minimum 1 must be activated';
            header('location: view_service.php');
    }
    else{
        $update_service_status = "UPDATE services SET status=0 WHERE id=$id";
        $update_service_status1_result = mysqli_query($db_connect, $update_service_status);
        header('location: view_service.php');
    }
}
else{
    $select_service_status = "SELECT COUNT(*) as total FROM services WHERE status=1";
    $select_service_status_result = mysqli_query($db_connect, $select_service_status);
    $select_service_status_result_assoc = mysqli_fetch_assoc($select_service_status_result);

        if($select_service_status_result_assoc['total'] == 4){
            $_SESSION['limit'] = 'Maximum 4 can be activated';
            header('location: view_service.php');
        } else{
            $update_service_status = "UPDATE services SET status=1 WHERE id=$id";
            $update_service_status1_result = mysqli_query($db_connect, $update_service_status);
            header('location: view_service.php');

        }
}


?>