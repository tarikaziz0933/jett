<?php 
require '../db.php';

$icon = $_POST['icon'];
$link = $_POST['link'];

$insert = "INSERT INTO social_link(icon_class, link)VALUES('$icon', '$link')";
$insert_result = mysqli_query($db_connect, $insert);
header('location:add_social_icon.php');

?>