<?php require_once("../menu.php"); ?>

<div class="main-content">
    <div class="wrapper">

        <h3 class="pt-2 pl-20">Chi tiết báo cáo</h3>

        <?php
        if (isset($_GET['date']) && isset($_GET['report_number'])) {
            $date = $_GET['date'];
            $report_number = $_GET['report_number']; // 1:ngày, 2:tháng, 3:năm
        }
        ?>

        <hr style="border: 1px solid navy; opacity: 1;">

        <table class="table table-list table-bordered table-hover">
            <thead>
                <th>SL</th>
                <th>Tên thuốc</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
            </thead>

            <tbody>
                <?php
                $res1 = $medicineOrders->GetAllMedicineOrder();
                $sn = 1;
                if (count($res1)) {
                    foreach ($res1 as $row1) {
                        $rowDatePart = "";
                        if ($report_number == 1) {
                            // So sánh theo ngày
                            $rowDatePart = substr($row1->order_date, 0, 10); // Lấy 'Y-m-d'
                        } else if ($report_number == 2) {
                            // So sánh theo tháng
                            $rowDatePart = substr($row1->order_date, 0, 7); // Lấy 'Y-m'
                        } else if ($report_number == 3) {
                            // So sánh theo năm
                            $rowDatePart = substr($row1->order_date, 0, 4); // Lấy 'Y'
                        }

                        $formattedDate = str_replace("/", "-", $date); // Chuyển định dạng dateNow cho phù hợp

                        if ($rowDatePart === $formattedDate) {
                            $id_order = $row1->id_order;
                            $res2 = $medicineOrders->GetMedicineOrderDetailsById($id_order);
                            if (count($res2) > 0) {
                                foreach ($res2 as $row2) {
                                    $id_medicine = $row2->id_medicine;
                                    $res3 = $medicine->getMedicineById($id_medicine);
                ?>
                                    <tr>
                                        <td><?= $sn++; ?></td>
                                        <td><?= $res3->name; ?></td>
                                        <td><?= currency_format($row2->price,""); ?></td>
                                        <td><?= $row2->quantity; ?></td>
                                    </tr>
                <?php
                                }
                            } else {
                                echo "Không tìm thấy thông tin!";
                            }
                        }
                    }
                } else {
                    echo "Không tìm thấy thông tin!";
                }
                ?>



            </tbody>
        </table>

        <hr style="border: 1px solid orange; opacity: 1;">
    </div>
</div>