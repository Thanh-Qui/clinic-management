<?php
    require_once('mod/config.php');
    require_once("mod/connect.php");

    if (!isset($_SESSION['admin-login'])) {
        $_SESSION['Vui lòng đăng nhập!'];
        header('location:'.SITEURL.'login.php');
    }

?>