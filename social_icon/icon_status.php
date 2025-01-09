<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$select_icon_status1 = "SELECT * FROM social_link WHERE id=$id";
$select_icon_status_result1 = mysqli_query($db_connect, $select_icon_status1);
$select_icon_status_result_assoc1 = mysqli_fetch_assoc($select_icon_status_result1);

if($select_icon_status_result_assoc1['status'] == 1){
    $select_icon_status = "SELECT COUNT(*) as total FROM social_link WHERE status=1";
    $select_icon_status_result = mysqli_query($db_connect, $select_icon_status);
    $select_icon_status_result_assoc = mysqli_fetch_assoc($select_icon_status_result);

    if($select_icon_status_result_assoc['total'] == 1){
        $_SESSION['limit'] = 'Minimum 1 must be activated';
            header('location: view_social_icon.php');
    }
    else{
        $update_icon_status = "UPDATE social_link SET status=0 WHERE id=$id";
        $update_icon_status1_result = mysqli_query($db_connect, $update_icon_status);
        header('location: view_social_icon.php');
    }
}
else{
    $select_icon_status = "SELECT COUNT(*) as total FROM social_link WHERE status=1";
    $select_icon_status_result = mysqli_query($db_connect, $select_icon_status);
    $select_icon_status_result_assoc = mysqli_fetch_assoc($select_icon_status_result);

        if($select_icon_status_result_assoc['total'] == 4){
            $_SESSION['limit'] = 'Maximum 4 can be activated';
            header('location: view_social_icon.php');
        } else{
            $update_icon_status = "UPDATE social_link SET status=1 WHERE id=$id";
            $update_icon_status1_result = mysqli_query($db_connect, $update_icon_status);
            header('location: view_social_icon.php');

        }
}


?>