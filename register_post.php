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
    $_SESSION['exist'] = 'Email already exist';
    header('location:register.php');
    // echo 'already exit';
}
else{
    //picture upload
    $uploaded_file = $_FILES['profile_picture'];
    $uploaded_file_name = $uploaded_file['name'];
    $after_explode = explode('.', $uploaded_file_name);
    $extension = end($after_explode);
    $allowed_extension =array('jpg', 'png', 'jpeg', 'gif');
    if(in_array($extension, $allowed_extension)){
            if ($uploaded_file['size'] <= 3000720) {
                $insert = "INSERT INTO users(name,email,password) values('$name', '$email', '$password')";
                $insert_result = mysqli_query($db_connect, $insert);
                $last_id = mysqli_insert_id($db_connect);
                $file_name = $last_id. '.' .$extension;
                $new_location = 'uploads/users/' .$file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);

                $update_users = "UPDATE users SET profile_picture='$file_name' Where id=$last_id";
                $update_users_result = mysqli_query($db_connect, $update_users);

                $_SESSION['success'] = 'User added sucessfully';
                header('location:register.php');


    
            } else {
                $_SESSION['size'] = 'File Size Too Large, Max 7 KB';
                header('location:register.php');
            }
        }else{
        $_SESSION['extension'] = 'Invalide Extension';
        header('location:register.php');
    }

    // die();
    
    
}


?>