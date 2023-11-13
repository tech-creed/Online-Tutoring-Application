<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../../controllers/connect.php');
if (isset($_SESSION['sess_id']) && isset($_SESSION['user_id']) && isset($_SESSION['role'])) {
    $user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];
}else{
    header("Location: ../../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("../../../templates/head_tag.php") ?>
<style>
    #loadingMessage {
        display: none;
        text-align: center;
        padding: 10px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-top: 10px;
    }

    .spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-radius: 50%;
        border-top: 4px solid #3498db;
        width: 30px;
        height: 30px;
        animation: spin 1s linear infinite;
        margin: 0 auto;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .btn {
        background-color: #2ECA7F;
        border-color: #2ECA7F;
        color: #ffffff;
    }

    .btn:hover {
        background-color: #2ECA7F;
        border-color: #2ECA7F;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control:focus {
        border-color: #2ECA7F;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }

    #selectedStudents {
        margin-top: 10px;
    }

    .badge {
        background-color: #2ECA7F;
        color: #ffffff;
    }

    .close {
        cursor: pointer;
        font-size: 18px;
        font-weight: bold;
        color: #ffffff;
        background-color: #dc3545;
        border: 1px solid #dc3545;
        padding: 3px 8px;
        border-radius: 3px;
    }

    .close:hover {
        background-color: #a33;
        border: 1px solid #a33;
    }

    .form-control[multiple] {
        height: auto;
    }

    select[multiple] option:checked {
        background-color: #007bff;
        color: #ffffff;
    }
</style>

<body>

    <!-- navbar -->
    <?php include("../../../templates/navbar.php") ?>

    <div class="tutor-wrap tutor-wrap-parent tutor-dashboard tutor-frontend-dashboard tutor-dashboard-student container mt-5">
        <h2>Edit Room Details</h2>
        <br>
        <form action="../../../controllers/instructor/roomEdit.php" method="post" onsubmit="return disableSubmitButton()">
        <?php
                    if (isset($_SESSION['success'])) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            ' . $_SESSION['success'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                        unset($_SESSION['success']);
                    } elseif (isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            ' . $_SESSION['error'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                        unset($_SESSION['error']);
                    }
                    ?>
            <div class="row"><?php
                                $meeting_id = $_GET['meeting_id'] ?? null;

                                if ($meeting_id === null) {
                                    header("Location: ../../404.php");
                                    exit();
                                }
                                $selectedStudentsQuery = "SELECT student_id FROM rooms WHERE meeting_id = $meeting_id";
                                $selectedStudentsResult = mysqli_query($conn, $selectedStudentsQuery);
                                $selectedStudentIds = [];

                                while ($row = mysqli_fetch_assoc($selectedStudentsResult)) {
                                    $selectedStudentIds[] = $row['student_id'];
                                }

                                $query = "SELECT * FROM rooms WHERE meeting_id = $meeting_id";
                                $result = mysqli_query($conn, $query);
                                $room = mysqli_fetch_assoc($result);
                                ?>

                <div class="form-group col-12">
                    <label for="meetingTitle">Meeting Title:</label>
                    <input type="text" class="form-control" id="meetingTitle" name="meetingTitle" value="<?php echo $room['meeting_title']; ?>" required>
                </div>
                <div class="form-group col-6">
                    <label for="meetingDate">Date:</label>
                    <input type="date" class="form-control" id="meetingDate" name="meetingDate" value="<?php echo $room['date']; ?>" required>
                </div>
                <div class="form-group col-6">
                    <label for="meetingTime">Time:</label>
                    <input type="time" class="form-control" id="meetingTime" name="meetingTime" value="<?php echo $room['time']; ?>" required>
                </div>
                <div class="form-group col-5">
                    <label for="meetingDuration">Duration (in minutes):</label>
                    <input type="number" class="form-control" id="meetingDuration" name="meetingDuration" value="<?php echo $room['duration']; ?>" required>
                </div>
                <div class="form-group col-12">
                    <label for="meetingLink">Meeting Link:</label>
                    <input type="text" class="form-control" id="meetingLink" name="meetingLink" value="<?php echo $room['meeting_link']; ?>">
                </div>
                <input type="hidden" name="meetingId" value="<?php echo $meeting_id; ?>">

                <div class="form-group col-8">
                    <label for="studentId">Select Student:</label>
                    <select class="form-control" id="studentId" name="studentId">
                        <option value="" selected disabled>Select a student</option>
                        <?php
                        $query = "SELECT user_id, first_name, last_name FROM users WHERE role = 'student'";
                        $result = mysqli_query($conn, $query);

                        while ($row = $result->fetch_assoc()) {
                            $selected = in_array($row['user_id'], $selectedStudentIds) ? 'disabled' : '';
                            echo '<option value="' . $row['user_id'] . '" ' . $selected . '>' . $row['first_name'] . ' ' . $row['last_name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-4">
                    <lable for="addStudentBtn"> </lable>
                    <button type="button" style="margin-top: 7%;" class="btn" id="addStudentBtn">Add Student</button>
                </div>

                <div id="selectedStudentSection" class="form-group mt-3 col-12">
                    <label>Selected Students:</label>
                    <div id="selectedStudents" class="d-flex flex-wrap">
                        <?php
                        $selectedStudentsQuery = "SELECT student_id FROM rooms WHERE meeting_id = $meeting_id";
                        $selectedStudentsResult = mysqli_query($conn, $selectedStudentsQuery);
                        $selectedStudentIdsFromDb = [];
                        while ($row = mysqli_fetch_assoc($selectedStudentsResult)) {
                            $selectedStudentIdsFromDb[] = $row['student_id'];
                        }

                        foreach ($selectedStudentIdsFromDb as $studentId) {
                            $studentQuery = "SELECT first_name, last_name FROM users WHERE user_id = $studentId";
                            $studentResult = mysqli_query($conn, $studentQuery);
                            $studentData = mysqli_fetch_assoc($studentResult);

                            echo '<span class="badge badge-primary mr-2" data-student-id="' . $studentId . '">' . $studentData['first_name'] . ' ' . $studentData['last_name'] . '  ' .
                                '<button type="button" class="close" aria-label="Close" onclick="removeStudent(\'' . $studentId . '\')">
                <span aria-hidden="true">X</span>
            </button>
        </span>';
                        }
                        ?>
                    </div>
                </div>

                <input type="hidden" id="selectedStudentIds" name="selectedStudentIds" value='<?php echo json_encode($selectedStudentIds); ?>'>

                <button style="text-align: center;" type="submit" id="submitBtn" class="btn col-12">Update Room</button>
                <div id="loadingMessage" class="mt-3">
                    <div class="spinner"></div>
                    <p class="mt-2">Loading...</p>
                </div>
            </div>
        </form>
    </div>

    <?php include("../../../templates/footer.php") ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectedStudentIds = [];

            try {
                var initialValue = document.getElementById('selectedStudentIds').value;
                if (initialValue && initialValue.trim() !== '') {
                    selectedStudentIds = JSON.parse(initialValue);
                }
            } catch (error) {
                console.error('Error parsing initial value:', error);
            }

            function addStudent(studentId, studentName) {
                var selectedStudentSection = document.querySelector("#selectedStudentSection");
                selectedStudentSection.style.display = 'block';
                var badge = '<span class="badge badge-primary mr-2" data-student-id="' + studentId + '" style="margin-left: 10px;">' + studentName + '   ' +
                    '<button type="button" class="close" aria-label="Close" onclick="removeStudent(\'' + studentId + '\')">' +
                    '<span aria-hidden="true" >X</span>' +
                    '</button>' +
                    '</span>';
                document.getElementById('selectedStudents').insertAdjacentHTML('beforeend', badge);

                selectedStudentIds.push(studentId);

                document.getElementById('selectedStudentIds').value = JSON.stringify(selectedStudentIds);
            }

            window.removeStudent = function(studentId) {
                document.querySelector('#studentId option[value="' + studentId + '"]').disabled = false;

                var badgeToRemove = document.querySelector('#selectedStudents [data-student-id="' + studentId + '"]');
                if (badgeToRemove) {
                    badgeToRemove.parentNode.removeChild(badgeToRemove);
                }
                selectedStudentIds = selectedStudentIds.filter(id => id !== studentId);

                document.getElementById('selectedStudentIds').value = JSON.stringify(selectedStudentIds);
            };

            document.getElementById('addStudentBtn').addEventListener('click', function() {
                var selectedOption = document.getElementById('studentId').options[document.getElementById('studentId').selectedIndex];

                if (selectedOption && !selectedOption.disabled) {
                    addStudent(selectedOption.value, selectedOption.text);
                    selectedOption.disabled = true;
                }
            });
        });

        function disableSubmitButton() {
            document.getElementById("submitBtn").disabled = true;
            document.getElementById("loadingMessage").style.display = "block";
            return true;
        }
    </script>

</body>

</html>