<?php 
require '../db.php';

$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
$descrp = $_POST['descrp'];

$insert = "INSERT INTO banner_contents(sub_title, title, descrp)VALUES('$sub_title', '$title', '$descrp')";
$insert_result = mysqli_query($db_connect, $insert);
header('location:add_banner.php');

?>