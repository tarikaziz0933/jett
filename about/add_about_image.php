<?php
session_start();
require '../db.php';

$uploaded_file = $_FILES['about_image'];
$uploaded_file_name = $uploaded_file['name'];

// Check if file was uploaded
if (isset($uploaded_file) && !empty($uploaded_file_name) && $uploaded_file['size'] > 0) {
    // Get file extension
    $after_explode = explode('.', $uploaded_file_name);
    $extension = strtolower(end($after_explode));
    $allowed_extension = array('jpg', 'png', 'jpeg', 'gif');

    // Validate file extension
    if (in_array($extension, $allowed_extension)) {
        // Validate file size 
        if ($uploaded_file['size'] <= 7168000) {
            // Escape filename to prevent SQL injection
            $uploaded_file_name = mysqli_real_escape_string($db_connect, $uploaded_file_name);

            // Insert placeholder record in the database
            $insert = "INSERT INTO about_images(about_image) VALUES('$uploaded_file_name')";
            $insert_result = mysqli_query($db_connect, $insert);

            if ($insert_result) {
                $last_id = mysqli_insert_id($db_connect);
                $file_name = $last_id . '.' . $extension;
                $new_location = '../uploads/about_images/' . $file_name;

                // Move uploaded file to the target location
                if (move_uploaded_file($uploaded_file['tmp_name'], $new_location)) {
                    // Update the database with the correct file name
                    $update_about_image = "UPDATE about_images SET about_image='$file_name' WHERE id=$last_id";
                    $update_about_image_result = mysqli_query($db_connect, $update_about_image);

                    if ($update_about_image_result) {
                        $_SESSION['success'] = 'About Image added successfully';
                    } else {
                        $_SESSION['error'] = 'Failed to update image in the database';
                    }
                } else {
                    $_SESSION['error'] = 'Failed to move uploaded file';
                }
            } else {
                $_SESSION['error'] = 'Failed to insert image record into the database';
            }

            header('location:view_about.php');
        } else {
            $_SESSION['size'] = 'File Size Too Large, Max 7 KB';
            header('location:add_about.php');
        }
    } else {
        $_SESSION['extension'] = 'Invalid file extension. Allowed extensions: jpg, png, jpeg, gif';
        header('location:add_about.php');
    }
} else {
    $_SESSION['error'] = 'No file uploaded or file is empty';
    header('location:add_about.php');
}
?>