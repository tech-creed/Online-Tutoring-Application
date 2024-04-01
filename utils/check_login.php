<?php
    if (isset($_SESSION['sess_id']) && isset($_SESSION['user_id']) && isset($_SESSION['role'])) 
    {
        $user_id = $_SESSION['user_id'];
        $role = $_SESSION['role'];
    }
    else
    {
        header("Location:login.php");
    }
?>