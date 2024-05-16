<?php
require_once("connect.php");
ob_start();
if (isset($_POST['new_first_name']) && isset($_POST['new_last_name'])) {
    $newFirstName = mysqli_real_escape_string($conn, $_POST['new_first_name']);
    $newLastName = mysqli_real_escape_string($conn, $_POST['new_last_name']);
    $userId = $_SESSION['user_id'];
    $updateQuery = "UPDATE users SET first_name = '$newFirstName', last_name = '$newLastName' WHERE user_id = '$userId'";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        $_SESSION['success'] = "Profile updated successfully!";
        unset($_SESSION['name']);
        $_SESSION['name'] = $newFirstName. ' ' . $newLastName;
        if($_SESSION['role'] === 'instructor'){
            header("Location:../pages/instructor/settings/"); 
        }else{
            header("Location:../pages/student/settings/"); 
        }
        exit();
    } else {
        $_SESSION['error'] = "Error updating profile. Please try again.";
        if($_SESSION['role'] === 'instructor'){
            header("Location:../pages/instructor/settings/"); 
        }else{
            header("Location:../pages/student/settings/"); 
        }
        exit();
    }
} else {
    $_SESSION['error'] = "Please provide both first name and last name.";
    if($_SESSION['role'] === 'instructor'){
        header("Location:../pages/instructor/settings/"); 
    }else{
        header("Location:../pages/student/settings/"); 
    }
    exit();
}
ob_end_flush();
?>