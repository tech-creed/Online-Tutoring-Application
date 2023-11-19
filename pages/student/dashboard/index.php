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

<script src="https://kit.fontawesome.com/5fe2f4c2ef.js" crossorigin="anonymous"></script>
<style>
  #enrolledCoursesTabs .nav-link {
    background-color: #fff;
    color: #2eca7f;
  }

  #enrolledCoursesTabs .nav-link.active {
    background-color: #2eca7f;
    color: #fff;
  }

  .card {
    border: 1px solid #2eca7f;
    border-radius: 10px;
    margin-bottom: 15px;
  }
</style>

<body class="page-template-default page page-id-8 logged-in wp-embed-responsive theme-edusion tutor-lms tutor-screen-frontend-dashboard woocommerce-no-js elementor-default elementor-kit-7">
  <!-- navbar -->
  <?php include("../../../templates/navbar.php") ?>

  <div class="tutor-wrap tutor-wrap-parent tutor-dashboard tutor-frontend-dashboard tutor-dashboard-student">
    <div class="tutor-container">
      <div class="tutor-row tutor-d-flex tutor-justify-between tutor-frontend-dashboard-header">
        <div class="tutor-header-left-side tutor-dashboard-header tutor-col-md-6 tutor-d-flex tutor-align-center" style="border: none">
          <div class="tutor-dashboard-header-avatar">
            <div class="tutor-avatar tutor-avatar-xl">
              <div class="tutor-ratio tutor-ratio-1x1">
                <img src="../../../assets/img/student-profile.png" alt="Student Profile Icon" />
              </div>
            </div>
          </div>

          <div class="tutor-user-info tutor-ml-24">
            <div class="tutor-dashboard-header-display-name tutor-color-black">
              <div class="tutor-fs-5 tutor-dashboard-header-greetings">
                Hello,
              </div>
              <div class="tutor-fs-4 tutor-fw-medium tutor-dashboard-header-username">
                <?php echo $_SESSION['name']?>
              </div>
            </div>
          </div>
        </div>
        <div class="tutor-header-right-side tutor-col-md-6 tutor-d-flex tutor-justify-end tutor-mt-20 tutor-mt-md-0">
          <div class="tutor-d-flex tutor-align-center"></div>
        </div>
      </div>

      <div class="tutor-row tutor-frontend-dashboard-maincontent">
        <div class="tutor-col-12 tutor-col-md-4 tutor-col-lg-3 tutor-dashboard-left-menu">
          <ul class="tutor-dashboard-permalinks">
            <li class='tutor-dashboard-menu-item tutor-dashboard-menu-index active'>
              <a href="../dashboard/" class='tutor-dashboard-menu-item-link tutor-fs-6 tutor-color-black'>
                <span class='tutor-icon-dashboard tutor-dashboard-menu-item-icon'></span> <span class='tutor-dashboard-menu-item-text tutor-ml-12'>
                  Dashboard </span>
              </a>
            </li>
            <li class='tutor-dashboard-menu-item tutor-dashboard-menu-my-courses '>
              <a href="../profile/" class='tutor-dashboard-menu-item-link tutor-fs-6 tutor-color-black'>
              <span class="tutor-icon-user-bold tutor-dashboard-menu-item-icon"></span> <span class='tutor-dashboard-menu-item-text tutor-ml-12'>
                  Profile </span>
              </a>
            </li>
            <li class="tutor-dashboard-menu-divider"></li>
            <li class='tutor-dashboard-menu-item tutor-dashboard-menu-settings '>
              <a href="#" class='tutor-dashboard-menu-item-link tutor-fs-6 tutor-color-black'>
                <span class='tutor-icon-gear tutor-dashboard-menu-item-icon'></span> <span class='tutor-dashboard-menu-item-text tutor-ml-12'>
                  Settings </span>
              </a>
            </li>
            <li class='tutor-dashboard-menu-item tutor-dashboard-menu-logout '>
              <a data-no-instant href="../../../controllers/logout.php" class='tutor-dashboard-menu-item-link tutor-fs-6 tutor-color-black'>
                <span class='tutor-icon-signout tutor-dashboard-menu-item-icon'></span> <span class='tutor-dashboard-menu-item-text tutor-ml-12'>
                  Logout </span>
              </a>
            </li>
          </ul>
        </div>

        <?php
        $studentId = $user_id;

        // Fetch total Enrolled Courses
        $queryEnrolledCourses = "SELECT COUNT(*) AS total_enrolled FROM rooms WHERE student_id = $studentId";
        $resultEnrolledCourses = mysqli_query($conn, $queryEnrolledCourses);
        $rowEnrolledCourses = mysqli_fetch_assoc($resultEnrolledCourses);
        $totalEnrolledCourses = $rowEnrolledCourses['total_enrolled'];
        
        // Fetch total Active Courses
        $queryActiveCourses = "SELECT COUNT(*) AS total_active FROM rooms WHERE student_id = $studentId AND is_closed = 'false'";
        $resultActiveCourses = mysqli_query($conn, $queryActiveCourses);
        $rowActiveCourses = mysqli_fetch_assoc($resultActiveCourses);
        $totalActiveCourses = $rowActiveCourses['total_active'];
        
        // Fetch total Completed Courses
        $queryCompletedCourses = "SELECT COUNT(*) AS total_completed FROM rooms WHERE student_id = $studentId AND is_closed = 'true'";
        $resultCompletedCourses = mysqli_query($conn, $queryCompletedCourses);
        $rowCompletedCourses = mysqli_fetch_assoc($resultCompletedCourses);
        $totalCompletedCourses = $rowCompletedCourses['total_completed'];
        ?>
        <div class="tutor-col-12 tutor-col-md-8 tutor-col-lg-9">
          <div class="tutor-dashboard-content">
            <div class="tutor-fs-5 tutor-fw-medium tutor-color-black tutor-capitalize-text tutor-mb-24 tutor-dashboard-title">
              Dashboard
            </div>
            <div class="tutor-dashboard-content-inner">
              <div class="tutor-row tutor-gx-lg-4">
                <div class="tutor-col-lg-6 tutor-col-xl-4 tutor-mb-16 tutor-mb-lg-32">
                  <div class="tutor-card">
                    <div class="tutor-d-flex tutor-flex-lg-column tutor-align-center tutor-text-lg-center tutor-px-12 tutor-px-lg-24 tutor-py-8 tutor-py-lg-32">
                      <span class="tutor-round-box tutor-mr-12 tutor-mr-lg-0 tutor-mb-lg-12">
                        <i class="tutor-icon-book-open" area-hidden="true"></i>
                      </span>
                      <div class="tutor-fs-3 tutor-fw-bold tutor-d-none tutor-d-lg-block">
                        <?php echo $totalEnrolledCourses;?>
                      </div>
                      <div class="tutor-fs-7 tutor-color-secondary">
                        Total Enrolled Classes
                      </div>
                      <div class="tutor-fs-4 tutor-fw-bold tutor-d-block tutor-d-lg-none tutor-ml-auto">
                      <?php echo $totalEnrolledCourses;?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tutor-col-lg-6 tutor-col-xl-4 tutor-mb-16 tutor-mb-lg-32">
                  <div class="tutor-card">
                    <div class="tutor-d-flex tutor-flex-lg-column tutor-align-center tutor-text-lg-center tutor-px-12 tutor-px-lg-24 tutor-py-8 tutor-py-lg-32">
                      <span class="tutor-round-box tutor-mr-12 tutor-mr-lg-0 tutor-mb-lg-12">
                        <i class="tutor-icon-mortarboard-o" area-hidden="true"></i>
                      </span>
                      <div class="tutor-fs-3 tutor-fw-bold tutor-d-none tutor-d-lg-block">
                      <?php echo $totalActiveCourses;?>
                      </div>
                      <div class="tutor-fs-7 tutor-color-secondary">
                        Active Classes
                      </div>
                      <div class="tutor-fs-4 tutor-fw-bold tutor-d-block tutor-d-lg-none tutor-ml-auto">
                      <?php echo $totalActiveCourses;?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tutor-col-lg-6 tutor-col-xl-4 tutor-mb-16 tutor-mb-lg-32">
                  <div class="tutor-card">
                    <div class="tutor-d-flex tutor-flex-lg-column tutor-align-center tutor-text-lg-center tutor-px-12 tutor-px-lg-24 tutor-py-8 tutor-py-lg-32">
                      <span class="tutor-round-box tutor-mr-12 tutor-mr-lg-0 tutor-mb-lg-12">
                        <i class="tutor-icon-trophy" area-hidden="true"></i>
                      </span>
                      <div class="tutor-fs-3 tutor-fw-bold tutor-d-none tutor-d-lg-block">
                      <?php echo $totalCompletedCourses;?>
                        
                      </div>
                      <div class="tutor-fs-7 tutor-color-secondary">
                        Completed Classes
                      </div>
                      <div class="tutor-fs-4 tutor-fw-bold tutor-d-block tutor-d-lg-none tutor-ml-auto">
                      <?php echo $totalCompletedCourses;?>
                        
                      </div>
                    </div>
                  </div>
                </div>

                <?php

                $queryActiveRooms = "SELECT meeting_id, meeting_title, date, time, duration, meeting_link, is_closed FROM rooms WHERE is_closed = 'false' AND student_id = '$user_id'";
                $queryClosedRooms = "SELECT meeting_id, meeting_title, date, time, duration, meeting_link, is_closed FROM rooms WHERE is_closed = 'true' AND student_id = '$user_id'";

                $resultActiveRooms = mysqli_query($conn, $queryActiveRooms);
                $resultClosedRooms = mysqli_query($conn, $queryClosedRooms);

                $activeRooms = mysqli_fetch_all($resultActiveRooms, MYSQLI_ASSOC);
                $closedRooms = mysqli_fetch_all($resultClosedRooms, MYSQLI_ASSOC);
                ?>
                <div class="tutor-dashboard-content">
                  <div class="tutor-fs-5 tutor-fw-medium tutor-color-black tutor-mb-16 tutor-capitalize-text">Classrooms</div>
                  <div class="tutor-dashboard-content-inner enrolled-courses">
                    <div class="tutor-mb-32">
                      <ul class="nav nav-tabs" id="enrolledCoursesTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="activeRoomsTab" data-bs-toggle="tab" href="#activeRoomsContent" role="tab" aria-controls="activeRoomsContent" aria-selected="true">Active Rooms</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="closedRoomsTab" data-bs-toggle="tab" href="#closedRoomsContent" role="tab" aria-controls="closedRoomsContent" aria-selected="false">Closed Rooms</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="enrolledCoursesTabContent">
                        <!-- Active Rooms Tab Content -->
                        <div class="tab-pane fade show active" id="activeRoomsContent" role="tabpanel" aria-labelledby="activeRoomsTab">
                          <?php
                          foreach ($activeRooms as $room) {
                            echo '<div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Meeting Title: ' . $room['meeting_title'] . '</h5>
                                                        <p class="card-text">Date: ' . $room['date'] . '</p>
                                                        <p class="card-text">Time: ' . $room['time'] . '</p>
                                                        <p class="card-text">Duration: ' . $room['duration'] . ' Mins' . '</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    <div class="btn-group" role="group">
                                        <a href="' . $room['meeting_link'] . '" class="btn btn-primary"><i class="fa-solid fa-chalkboard" style="color: #f40b0b;"></i> Join Now</a>
                                        </div>
                                </div>
                                            </div>
                                          </div>';
                          }
                          ?>
                        </div>

                        <!-- Closed Rooms Tab Content -->
                        <div class="tab-pane fade" id="closedRoomsContent" role="tabpanel" aria-labelledby="closedRoomsTab">
                          <?php
                          foreach ($closedRooms as $room) {
                            echo '<div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-6">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Meeting Title: ' . $room['meeting_title'] . '</h5>
                                                        <p class="card-text">Date: ' . $room['date'] . '</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card-body"> 
                                                        <p class="card-text">Time: ' . $room['time'] . '</p>
                                                        <p class="card-text">Duration: ' . $room['duration'] . ' Mins' . '</p>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>';
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="tutor-dashboard-footer-mobile">
            <div class="tutor-container">
                <div class="tutor-row">
                    <a class="tutor-col-4 active" href="../dashboard/">
                        <i class="ttr tutor-icon-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                    <a class="tutor-col-4 " href="../profile/">
                    <i class="tutor-icon-user-bold tutor-dashboard-menu-item-icon"></i>
                        <span>Profile</span>
                    </a>
                    <a class="tutor-col-4 " href="../settings/">
                    <i class='tutor-icon-gear tutor-dashboard-menu-item-icon'></i>
                        <span>Settings</span>
                    </a>
                </div>
            </div>
        </div>
  </div>

  <!-- footer -->
  <?php include("../../../templates/footer.php") ?>
  <?php include('../../../templates/footer_link.php') ?>

</body>

</html>