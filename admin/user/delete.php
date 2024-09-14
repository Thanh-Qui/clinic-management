<?php
    require_once("../menu.php");

    if (isset($_GET['id'])) {
        $id_patient = $_GET['id'];

        $deletePatient = $patients->DeletePatient($id_patient);
        if ($deletePatient == true) {
            $_SESSION['delete-patient'] = "<div class='success'> Xoá thông tin thành công </div>";
            header('location:'.SITEURL.'admin/user/manage-patients.php');
        }else {
            $_SESSION['delete-patient'] = "<div class='error'> Xoá thông tin không thành công </div>";
            header('location:'.SITEURL.'admin/user/manage-patients.php');
        }
    }

?>