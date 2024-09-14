<?php 
require_once('../../mod/config.php');
require_once("../../mod/connect.php");
require_once("../../mod/medicineOrderCls.php");
require_once("../../mod/suppCls.php");

$supp = new suppCls();
$medicineOrder = new medicineOrder();

if (isset($_POST['search-medicineorder'])) {

    $search_value = $_POST['search-medicineorder'];
    $res3 = $supp->GetSuppByName($search_value);

    if (count($res3) > 0) {
        echo "<tbody>";
        $sn = 1;

        foreach ($res3 as $supplier) {
            $res1 = $medicineOrder->searchMedicineOrder($supplier->id_supp);

            foreach ($res1 as $row1) {
                $id_order = $row1->id_order;
                $id_supp = $row1->id_supp;

                $res = $supp->GetSuppById($id_supp);
                $nameSupp = $res->name;

                echo "<tr>";
                echo "<td>{$sn}</td>";
                echo "<td>{$nameSupp}</td>";
                echo "<td>{$row1->order_date}</td>";
                echo "<td>{$row1->total_cost}</td>";
                echo "<td>{$row1->status}</td>";
                echo "<td>";
                echo "<a href='".SITEURL."admin/medicine_order/view-medicineOrder.php?id={$id_order}'><i class='fa-solid fa-eye' style='margin-right: 5px;'></i></a>";
                echo "<a href='".SITEURL."admin/medicine_order/delete-medicineOrder.php?id={$id_order}' onclick='return isDelete();'><i class='fa-solid fa-trash' style='margin-right: 5px;'></i></a>";
                echo "</td>";
                echo "</tr>";
                $sn++;
            }
        }
        echo "</tbody>";
    } else {
        echo "<div class='error'>Không tìm thấy dữ liệu!</div>";
    }
}
?>