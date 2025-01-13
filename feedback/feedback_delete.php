<?php
require '../db.php';

$id = $_GET['id'];

//image delte 
$select_image = "SELECT * FROM feedbacks WHERE id= '$id'";
$select_image_query = mysqli_query($db_connect, $select_image);
$after_assoc_image = mysqli_fetch_assoc($select_image_query);
$image_location = "../uploads/feedback/".$after_assoc_image['image'];
unlink($image_location);

$delete_query = "DELETE FROM feedbacks WHERE id='$id' ";
$delete_res = mysqli_query($db_connect, $delete_query);
$_SESSION['feedback_delete'] = "Feedback Deleted!";
header('location:view_feedback.php');

?>