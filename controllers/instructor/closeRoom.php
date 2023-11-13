<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../connect.php');

$meeting_id = $_GET['meeting_id'] ?? null;

if ($meeting_id === null) {
    header("Location: ../../pages/404.php");
    exit();
}

    $updateQuery = "UPDATE rooms SET is_closed = 'true' WHERE meeting_id = ?";
    $updateStmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($updateStmt, "i", $meeting_id);
    mysqli_stmt_execute($updateStmt);

    if ($updateStmt === false) {
        $error = "Error updating meeting status: " . mysqli_error($conn);
        $_SESSION['error'] = $error;
        header('Location: ../../pages/instructor/dashboard/');
    exit();
    } else {
        $success = "Meeting closed successfully!";
        $_SESSION['success'] = $success;
        echo $success;
        header('Location: ../../pages/instructor/dashboard/');
    exit();
    }

    mysqli_stmt_close($updateStmt);
    mysqli_close($conn);
