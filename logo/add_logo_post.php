<?php
session_start();
require '../db.php';

$uploaded_file = $_FILES['logo'];
$name = $uploaded_file['name'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg', 'png', 'jpeg','JPG', 'PNG');
if(in_array($extension, $allowed_extension)){
    if($uploaded_file['size'] <= 50000000000){
        $insert = "INSERT INTO logos(logo) VALUES('$name')";
        $insert_result = mysqli_query($db_connect, $insert);
        $last_id = mysqli_insert_id($db_connect);
        $file_name = $last_id.'.'.$extension;

        $new_location = '../uploads/logo/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update = "UPDATE logos SET logo='$file_name' WHERE id=$last_id";
        $update_result = mysqli_query($db_connect, $update);

        $_SESSION['success'] = 'Logo added sucessfully';
        header('location:add_logo.php');
    }
    else{
        header('location:add_logo.php');
    }
}
else{
    header('location:add_logo.php');
}
?>