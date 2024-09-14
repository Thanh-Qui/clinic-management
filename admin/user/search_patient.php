<?php
require_once('../../mod/config.php');
require_once("../../mod/connect.php");
require_once("../../mod/patientCls.php");

$patient = new patients();

if (isset($_POST['search-patient'])) {
    $search_term = $_POST['search-patient'];
    $res = $patient->searchPatient($search_term);
    $sn = 1;
    if (count($res) > 0) {
        echo "<tbody>"; // Chỉ mở <tbody> một lần trước khi bắt đầu vòng lặp
        foreach ($res as $row) {
            $id_patient = $row->id_patient;

            echo "<tr>";
            echo "<td>{$sn}</td>";
            echo "<td>{$row->name}</td>";
            echo "<td>{$row->dob}</td>";
            echo "<td>{$row->gender}</td>";
            echo "<td>{$row->address}</td>";
            echo "<td>{$row->phone_number}</td>";
            echo "<td>{$row->email}</td>";
            echo "<td>{$row->medical_history}</td>";

            echo "<td>";
            echo "<a href='".SITEURL."admin/user/update.php?id={$id_patient}'><i class='fa-solid fa-pen' style='margin-right: 15px;'></i></a>";
            echo "<a href='".SITEURL."admin/user/delete.php?id={$id_patient}' onclick='return isDelete();'><i class='fa-solid fa-trash'></i></a>";
            echo "</td>";
            echo "</tr>";

            $sn++;
        }
        echo "</tbody>"; // Đóng <tbody> sau khi kết thúc vòng lặp
    } else {
        echo "<tbody><tr><td colspan='6' class='text-center error'>Không tìm thấy được thông tin!</td></tr></tbody>";
    }
}

?>

