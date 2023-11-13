<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../../controllers/connect.php');
$query = "SELECT user_id, username, email, first_name, last_name FROM users WHERE role = 'student'";
$result = mysqli_query($conn, $query);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<?php include("../../../templates/head_tag.php") ?>

<body>

    <!-- navbar -->
    <?php include("../../../templates/navbar.php") ?>

    <div class="tutor-wrap tutor-wrap-parent tutor-dashboard tutor-frontend-dashboard tutor-dashboard-student tutor-pb-80 container mt-5">
        <div class="tutor-container">
            <div class="tutor-row tutor-d-flex tutor-justify-between tutor-frontend-dashboard-header">
                <div class="tutor-header-left-side tutor-dashboard-header tutor-col-md-6 tutor-d-flex tutor-align-center" style="border: none;">
                    <div class="tutor-dashboard-header-avatar">
                        <div class="tutor-avatar tutor-avatar-xl">
                            <div class="tutor-ratio tutor-ratio-1x1"><img src="https://themesvila.com/themes-wp/edusion/wp-content/uploads/2023/11/team3-150x150.jpg" alt="Kenneth Renteria" /> </div>
                        </div>
                    </div>

                    <div class="tutor-user-info tutor-ml-24">
                        <div class="tutor-fs-4 tutor-fw-medium tutor-color-black tutor-dashboard-header-username">
                            Kenneth Renteria </div>
                        <div class="tutor-dashboard-header-stats">
                            <div class="tutor-dashboard-header-ratings">
                                <div class="tutor-ratings tutor-ratings-">
                                    <div class="tutor-ratings-stars">
                                        <span class="tutor-icon-star-line"></span><span class="tutor-icon-star-line"></span><span class="tutor-icon-star-line"></span><span class="tutor-icon-star-line"></span><span class="tutor-icon-star-line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tutor-header-right-side tutor-col-md-6 tutor-d-flex tutor-justify-end tutor-mt-20 tutor-mt-md-0">
                    <div class="tutor-d-flex tutor-align-center">
                        <a href="../class/newRoom.php" class="tutor-btn tutor-btn-outline-primary">
                            <i class="tutor-icon-plus-square tutor-my-n4 tutor-mr-8"></i>
                            Create a New Room </a>
                    </div>
                </div>
            </div>

            <div class="tutor-row tutor-frontend-dashboard-maincontent">
                <div class="tutor-col-12 tutor-col-md-4 tutor-col-lg-3 tutor-dashboard-left-menu">
                    <ul class="tutor-dashboard-permalinks">
                        <li class='tutor-dashboard-menu-item tutor-dashboard-menu-index'>
                            <a href="../dashboard/" class='tutor-dashboard-menu-item-link tutor-fs-6 tutor-color-black'>
                                <span class='tutor-icon-dashboard tutor-dashboard-menu-item-icon'></span> <span class='tutor-dashboard-menu-item-text tutor-ml-12'>
                                    Dashboard </span>
                            </a>
                        </li>
                        <li class='tutor-dashboard-menu-item tutor-dashboard-menu-my-courses active'>
                            <a href="../students/" class='tutor-dashboard-menu-item-link tutor-fs-6 tutor-color-black'>
                                <span class='tutor-icon-rocket tutor-dashboard-menu-item-icon'></span> <span class='tutor-dashboard-menu-item-text tutor-ml-12'>
                                    Students Details </span>
                            </a>
                        </li>
                        <li class="tutor-dashboard-menu-divider"></li>
                        <li class='tutor-dashboard-menu-item tutor-dashboard-menu-settings '>
                            <a href="../profile/" class='tutor-dashboard-menu-item-link tutor-fs-6 tutor-color-black'>
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
                <div class="tutor-col-12 tutor-col-md-8 tutor-col-lg-9">
                    <div class="tutor-dashboard-content">

                        <div class="container mt-5">
                            <h2>All Students</h2>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($student = mysqli_fetch_assoc($result)) : ?>
                                            <tr>
                                                <td><?php echo $student['user_id']; ?></td>
                                                <td><?php echo $student['username']; ?></td>
                                                <td><?php echo $student['email']; ?></td>
                                                <td><?php echo $student['first_name']; ?></td>
                                                <td><?php echo $student['last_name']; ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("../../../templates/footer2.php") ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>