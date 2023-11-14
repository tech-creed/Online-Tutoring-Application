<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../../controllers/connect.php');
if (isset($_SESSION['sess_id']) && isset($_SESSION['user_id']) && isset($_SESSION['role'])) {
    $user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];
} else {
    header("Location: ../../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include("../../../templates/head_tag.php") ?>

<script src="https://kit.fontawesome.com/5fe2f4c2ef.js" crossorigin="anonymous"></script>

<body class="page-template-default page page-id-8 logged-in wp-embed-responsive theme-edusion tutor-lms tutor-screen-frontend-dashboard woocommerce-no-js elementor-default elementor-kit-7">
    <!-- navbar -->
    <?php include("../../../templates/navbar.php") ?>
    <div class="tutor-wrap tutor-wrap-parent tutor-dashboard tutor-frontend-dashboard tutor-dashboard-student">
        <div class="tutor-container">
            <div class="tutor-row tutor-d-flex tutor-justify-between tutor-frontend-dashboard-header">
                <div class="tutor-header-left-side tutor-dashboard-header tutor-col-md-6 tutor-d-flex tutor-align-center" style="border: none;">
                    <div class="tutor-dashboard-header-avatar">
                        <div class="tutor-avatar tutor-avatar-xl">
                        <div class="tutor-ratio tutor-ratio-1x1"><img src="../../../assets/img/instructor-img.jpeg" alt="Instructor Profile Icon" /> </div>
                        </div>
                    </div>

                    <div class="tutor-user-info tutor-ml-24">
                        <div class="tutor-fs-4 tutor-fw-medium tutor-color-black tutor-dashboard-header-username">
                            <?php echo $_SESSION['name'] ?> </div>
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
                        <li class='tutor-dashboard-menu-item tutor-dashboard-menu-my-courses '>
                            <a href="../students/" class='tutor-dashboard-menu-item-link tutor-fs-6 tutor-color-black'>
                                <span class='tutor-icon-rocket tutor-dashboard-menu-item-icon'></span> <span class='tutor-dashboard-menu-item-text tutor-ml-12'>
                                    Students Details </span>
                            </a>
                        </li>
                        <li class='tutor-dashboard-menu-item tutor-dashboard-menu-my-courses active'>
                            <a href="../profile/" class='tutor-dashboard-menu-item-link tutor-fs-6 tutor-color-black'>
                            <span class="tutor-icon-user-bold tutor-dashboard-menu-item-icon"></span> <span class='tutor-dashboard-menu-item-text tutor-ml-12'>
                                    Profile </span>
                            </a>
                        </li>
                        <li class="tutor-dashboard-menu-divider"></li>
                        <li class='tutor-dashboard-menu-item tutor-dashboard-menu-settings '>
                            <a href="../settings/" class='tutor-dashboard-menu-item-link tutor-fs-6 tutor-color-black'>
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
                    <div class="tutor-col-12 tutor-col-md-8 tutor-col-lg-9">
                        <div class="tutor-dashboard-content">
                            <?php $userData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'"));?>
                            <div class="tutor-fs-5 tutor-fw-medium tutor-color-black tutor-mb-24">My Profile</div>
                            <div class="tutor-dashboard-content-inner tutor-dashboard-profile-data">
                                <div class="tutor-row tutor-mb-24">
                                    <div class="tutor-col-12 tutor-col-sm-5 tutor-col-lg-3">
                                        <span class="tutor-fs-6 tutor-color-secondary">Registration Date</span>
                                    </div>
                                    <div class="tutor-col-12 tutor-col-sm-7 tutor-col-lg-9">
                                        <span class="tutor-fs-6 tutor-fw-medium tutor-color-black"><?php echo $userData['reg_date']?></span>
                                    </div>
                                </div>
                                <div class="tutor-row tutor-mb-24">
                                    <div class="tutor-col-12 tutor-col-sm-5 tutor-col-lg-3">
                                        <span class="tutor-fs-6 tutor-color-secondary">First Name</span>
                                    </div>
                                    <div class="tutor-col-12 tutor-col-sm-7 tutor-col-lg-9">
                                        <span class="tutor-fs-6 tutor-fw-medium tutor-color-black"><?php echo $userData['first_name']?></span>
                                    </div>
                                </div>
                                <div class="tutor-row tutor-mb-24">
                                    <div class="tutor-col-12 tutor-col-sm-5 tutor-col-lg-3">
                                        <span class="tutor-fs-6 tutor-color-secondary">Last Name</span>
                                    </div>
                                    <div class="tutor-col-12 tutor-col-sm-7 tutor-col-lg-9">
                                        <span class="tutor-fs-6 tutor-fw-medium tutor-color-black"><?php echo $userData['last_name']?></span>
                                    </div>
                                </div>
                                <div class="tutor-row tutor-mb-24">
                                    <div class="tutor-col-12 tutor-col-sm-5 tutor-col-lg-3">
                                        <span class="tutor-fs-6 tutor-color-secondary">Email</span>
                                    </div>
                                    <div class="tutor-col-12 tutor-col-sm-7 tutor-col-lg-9">
                                        <span class="tutor-fs-6 tutor-fw-medium tutor-color-black"><?php echo $userData['email']?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
    <!-- footer -->
    <?php include("../../../templates/footer.php") ?>

</body>

</html>