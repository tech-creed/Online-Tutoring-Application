<?php
    if (isset($_SESSION['sess_id']) && isset($_SESSION['my_id']) && isset($_SESSION['role'])) 
    {
        $my_id = $_SESSION['my_id'];
        $role = $_SESSION['role'];
    }
    else
    {
        header("Location:login.php");
    }
?>