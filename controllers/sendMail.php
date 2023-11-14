<?php
require_once("functions.php");

if (isset($_POST['email_data'])) {
    $emailData = json_decode($_POST['email_data'], true);

    $fname = $emailData['fname'];
    $email = $emailData['email'];
    $user_id = $emailData['user_id'];
    $v_code = $emailData['v_code'];

    sendMail($fname, $email, $user_id, $v_code);
}
?>
