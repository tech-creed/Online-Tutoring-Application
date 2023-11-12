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
        return true;
    }
    return false;
}

function sendMail($agent_id, $password, $email, $v_code)
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
        $mail->Username   = '3tmoneyworld@gmail.com';                     //SMTP username
        $mail->Password   = 'dwkzxetvdqjxobmm';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('3tmoneyworld@gmail.com', '3T Money World');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML

        $email_template = "./test.html";
        $name = "3T$agent_id";
        $id = "$password";
        $link = "https://3tmoneyworld.com/resources/verify.php?email=$email&v_code=$v_code";

        $message = file_get_contents($email_template);
        $message = str_replace('%name%', $name, $message);
        $message = str_replace('%id%', $id, $message);
        $message = str_replace('%link%', $link, $message);


        $mail->Subject = 'Email Verification from 3T Money World';
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

?>