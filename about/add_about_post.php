<?php
session_start(); // Start the session to store messages
require '../db.php';

$sub_title = htmlspecialchars(trim($_POST['sub_title']));
$title = htmlspecialchars(trim($_POST['title']));
$descrp = htmlspecialchars(trim($_POST['descrp']));

// Validation: Check if fields are empty
$errors = [];
if (empty($sub_title)) {
    $errors[] = "Subtitle is required.";
}
if (empty($title)) {
    $errors[] = "Title is required.";
}
if (empty($descrp)) {
    $errors[] = "Description is required.";
}

// Check if there are validation errors
if (!empty($errors)) {
    // Store errors in the session to display on the form page
    $_SESSION['error'] = $errors;
    $_SESSION['old_values'] = [
        'sub_title' => $sub_title,
        'title' => $title,
        'descrp' => $descrp
    ];
    header('location:add_about.php'); // Redirect back to the form page

} else {
    // Proceed with the insertion if no errors
    $insert = "INSERT INTO about_contents(sub_title, title, descrp) VALUES('$sub_title', '$title', '$descrp')";
    $insert_result = mysqli_query($db_connect, $insert);

    if ($insert_result) {
        $_SESSION['success'] = "About Content added successfully.";
    } else {
        $_SESSION['error'] = "There was an error adding the content. Please try again.";
    }
    header('location:add_about.php'); // Redirect back to the form page

}
