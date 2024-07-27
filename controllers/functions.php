<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function check_email($email_id)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email_id'");
    // $data = mysqli_num_rows($data);
    if (mysqli_num_rows($data) == 1) {
        return false;
    }
    return true;
}

function check_id($id)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '$id'");
    // $data = mysqli_num_rows($data);
    if (mysqli_num_rows($data) == 1) {
        return true;
    }
    return false;
}


function sendMail($name,$email, $userId, $v_code)
{
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'no-reply@englishhub.ca';                     //SMTP username
        $mail->Password   = 'EnglishHub_01';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('no-reply@englishhub.ca', 'EnglishHub');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML

        $email_template = "../pages/mail.html";
        $link = "https://englishhub.ca/controllers/verify.php?email=$email&v_code=$v_code";

        $message = file_get_contents($email_template);
        $message = str_replace('%name%', $name, $message);
        $message = str_replace('%userId%', $userId, $message);
        $message = str_replace('%link%', $link, $message);


        $mail->Subject = 'Email Verification from EnglishHub';
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function otpSend($email, $otp)
{
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'no-reply@englishhub.ca';                     //SMTP username
        $mail->Password   = 'EnglishHub_01';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('no-reply@englishhub.ca', 'EnglishHub');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML

        $email_template = "../pages/otp_mail.html";

        $message = file_get_contents($email_template);
        $message = str_replace('%email%', $email, $message);
        $message = str_replace('%otp%', $otp, $message);

        $mail->Subject = 'OTP from EnglishHub';
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

ob_end_flush();
?>