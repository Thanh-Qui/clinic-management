<?php
require_once('mod/config.php');
require_once("mod/connect.php");

session_destroy();
header('location:'.SITEURL.'login.php');

?>