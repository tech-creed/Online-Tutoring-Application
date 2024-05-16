<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../connect.php');

ob_start();
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

    $selectedStudentsQuery = "SELECT student_id FROM rooms WHERE meeting_id = $meetingId";
    $selectedStudentsResult = mysqli_query($conn, $selectedStudentsQuery);

    if ($selectedStudentsResult === false) {
        $error = "Error fetching currently selected students: " . mysqli_error($conn);
        $_SESSION['error'] = $error;
        echo $error;
        header('Location: ../../pages/instructor/class/editRoom.php');
        exit();
    }

    $selectedStudentIdsFromDb = [];
    while ($row = mysqli_fetch_assoc($selectedStudentsResult)) {
        $selectedStudentIdsFromDb[] = $row['student_id'];
    }

    foreach ($selectedStudentIdsFromDb as $existingStudentId) {
        if (!in_array($existingStudentId, $selectedStudentIds)) {
            $deleteQuery = "DELETE FROM rooms WHERE meeting_id = ? AND student_id = ?";
            $deleteStmt = mysqli_prepare($conn, $deleteQuery);
            mysqli_stmt_bind_param($deleteStmt, "ii", $meetingId, $existingStudentId);
            mysqli_stmt_execute($deleteStmt);

            if ($deleteStmt === false) {
                $error = "Error deleting rows: " . mysqli_error($conn);
                $_SESSION['error'] = $error;
                echo $error;
                header('Location: ../../pages/instructor/class/editRoom.php');
                exit();
            }

            mysqli_stmt_close($deleteStmt);
        }
    }

    foreach ($selectedStudentIds as $studentId) {
        $checkQuery = "SELECT * FROM rooms WHERE meeting_id = ? AND student_id = ?";
        $checkStmt = mysqli_prepare($conn, $checkQuery);
        mysqli_stmt_bind_param($checkStmt, "ii", $meetingId, $studentId);
        mysqli_stmt_execute($checkStmt);
        $result = mysqli_stmt_get_result($checkStmt);

        if ($result === false) {
            $error = "Error checking for existing rows: " . mysqli_error($conn);
            $_SESSION['error'] = $error;
            echo $error;
            header('Location: ../../pages/instructor/class/editRoom.php');
            exit();
        }

        if (mysqli_num_rows($result) > 0) {
            // Update existing row
            $updateQuery = "UPDATE rooms SET meeting_title = ?, date = ?, time = ?, duration = ?, meeting_link = ? WHERE meeting_id = ? AND student_id = ?";
            $updateStmt = mysqli_prepare($conn, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "sssssis", $meetingTitle, $meetingDate, $meetingTime, $meetingDuration, $meetingLink, $meetingId, $studentId);
            mysqli_stmt_execute($updateStmt);

            if ($updateStmt === false) {
                $error = "Error updating row: " . mysqli_error($conn);
                $_SESSION['error'] = $error;
                echo $error;
                header('Location: ../../pages/instructor/class/editRoom.php');
                exit();
            }

            $success =  "Room updated successfully!";
            $_SESSION['success'] = $success;
        } else {
            // Insert new row
            $insertQuery = "INSERT INTO rooms (meeting_id, student_id, meeting_title, date, time, duration, meeting_link, is_closed) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = mysqli_prepare($conn, $insertQuery);
            $is_closed = "false";
            mysqli_stmt_bind_param($insertStmt, "iisssiss", $meetingId, $studentId, $meetingTitle, $meetingDate, $meetingTime, $meetingDuration, $meetingLink, $is_closed);
            mysqli_stmt_execute($insertStmt);

            if ($insertStmt === false) {
                $error = "Error inserting new row: " . mysqli_error($conn);
                $_SESSION['error'] = $error;
                echo $error;
                header('Location: ../../pages/instructor/class/editRoom.php');
                exit();
            }

            // Update all row
            $updateQuery = "UPDATE rooms SET meeting_title = ?, date = ?, time = ?, duration = ?, meeting_link = ? WHERE meeting_id = ? AND student_id = ?";
            $updateStmt = mysqli_prepare($conn, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "sssssis", $meetingTitle, $meetingDate, $meetingTime, $meetingDuration, $meetingLink, $meetingId, $studentId);
            mysqli_stmt_execute($updateStmt);

            if ($updateStmt === false) {
                $error = "Error updating row: " . mysqli_error($conn);
                $_SESSION['error'] = $error;
                echo $error;
                header('Location: ../../pages/instructor/class/editRoom.php');
                exit();
            }

            $success =  "Room updated successfully!";
            $_SESSION['success'] = $success;
        }

        mysqli_stmt_close($checkStmt);
    }
    mysqli_close($conn);
    header('Location: ../../pages/instructor/class/editRoom.php?meeting_id=' . $meetingId);
    exit();
} else {
    $error = "Invalid request method";
    header('Location: ../../pages/404.php');
    exit();
}

ob_end_flush();
?>

