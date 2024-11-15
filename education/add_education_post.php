<?php
session_start(); // Start the session to store messages
require '../db.php';

$passing_year = htmlspecialchars(trim($_POST['passing_year']));
$education_info = htmlspecialchars(trim($_POST['education_info']));
$experties = htmlspecialchars(trim($_POST['experties']));

// Validation: Check if fields are empty
$errors = [];
if (empty($passing_year)) {
    $errors[] = "Subtitle is required.";
}
if (empty($education_info)) {
    $errors[] = "Title is required.";
}
if (empty($experties)) {
    $errors[] = "Description is required.";
}

// Check if there are validation errors
if (!empty($errors)) {
    // Store errors in the session to display on the form page
    $_SESSION['error'] = $errors;
    $_SESSION['old_values'] = [
        'passing_year' => $passing_year,
        'education_info' => $education_info,
        'experties' => $experties
    ];
    header('location:add_education.php'); // Redirect back to the form page

} else {
    // Proceed with the insertion if no errors
    $insert = "INSERT INTO education_contents(passing_year, education_info, experties) VALUES('$passing_year', '$education_info', '$experties')";
    $insert_result = mysqli_query($db_connect, $insert);

    if ($insert_result) {
        $_SESSION['success'] = "About Content added successfully.";
    } else {
        $_SESSION['error'] = "There was an error adding the content. Please try again.";
    }
    header('location:add_education.php'); // Redirect back to the form page

}