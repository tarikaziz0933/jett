<?php
session_start();
require '../db.php';
$name = $_POST['name'];
$designation = $_POST['designation'];
$descrp = $_POST['descrp'];
$image = $_FILES['image'];
$_SESSION['old_name'] = $name;
$_SESSION['old_designation'] = $designation;
$_SESSION['old_descrp'] = $descrp;

    if(empty($name)){
        $_SESSION['null_error'] = "* Please Enter Name!";
        header('location:add_feedback.php');
        if(empty($designation)){
            $_SESSION['designation_error'] = "* Please Enter Designation!";
            header('location:add_feedback.php');
        }
        if(empty($descrp)){
            $_SESSION['descrp_error'] = "* Please Enter Desription!";
            header('location:add_feedback.php');
        }
        if(empty($image['name'])){
            $_SESSION['image_error'] = "* Please Upload A photo!";
            header('location:add_feedback.php');
        }
    }
    elseif(empty($name)){
            $_SESSION['title_error'] = "* Please Enter Title!";
            header('location:add_feedback.php');
    }
    elseif(empty($designation)){
            $_SESSION['designation_error'] = "* Please Enter Designation!";
            header('location:add_feedback.php');
    }
    elseif(empty($descrp)){
            $_SESSION['descrp_error'] = "* Please Enter Desription!";
            header('location:add_feedback.php');
    }
    elseif(empty($image['name'])){
            $_SESSION['image_error'] = "* Please Upload A photo!";
            header('location:add_feedback.php');
    }
    else{
        
        $name_exp = explode('.',$image['name']);
        $extention = end($name_exp);
        $allow_extention = array('jpg','png','jpeg');
        if(in_array($extention, $allow_extention)){
            if($image['size'] <10000000000000){
                $insert_query = "INSERT INTO feedbacks(name, designation, descrp) VALUES('$name', '$designation', '$descrp')";
                $insert_query_res = mysqli_query($db_connect, $insert_query);

                $last_id = mysqli_insert_id($db_connect);
                $image_name = $last_id.'.'.$extention;

                $upload_loaction = '../uploads/feedback/'.$image_name;
                move_uploaded_file($image['tmp_name'], $upload_loaction);

                $update_image = "UPDATE feedbacks SET image='$image_name' WHERE id='$last_id'";
                $update_image_query = mysqli_query($db_connect, $update_image);

                unset($_SESSION['old_name']);
                unset($_SESSION['old_title']);
                unset($_SESSION['old_descrp']);
                $_SESSION['feedback_inserted'] = "Feedback Insert Successfully!";
                header('location:add_feedback.php');

            }
            else{
                $_SESSION['invalid_size'] = "Upload image max size 1 Mb!";
                header('location:add_feedback.php');
            }
        } 
        else{
            $_SESSION['invalid_ext'] = "Invalid Extention!";
            header('location:add_feedback.php');
        }
    }

?>