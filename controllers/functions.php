<?php 

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
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'kmadavan018@gmail.com';                     //SMTP username
        $mail->Password   = 'ayiiwxnfkibnkolo';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('kmadavan018@gmail.com', 'Tutoring');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML

        $email_template = "../pages/mail.html";
        $link = "http://localhost/controllers/verify.php?email=$email&v_code=$v_code";

        $message = file_get_contents($email_template);
        $message = str_replace('%name%', $name, $message);
        $message = str_replace('%userId%', $userId, $message);
        $message = str_replace('%link%', $link, $message);


        $mail->Subject = 'Email Verification from Tutoring application';
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
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'kmadavan018@gmail.com';                     //SMTP username
        $mail->Password   = 'ayiiwxnfkibnkolo';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('kmadavan018@gmail.com', 'Tutoring');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML

        $email_template = "../pages/otp_mail.html";

        $message = file_get_contents($email_template);
        $message = str_replace('%email%', $email, $message);
        $message = str_replace('%otp%', $otp, $message);

        $mail->Subject = 'Otp from Tutoring application';
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

?>