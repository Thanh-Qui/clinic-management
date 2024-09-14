<?php
require_once('../../mod/config.php');
require_once("../../mod/connect.php");
require_once("../../mod/medicineCls.php");
require_once("../../mod/suppCls.php");

$medicine = new medicine();
$supp = new suppCls();

if (isset($_POST['search-medicine'])) {
    $search_term = $_POST['search-medicine'];
    $res = $medicine->searchByName($search_term);
    $sn = 1;
    if (count($res) > 0) {
        echo "<tbody>"; // Chỉ mở <tbody> một lần trước khi bắt đầu vòng lặp
        foreach ($res as $row) {
            $id_supp = $row->id_supp;
            $id_medicine = $row->id_medicine;
            $res1 = $supp->GetSuppById($id_supp);
            if ($res1 == true) {
                $nameSupp = $res1->name;
            }else {
                $nameSupp = "";
            }
            

            echo "<tr>";
            echo "<td>{$sn}</td>";
            echo "<td>{$row->name}</td>";
            echo "<td>{$row->description}</td>";
            echo "<td>{$row->price}</td>";
            echo "<td>{$nameSupp}</td>";
            echo "<td>{$row->quantity}</td>";
            echo "<td>{$row->exp_day}</td>";

            // echo "<td>{$row->status}</td>";
            if ($row->status == "thuốc hết hạn" || $row->status == "hết thuốc") {
                echo "<td style='color:red'> $row->status </td>";
            }else {
                echo "<td style='color:green'> $row->status </td>";
            }

            echo "<td>";
            echo "<a href='".SITEURL."admin/medicine/update-medicine.php?id={$id_medicine}'><i class='fa-solid fa-pen' style='margin-right: 15px;'></i></a>";
            echo "<a href='".SITEURL."admin/medicine/delete-medicine.php?id={$id_medicine}' onclick='return isDelete();'><i class='fa-solid fa-trash'></i></a>";
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

