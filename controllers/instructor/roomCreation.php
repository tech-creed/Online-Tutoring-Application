<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../connect.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $meetingTitle = $_POST['meetingTitle'];
    $date = $_POST['meetingDate'];
    $time = $_POST['meetingTime']. ':00';
    $duration = $_POST['meetingDuration'];
    $meetingLink = $_POST['meetingLink'];
    $selectedStudentIds = json_decode($_POST['selectedStudentIds'], true);

    $insertClassQuery = "INSERT INTO rooms (student_id, meeting_title, date, time, duration, meeting_link, is_closed) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insertClassQuery);

    if ($stmt) {
        $isClosed = 'false';
        foreach ($selectedStudentIds as $studentId) {
            mysqli_stmt_bind_param($stmt, "issssss", $studentId, $meetingTitle, $date, $time, $duration, $meetingLink, $isClosed);
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        $success =  "Room created successfully!";
        $_SESSION['success'] = $success;
        header('Location: ../../pages/instructor/class/newRoom.php');
    } else {
        $_SESSION['error'] = "Error preparing statement: " . mysqli_error($mysqli);
        header('Location: ../../pages/instructor/class/newRoom.php');
    }
}
?>
