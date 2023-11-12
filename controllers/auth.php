<?php

require_once("connection.php");
require("functions.php");


if (isset($_REQUEST['register_btn'])) {
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $role = mysqli_real_escape_string($conn, $_REQUEST['role']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);


    echo $v_code = bin2hex(random_bytes(16));
    $_SESSION['error'] = 'Email Already taken';
    if (check_email($email)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $reg_date = date("Y-m-d h:i:sa");
        $d = mysqli_query($conn, "INSERT INTO `users`(`name`, `password`, `email`, `reg_date`, `is_verified`) VALUES ('$name','$hashed_password','$email','$reg_date','0')");
        $a = mysqli_query($conn, "INSERT INTO `email_verify`(`email`, `verification_code`) VALUES ('$email','$v_code')");
        if ($d && sendMail($agent_id, $user_password, $email, $v_code)) {
            $_SESSION['reg'] = true;
            $_SESSION['agent_id'] = $agent_id;
            $_SESSION['Name'] = $username;
            $_SESSION['email'] = $email;
            echo '<script>window.location.replace("register.php");</script>';
        }
    }
    // header("Location:register.php");
}
?>