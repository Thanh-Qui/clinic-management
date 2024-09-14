<?php
    require_once("../menu.php"); ob_start();

    if (isset($_GET['id'])) {
        $id_order = $_GET['id'];

        $res = $medicineOrders->deleteMedicineOrder($id_order);
        $res1 = $medicineOrders->deleteMedicineOrderDetail($id_order);

        if ($res == true && $res1 == true) {
            $_SESSION['delete-medicine'] = "<div class='success'> Thêm thành công </div>";
            header('location:'.SITEURL.'admin/medicine_order/manage-order.php');
        }else {
            $_SESSION['delete-medicine'] = "<div class='success'> Thêm thành công </div>";
            header('location:'.SITEURL.'admin/medicine_order/manage-order.php');
        }
    }


    ob_end_flush();
?>