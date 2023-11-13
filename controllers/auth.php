<?php

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
        $_SESSION['error'] = 'Email Already taken';
        if (check_email($email)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $user_id = rand("100000", "999999");
            $reg_date = date("Y-m-d h:i:sa");
            $d = mysqli_query($conn, "INSERT INTO `users`(`user_id`, `password`, `email`, `role`, `first_name`, `last_name`, `is_verified`, `reg_date`) VALUES ('$user_id','$hashed_password','$email','$role','$fname','$lname','0','$reg_date')");
            $a = mysqli_query($conn, "INSERT INTO `email_verify`(`email`, `verification_code`) VALUES ('$email','$v_code')");
            if ($d && sendMail($fname, $email, $user_id, $v_code)) {
                $_SESSION['reg'] = true;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email;
                $_SESSION['Name'] = $fname . ' ' . $lname;
                header("Location:../pages/register.php");
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
        $email = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `email_verify` WHERE `email`='$email'"));
        if ($data['role']!=$role) {
            $_SESSION['error'] = 'Invalid Role';
            header("Location:../pages/login.php");
        } elseif ($data['is_verified'] == '0') {
            $_SESSION['error'] = 'Please Verify Your Email';
            header("Location:../pages/login.php");
        } elseif (password_verify($password, $data["password"])) {
            $_SESSION['sess_id'] = session_id();
            $_SESSION['my_id'] = $user_id;
            $_SESSION['role'] = $role;
            header("Location:dashboard.php");
        } else {
            $_SESSION['error'] = "Password Incorrect";
            header("Location:../pages/login.php");
        }
    } else {
        echo $_SESSION['error'] = "User Not Found";
        header("Location:../pages/login.php");
    }
}
?>