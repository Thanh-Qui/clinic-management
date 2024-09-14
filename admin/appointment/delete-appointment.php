<?php 
require_once("../menu.php");

if (isset($_GET['id'])) {
    $id_appointment = $_GET['id'];
    $status = "đã xoá";
    $delete = $appointment->deleteAppointment($status, $id_appointment);

    if ($delete == true) {
        $_SESSION['delete-appointment'] = "<div class='success'> Xoá thông tin thành công! </div>";
        header('location:'.SITEURL.'admin/appointment/manage-appointment.php');
    }else {
        $_SESSION['delete-appointment'] = "<div class='error'> Xoá thông tin khôngư thành công! </div>";
        header('location:'.SITEURL.'admin/appointment/manage-appointment.php');
    }
}

?>