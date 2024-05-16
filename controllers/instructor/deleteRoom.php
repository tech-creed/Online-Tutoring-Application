<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../connect.php');

ob_start();

$meeting_id = $_GET['meeting_id'] ?? null;

if ($meeting_id === null) {
    header("Location: ../../pages/404.php");
    exit();
}

$deleteQuery = "DELETE FROM rooms WHERE meeting_id = ?";
$deleteStmt = mysqli_prepare($conn, $deleteQuery);
mysqli_stmt_bind_param($deleteStmt, "i", $meeting_id);
mysqli_stmt_execute($deleteStmt);

if ($deleteStmt === false) {
    $error = "Error deleting meeting: " . mysqli_error($conn);
    $_SESSION['error'] =  $error;
    header('Location: ../../pages/instructor/dashboard/');
    exit();
} else {
    $success = "Meeting deleted successfully!";
    $_SESSION['success'] = $success;
    header('Location: ../../pages/instructor/dashboard/');
    exit();
}

mysqli_stmt_close($deleteStmt);
mysqli_close($conn);
ob_start();
?>
