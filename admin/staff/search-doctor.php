<?php 
require_once('../../mod/config.php');
require_once("../../mod/connect.php");
require_once("../../mod/staffCls.php");

$staff = new doctor();

if (isset($_POST['search-doctor'])) {
    $name = $_POST['search-doctor'];
    
    $res = $staff->searchDoctorByName($name);
    $sn = 1;
    if (count($res) > 0) {
        echo "<tbody>";
        foreach ($res as $row) {
            $id_staff = $row->id_staff;

                echo "<tr>";

                    echo "<td> $sn </td>";
                    echo "<td> $row->name </td>";
                    echo "<td> $row->dob </td>";
                    echo "<td> $row->gender </td>";
                    echo "<td> $row->address </td>";
                    echo "<td> $row->phone_number </td>";
                    echo "<td> $row->email </td>";
                    echo "<td> $row->position </td>";
                    echo "<td> $row->salary </td>";
                    echo "<td>";
                        echo "<a href='".SITEURL."admin/staff/update-doctor.php?id={$id_staff}'><i class='fa-solid fa-pen' style='margin-right: 15px;'></i></a>";
                        echo "<a href='".SITEURL."admin/staff/update-doctor.php?id={$id_staff}' onclick='return isDelete();'><i class='fa-solid fa-trash' style='margin-right: 15px;'></i></a>";
                    echo "</td>";

                echo "</tr>";

            $sn++;
        }
        echo "</tbody>";
    }else {
        echo "<div class='error'> Không tìm thấy thông tin! </div>";
    }
}
?>

