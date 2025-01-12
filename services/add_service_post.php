<?php 
require '../db.php';

$service_icon = $_POST['service_icon'];
$title = $_POST['title'];
$decrp = $_POST['decrp'];

$insert = "INSERT INTO services(service_icon, title, decrp)VALUES('$service_icon', '$title', '$decrp')";
$insert_result = mysqli_query($db_connect, $insert);
header('location:add_service.php');

?>