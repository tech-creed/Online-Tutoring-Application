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
                            <div class="tutor-ratio tutor-ratio-1x1"><img src="https://themesvila.com/themes-wp/edusion/wp-content/uploads/2023/11/team3-150x150.jpg" alt="Kenneth Renteria" /> </div>
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
                        <li class='tutor-dashboard-menu-item tutor-dashboard-menu-my-courses'>
                            <a href="../profile/" class='tutor-dashboard-menu-item-link tutor-fs-6 tutor-color-black'>
                            <span class="tutor-icon-user-bold tutor-dashboard-menu-item-icon"></span> <span class='tutor-dashboard-menu-item-text tutor-ml-12'>
                                    Profile </span>
                            </a>
                        </li>
                        <li class="tutor-dashboard-menu-divider"></li>
                        <li class='tutor-dashboard-menu-item tutor-dashboard-menu-settings active'>
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
                            <div class="tutor-fs-5 tutor-fw-medium tutor-color-black tutor-mb-16 tutor-capitalize-text">Settings</div>
                            <div class="tutor-dashboard-content-inner enrolled-courses">
                                <div class="tutor-mb-32">
                                    <ul class="nav nav-tabs" id="enrolledCoursesTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="activeRoomsTab" data-bs-toggle="tab" href="#activeRoomsContent" role="tab" aria-controls="activeRoomsContent" aria-selected="true">Profile</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="closedRoomsTab" data-bs-toggle="tab" href="#closedRoomsContent" role="tab" aria-controls="closedRoomsContent" aria-selected="false">Password</a>
                                        </li>
                                    </ul>
                                    <div style="padding-top:4%;" class="tab-content" id="enrolledCoursesTabContent">
                                        <div class="tab-pane fade show active" id="activeRoomsContent" role="tabpanel" aria-labelledby="activeRoomsTab">
                                            <div class="tutor-dashboard-setting-profile tutor-dashboard-content-inner">
                                                <div id="tutor_profile_cover_photo_editor">

                                                    <input id="tutor_photo_dialogue_box" type="file" accept=".png,.jpg,.jpeg" />
                                                    <input type="hidden" class="upload_max_filesize" value="134217728">
                                                    <div id="tutor_cover_area" data-fallback="https://themesvila.com/themes-wp/edusion/wp-content/plugins/tutor/assets/images/cover-photo.jpg" style="background-image:url(https://themesvila.com/themes-wp/edusion/wp-content/plugins/tutor/assets/images/cover-photo.jpg)">
                                                    </div>
                                                    <div id="tutor_profile_area" data-fallback="https://themesvila.com/themes-wp/edusion/wp-content/plugins/tutor/assets/images/profile-photo.png" style="background-image:url(https://themesvila.com/themes-wp/edusion/wp-content/uploads/2023/11/team3.jpg)">

                                                    </div>
                                                </div>
                                                <form action="../../../controllers/profileUpdate.php" method="post">
                                                    <div class="tutor-row">
                                                        <?php $userData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'")); ?>
                                                        <div class="tutor-col-12 tutor-col-sm-6 tutor-col-md-12 tutor-col-lg-6 tutor-mb-32">
                                                            <label class="tutor-form-label tutor-color-secondary">
                                                                First Name </label>
                                                            <input class="tutor-form-control" type="text" name="new_first_name" value="<?php echo $userData['first_name']; ?>" placeholder="First Name" required>
                                                        </div>

                                                        <div class="tutor-col-12 tutor-col-sm-6 tutor-col-md-12 tutor-col-lg-6 tutor-mb-32">
                                                            <label class="tutor-form-label tutor-color-secondary">
                                                                Last Name </label>
                                                            <input class="tutor-form-control" type="text" name="new_last_name" value="<?php echo $userData['last_name']; ?>" placeholder="Last Name" required>
                                                        </div>
                                                    </div>

                                                    <div class="tutor-row">
                                                        <div class="tutor-col-12">
                                                            <button type="submit" class="tutor-btn tutor-btn-primary tutor-profile-settings-save">
                                                                Update Profile </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="closedRoomsContent" role="tabpanel" aria-labelledby="closedRoomsTab">
                                            <form action="../../../controllers/auth.php" method="post">

                                                <div class="tutor-row">
                                                    <div class="tutor-col-12 tutor-col-sm-8 tutor-col-md-12 tutor-col-lg-7 tutor-mb-32">
                                                        <label class="tutor-form-label tutor-color-secondary"> Current Password </label>
                                                        <input class="tutor-form-control" type="password" name="previous_password" placeholder="Current Password" required>
                                                    </div>
                                                </div>

                                                <div class="tutor-row">
                                                    <div class="tutor-col-12 tutor-col-sm-8 tutor-col-md-12 tutor-col-lg-7 tutor-mb-32">
                                                        <div class="tutor-password-strength-checker">
                                                            <div class="tutor-password-field">
                                                                <label class="field-label tutor-form-label" for="tutor-new-password">
                                                                    New Password </label>
                                                                <div class="field-group">
                                                                    <input class="password-checker tutor-form-control" id="tutor-new-password" type="password" name="new_password" placeholder="Type Password" required />
                                                                    <span class="show-hide-btn"></span>
                                                                </div>
                                                            </div>

                                                            <div class="tutor-passowrd-strength-hint">
                                                                <div class="indicator">
                                                                    <span class="weak"></span>
                                                                    <span class="medium"></span>
                                                                    <span class="strong"></span>
                                                                </div>
                                                                <div class="text tutor-fs-7 tutor-color-muted"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tutor-row">
                                                    <div class="tutor-col-12 tutor-col-sm-8 tutor-col-md-12 tutor-col-lg-7 tutor-mb-32">
                                                        <div class="tutor-password-field tutor-settings-pass-field">
                                                            <label class="field-label tutor-form-label" for="tutor-confirm-password">
                                                                Re-type New Password </label>
                                                            <div class="tutor-form-wrap">
                                                                <span class="tutor-validation-icon tutor-icon-mark tutor-color-success tutor-form-icon tutor-form-icon-reverse" style="display: none;"></span>
                                                                <input class="tutor-form-control" id="tutor-confirm-password" type="password" placeholder="Type Password" name="confirm_new_password" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="change_password" value="1">
                                                <div class="tutor-row">
                                                    <div class="tutor-col-12">
                                                        <button name="change_password" type="submit" class="tutor-btn tutor-btn-primary tutor-profile-password-reset">
                                                            Reset Password </button>
                                                    </div>
                                                </div>
                                            </form>
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
    <!-- footer -->
    <?php include("../../../templates/footer.php") ?>

</body>

</html>