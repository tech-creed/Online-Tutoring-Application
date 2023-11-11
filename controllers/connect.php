<?php
    session_start();
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "tuts_db";

    $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
    if(mysqli_connect_error())
    {
        header('location: ../pages/404.php');
    }
?>