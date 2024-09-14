<?php
    require_once("../menu.php");

    if (isset($_GET['id'])) {
        
        $id_medicine = $_GET['id'];
        $res = $medicine->deleteMedicine($id_medicine);

        if ($res == true) {
            $_SESSION['delete-medicine'] = "<div class='success'> Xoá thông tin thành công! </div>";
            header('location:'.SITEURL.'admin/medicine/manage-medicine.php');
        }else {
            $_SESSION['delete-medicine'] = "<div class='error'> Xoá thông tin không thành công! </div>";
            header('location:'.SITEURL.'admin/medicine/manage-medicine.php');
        }
    }
?>