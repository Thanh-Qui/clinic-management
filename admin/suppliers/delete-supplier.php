<?php
require_once("../menu.php"); ob_start();

if (isset($_GET['id'])) {
    $id_supp = $_GET['id'];

    $deleteSupp = $supp->deleteSupp($id_supp);
    if ($deleteSupp == true) {
        $_SESSION['delete-supp'] = "<div class='success'> Xoá thông tin thành công! </div>";
        header('location:'.SITEURL.'admin/suppliers/manage-suppliers.php'); 
    }else {
        $_SESSION['delete-supp'] = "<div class='error'> Xoá thông tin không thành công! </div>";
        header('location:'.SITEURL.'admin/suppliers/manage-suppliers.php');
    }
}


ob_end_flush();
?>