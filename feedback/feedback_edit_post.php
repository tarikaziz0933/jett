<?php
session_start();
require '../db.php';
$id= $_POST['id'];
$name = $_POST['name'];
$designation = $_POST['designation'];
$image = $_FILES['image'];

$select_feedback = "SELECT * FROM feedbacks WHERE id='$id'";
$select_feedback_res = mysqli_query($db_connect, $select_feedback);
$select_feedback_assoc = mysqli_fetch_assoc($select_feedback_res);

if(empty($name)){
    $name = $select_feedback_assoc['name'];
}
elseif(empty($designation)){
        $designation = $select_feedback_assoc['designation'];
}
elseif(empty($image['name'])){
        $update = "UPDATE feedbacks SET name='$name', designation ='$designation' WHERE id='$id'";
        $update_res = mysqli_query($db_connect, $update);
        $_SESSION['feedback_update'] = "Feedback Updtaed!";
        header('location:feedback_edit.php?id='.$id);
}
else{
    $name_exp = explode('.',$image['name']);
    $extention = end($name_exp);
    $allow_extention = array('jpg','png','jpeg');
    if(in_array($extention,$allow_extention )){
        if($image['size'] <10000000000000){
            $update = "UPDATE feedbacks SET  name='$name', designation ='$designation' WHERE id='$id'";
            $update_res = mysqli_query($db_connect, $update);

            $select_feedback2 = "SELECT * FROM feedbacks WHERE id='$id'";
            $select_feedback_res2 = mysqli_query($db_connect, $select_feedback2);
            $select_feedback_assoc2 = mysqli_fetch_assoc($select_feedback_res2);

            //image unlink
            $old_image_location = "../uploads/feedback/".$select_feedback_assoc2['image'];
            unlink($old_image_location);
            
            $image_name = $id.'.'.$extention;

            $upload_loaction = '../uploads/feedback/'.$image_name;
            move_uploaded_file($image['tmp_name'], $upload_loaction);

            $update_image = "UPDATE feedbacks SET image='$image_name' WHERE id='$id'";
            $update_image_query = mysqli_query($db_connect, $update_image);

            $_SESSION['feedback_update'] = "Feedback Updtaed!";
            header('location:feedback_edit.php?id='.$id);

        }
        else{
            $_SESSION['invalid_size'] = "Upload image max size 1 Mb!";
            header('location:feedback_edit.php?id='.$id);
        }
    } 
    else{
        $_SESSION['invalid_ext'] = "Invalid Extention!";
        header('location:feedback_edit.php?id='.$id);
    }
}


?>