<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../connect.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $meetingTitle = $_POST['meetingTitle'];
    $meetingDate = $_POST['meetingDate'];
    $meetingTime = $_POST['meetingTime'];
    $meetingDuration = $_POST['meetingDuration'];
    $meetingLink = $_POST['meetingLink'];
    $meetingId = $_POST['meetingId'];
    $selectedStudentIds = isset($_POST['selectedStudentIds']) ? json_decode($_POST['selectedStudentIds'], true) : [];

    foreach ($selectedStudentIds as $studentId) {
        $checkQuery = "SELECT * FROM rooms WHERE meeting_id = ? AND student_id = ?";
        $checkStmt = mysqli_prepare($conn, $checkQuery);
        mysqli_stmt_bind_param($checkStmt, "ii", $meetingId, $studentId);
        mysqli_stmt_execute($checkStmt);
        $result = mysqli_stmt_get_result($checkStmt);

        if (mysqli_num_rows($result) > 0) {
            // update all row
            $updateQuery = "UPDATE rooms SET meeting_title = ?, date = ?, time = ?, duration = ?, meeting_link = ? WHERE meeting_id = ? AND student_id = ?";
            $updateStmt = mysqli_prepare($conn, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "sssssis", $meetingTitle, $meetingDate, $meetingTime, $meetingDuration, $meetingLink, $meetingId, $studentId);
            mysqli_stmt_execute($updateStmt);

            $success =  "Room updated successfully!";
            $_SESSION['success'] = $success;
            echo $success;
            // header('Location: ');
        } else {
            // insert new stu
            $insertQuery = "INSERT INTO rooms (meeting_id, student_id, meeting_title, date, time, duration, meeting_link, is_closed) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = mysqli_prepare($conn, $insertQuery);
            $is_closed = "false";
            mysqli_stmt_bind_param($insertStmt, "iisssiss", $meetingId, $studentId, $meetingTitle, $meetingDate, $meetingTime, $meetingDuration, $meetingLink, $is_closed);
            mysqli_stmt_execute($insertStmt);

            // update all row
            $updateQuery = "UPDATE rooms SET meeting_title = ?, date = ?, time = ?, duration = ?, meeting_link = ? WHERE meeting_id = ? AND student_id = ?";
            $updateStmt = mysqli_prepare($conn, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "sssssis", $meetingTitle, $meetingDate, $meetingTime, $meetingDuration, $meetingLink, $meetingId, $studentId);
            mysqli_stmt_execute($updateStmt);
            
            $success =  "Room updated & new student added successfully!";
            $_SESSION['success'] = $success;
            echo $success;

            // header('Location: ');
        }
        mysqli_stmt_close($checkStmt);
    }
    mysqli_close($conn);
}

?>