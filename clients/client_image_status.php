<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$select_client_status1 = "SELECT * FROM clients WHERE id=$id";
$select_client_status_result1 = mysqli_query($db_connect, $select_client_status1);
$select_client_status_result_assoc1 = mysqli_fetch_assoc($select_client_status_result1);

if($select_client_status_result_assoc1['status'] == 1){
    $select_client_status = "SELECT COUNT(*) as total FROM clients WHERE status=1";
    $select_client_status_result = mysqli_query($db_connect, $select_client_status);
    $select_client_status_result_assoc = mysqli_fetch_assoc($select_client_status_result);

    if($select_client_status_result_assoc['total'] == 1){
        $_SESSION['limit'] = 'Minimum 1 must be activated';
            header('location: view_client_image.php');
    }
    else{
        $update_client_status = "UPDATE clients SET status=0 WHERE id=$id";
        $update_client_status1_result = mysqli_query($db_connect, $update_client_status);
        header('location: view_client_image.php');
    }
}
else{
    $select_client_status = "SELECT COUNT(*) as total FROM clients WHERE status=1";
    $select_client_status_result = mysqli_query($db_connect, $select_client_status);
    $select_client_status_result_assoc = mysqli_fetch_assoc($select_client_status_result);

        if($select_client_status_result_assoc['total'] == 8){
            $_SESSION['limit'] = 'Maximum 8 can be activated';
            header('location: view_client_image.php');
        } else{
            $update_client_status = "UPDATE clients SET status=1 WHERE id=$id";
            $update_client_status1_result = mysqli_query($db_connect, $update_client_status);
            header('location: view_client_image.php');

        }
}


?>