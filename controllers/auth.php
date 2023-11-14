<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("connect.php");
require("functions.php");


if (isset($_REQUEST['register_btn'])) {
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
    $lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
    $role = mysqli_real_escape_string($conn, $_REQUEST['role']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $_SESSION['error'] = 'Select Your Role';
    if ($role != 'Select role') {
        $v_code = bin2hex(random_bytes(16));
        $_SESSION['error'] = 'Email Already Taken';
        if (check_email($email)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $user_id = rand("100000", "999999");
            while (check_id($user_id)) {
                $user_id = rand("100000", "999999");
            }
            $reg_date = date("Y-m-d h:i:s");
            $d = mysqli_query($conn, "INSERT INTO `users`(`user_id`, `password`, `email`, `role`, `first_name`, `last_name`, `is_verified`, `reg_date`) VALUES ('$user_id','$hashed_password','$email','$role','$fname','$lname','0','$reg_date')");
            $a = mysqli_query($conn, "INSERT INTO `email_verify`(`email`, `verification_code`) VALUES ('$email','$v_code')");
            if ($d) {
                $emailData = array(
                    'fname' => $fname,
                    'email' => $email,
                    'user_id' => $user_id,
                    'v_code' => $v_code
                );
                $encodedData = json_encode($emailData);

                $command = "php sendMail.php";
                $command .= " --post_data='".escapeshellarg($encodedData)."' > /dev/null 2>&1 &";
                exec($command);

                session_unset();
                $_SESSION['reg'] = true;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email;
                $_SESSION['Name'] = $fname . ' ' . $lname;
                header('Location : ../pages/register.php');
            }
        }
    }
    header("Location:../pages/register.php");
}

if (isset($_REQUEST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $role = mysqli_real_escape_string($conn, $_REQUEST['role']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    if (!check_email($email)) {
        $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email'"));
        $user_id = $data['user_id'];
        if ($data['role'] != $role) {
            $_SESSION['error'] = 'Invalid Role';
            header("Location:../pages/login.php");
        } elseif ($data['is_verified'] == '0') {
            $_SESSION['error'] = 'Please Verify Your Email';
            header("Location:../pages/login.php");
        } elseif (password_verify($password, $data["password"])) {
            session_unset();
            $_SESSION['sess_id'] = session_id();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role'] = $role;
            $_SESSION['name'] = $data['first_name'] . ' ' . $data['last_name'];
            if ($role == 'student') {
                header("Location:../pages/student/dashboard/");
            } elseif ($role == "instructor") {
                header("Location:../pages/instructor/dashboard/");
            }
        } else {
            $_SESSION['error'] = "Password Incorrect";
            header("Location:../pages/login.php");
        }
    } else {
        echo $_SESSION['error'] = "User Not Found";
        header("Location:../pages/login.php");
    }
}

if (isset($_REQUEST['forgot_btn'])) {
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    if (!check_email($email)) {
        $otp = rand("100000", "999999");
        $otp_expire = date("Y-m-d h:i:s", strtotime("+10 minutes"));
        $data = mysqli_query($conn, "INSERT INTO `forgot_otp`(`email`, `otp`, `expire_time`) VALUES ('$email','$otp','$otp_expire')");
        if ($data && otpSend($email, $otp)) {
            session_unset();
            $_SESSION['email'] = $email;
            $_SESSION['status'] = "Mail Send Successfully";
            header("Location: ../pages/forgot.php");
        }
    } else {
        $_SESSION['error'] = "Incorrect Email";
        header("Location:../pages/forgot.php");
    }
    header("Location:../pages/forgot.php");
}

if (isset($_REQUEST['forgot_verify_btn'])) {
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $otp = mysqli_real_escape_string($conn, $_REQUEST['otp']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `forgot_otp` WHERE `otp` = '$otp'"));
    if ($data['email'] == $email) {
        $today_time = date("Y-m-d h:i:s");
        $expire_time = $data['expire_time'];
        if ($expire_time > $today_time) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = mysqli_query($conn, "UPDATE `users` SET `password`='$hashed_password' WHERE `email`='$email'");
            $query = mysqli_query($conn, "DELETE FROM `forgot_otp` WHERE `otp` = '$otp'");

            header("Location:../pages/login.php");
        } else {
            echo $_SESSION['error'] = 'Otp Expired';
            header("Location:../pages/forgot.php");
        }
    } else {
        echo $_SESSION['error'] = 'Invalid';
        header("Location:../pages/forgot.php");
    }
    header("Location:../pages/login.php");
}

if (isset($_REQUEST['change_password'])) {
    $user_id = $_SESSION['user_id'];
    $old_password = mysqli_real_escape_string($conn, $_REQUEST['previous_password']);
    $new_password = mysqli_real_escape_string($conn, $_REQUEST['new_password']);
    $confirm_new_password = mysqli_real_escape_string($conn, $_REQUEST['confirm_new_password']);

    $user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id`='$user_id'"));

    if (password_verify($old_password, $user['password'])) {
        if ($new_password === $confirm_new_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_query = mysqli_query($conn, "UPDATE `users` SET `password`='$hashed_password' WHERE `user_id`='$user_id'");
            
            if ($update_query) {
                $_SESSION['success'] = 'Password updated successfully';
                if($_SESSION['role'] === 'instructor'){
                    header("Location:../pages/instructor/settings/"); 
                }else{
                    header("Location:../pages/student/settings/"); 
                }
            } else {
                $_SESSION['error'] = 'Error updating password';
                if($_SESSION['role'] === 'instructor'){
                    header("Location:../pages/instructor/settings/"); 
                }else{
                    header("Location:../pages/student/settings/"); 
                }
            }
        } else {
            $_SESSION['error'] = "New passwords don't match";
            if($_SESSION['role'] === 'instructor'){
                header("Location:../pages/instructor/settings/"); 
            }else{
                header("Location:../pages/student/settings/"); 
            }
        }
    } else {
        $_SESSION['error'] = 'Current password incorrect';
        if($_SESSION['role'] === 'instructor'){
            header("Location:../pages/instructor/settings/"); 
        }else{
            header("Location:../pages/student/settings/"); 
        }
    }
}

ob_end_clean();
?>