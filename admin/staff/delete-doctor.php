<?php
    require_once("../menu.php");

    if (isset($_GET['id'])) {
        $id_staff = $_GET['id'];

        $deleteDoctor = $staff->deleteDoctor($id_staff);
        if ($deleteDoctor == true) {
            $_SESSION['delete-doctor'] = "<div class='success'> Xoá thông tin thành công! </div>";
            header('location:'.SITEURL.'admin/staff/manage-doctors.php');
        }else {
            $_SESSION['delete-doctor'] = "<div class='error'> Xoá thông tin không thành công! </div>";
            header('location:'.SITEURL.'admin/staff/manage-doctors.php');
        }
    }

?>