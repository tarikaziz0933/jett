<?php
require '../db.php';

$uploaded_file = $_FILES['banner_image'];
$uploaded_file_name = $uploaded_file['name'];
    
    if(isset($uploaded_file) && !empty($uploaded_file) && $uploaded_file['size'] != 0){
        $after_explode = explode('.', $uploaded_file_name);
        $extension = end($after_explode);
        $allowed_extension =array('jpg', 'PNG', 'png', 'jpeg', 'gif');

        // print_r($uploaded_file);
        // die();
        
        if(in_array($extension, $allowed_extension)){
            if ($uploaded_file['size'] <= 3000720000) {

                $insert = "INSERT INTO banner_image(banner_image) values('$uploaded_file_name')";
                $insert_result = mysqli_query($db_connect, $insert);
                $last_id = mysqli_insert_id($db_connect);
                $file_name = $last_id. '.' .$extension;
                $new_location = '../uploads/banner_images/' .$file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);

                $update_banner_image = "UPDATE banner_image SET banner_image='$file_name' Where id=$last_id";
                $update_users_result = mysqli_query($db_connect, $update_banner_image);

                $_SESSION['success'] = 'Banner Image added sucessfully';
                header('location:view_banner.php');
            } else {
                $_SESSION['size'] = 'File Size Too Large, Max 7 KB';
                header('location:view_banner.php');
            }
        } else{
                $_SESSION['extension'] = 'Invalide Extension';
                header('location:view_banner.php');
        }
    }else{
        $_SESSION['success'] = 'Banner Image added sucessfully';
        header('location:view_banner.php');
    }
?>