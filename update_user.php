<?php
session_start();
require "db.php";

$id = $_POST['id'];

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

if(empty($password)){

    if($_FILES['profile_picture']['name'] != ''){
        
        
        //picture update
        $uploaded_file = $_FILES['profile_picture'];
        $uploaded_file_name = $uploaded_file['name'];
        $after_explode = explode('.', $uploaded_file_name);
        $extension = end($after_explode);
        $allowed_extension =array('jpg', 'PNG', 'png', 'jpeg', 'gif');
        if(in_array($extension, $allowed_extension)){
            if ($uploaded_file['size'] <= 3000720) {

                //image delete
                $select_img = "SELECT * FROM users WHERE id=$id";
                $select_img_result = mysqli_query($db_connect, $select_img);
                $after_assoc = mysqli_fetch_assoc($select_img_result);

                $delete_from = 'uploads/users/'.$after_assoc['profile_picture'];
                unlink($delete_from);

                $update_user = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
                $update_user_result = mysqli_query($db_connect, $update_user);
                $file_name = $id . '.' .$extension;
                $new_location = 'uploads/users/' .$file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);
                
                $update_users = "UPDATE users SET profile_picture='$file_name' Where id=$id";
                $update_users_result = mysqli_query($db_connect, $update_users);
                $_SESSION['success'] = 'User added sucessfully';
                header('location:user_edit.php?id=' .$id);
            } else {
                $_SESSION['size'] = 'File Size Too Large, Max 7 KB';
                header('location:user_edit.php?id=' .$id);
            }
        } else{
            $_SESSION['extension'] = 'Invalide Extension';
            header('location:user_edit.php?id=' .$id);
        }
    } else{
        $update_user = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
        $update_user_result = mysqli_query($db_connect, $update_user);
        $_SESSION['update'] = 'User Updated';
        header('location:users.php');
    }

    
}else{
    if($_FILES['profile_picture']['name'] != ''){
       
        
        //picture update
        $uploaded_file = $_FILES['profile_picture'];
        $uploaded_file_name = $uploaded_file['name'];
        $after_explode = explode('.', $uploaded_file_name);
        $extension = end($after_explode);
        $allowed_extension =array('jpg', 'PNG', 'png', 'jpeg', 'gif');
        if(in_array($extension, $allowed_extension)){
            if ($uploaded_file['size'] <= 3000720) {

                 //image delete
                $select_img = "SELECT * FROM users WHERE id=$id";
                $select_img_result = mysqli_query($db_connect, $select_img);
                $after_assoc = mysqli_fetch_assoc($select_img_result);

                $delete_from = 'uploads/users/'.$after_assoc['profile_picture'];
                unlink($delete_from);

                $update_user = "UPDATE users SET name='$name', email='$email', password='$password_hash' WHERE id=$id";
                $update_user_result = mysqli_query($db_connect, $update_user);
                $file_name = $id . '.' .$extension;
                $new_location = 'uploads/users/' .$file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);
                
                $update_users = "UPDATE users SET profile_picture='$file_name' Where id=$id";
                $update_users_result = mysqli_query($db_connect, $update_users);
                $_SESSION['success'] = 'User added sucessfully';
                header('location:user_edit.php?id=' .$id);
            } else {
                $_SESSION['size'] = 'File Size Too Large, Max 7 KB';
                header('location:user_edit.php?id=' .$id);
            }
        } else{
            $_SESSION['extension'] = 'Invalide Extension';
            header('location:user_edit.php?id=' .$id);
        }
    } else{
        $update_user = "UPDATE users SET name='$name', email='$email', password='$password_hash' WHERE id=$id";
        $update_user_result = mysqli_query($db_connect, $update_user);
        $_SESSION['update'] = 'User Updated!';
        header('location:user_edit.php?id=' .$id);
    }
    
}


?>