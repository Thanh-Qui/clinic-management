<?php 

require_once('../../mod/config.php');
require_once("../../mod/connect.php");
require_once('../../mod/suppCls.php');

$supp = new suppCls();

if (isset($_POST['search-supplier'])) {
    $name = $_POST['search-supplier'];

    $res = $supp->searchSuppByName($name);
    $sn = 1;
    if (count($res) > 0) {
        echo "<tbody>";
        foreach ($res as $row) {
            $id_supp = $row->id_supp;
            
            echo "<tr>";
                echo "<td> $sn </td>";
                echo "<td> $row->name </td>";
                echo "<td> $row->email </td>";
                echo "<td> $row->contact </td>";
                echo "<td> $row->address </td>";
                echo "<td>";
                echo "<a href='".SITEURL."admin/suppliers/update-supplier.php?id={$id_supp}'><i class='fa fa-pen' style='margin-right: 5px;'></i></a>";
                echo "<a href='".SITEURL."admin/suppliers/delete-supplier.php?id={$id_supp}' onclick='return isDelete();' ><i class='fa-solid fa-trash'></i></a>";
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