<?php require_once("../menu.php"); ?>

<div class="main-content">
    <div class="wrapper">

        <h3 class="pt-2 pl-20">Chi tiết báo cáo</h3>

        <?php
        if (isset($_GET['date']) && isset($_GET['report_number'])) {
            $date = $_GET['date'];
            $formDate = $_GET['report_number'];
        }
        ?>

        <hr style="border: 1px solid navy; opacity: 1;">

        <table class="table table-list table-bordered table-hover">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Tên thuốc</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                </tr>
                
            </thead>

            <tbody>
                <?php
                $res = $prescription->GetAllPres();
                $sn = 1;
                if (count($res) > 0) {
                    foreach ($res as $row) {
                        $rowDatePart = "";
                        if ($formDate == 1) {
                            // So sánh theo ngày
                            $rowDatePart = substr($row->date, 0, 10); // Lấy 'Y-m-d'
                        } else if ($formDate == 2) {
                            // So sánh theo tháng
                            $rowDatePart = substr($row->date, 0, 7); // Lấy 'Y-m'
                        } else if ($formDate == 3) {
                            // So sánh theo năm
                            $rowDatePart = substr($row->date, 0, 4); // Lấy 'Y'
                        }
                    
                        // Chuyển đổi $dateNow cho phù hợp với định dạng
                        $formattedDateNow = str_replace("/", "-", $date); // Đổi 'Y/m/d' hoặc 'Y/m' hoặc 'Y' thành 'Y-m-d', 'Y-m', hoặc 'Y'
                        
                        if ($rowDatePart == $formattedDateNow) {
                            $id_pres = $row->id_pres;
                            $res2 = $prescription->GetPresDetailById($id_pres);
                            if (count($res2) > 0) {
                                foreach ($res2 as $row2) {
                                    $id_medicne = $row2->id_medicine;
                                    $res3 = $medicine->getMedicineById($id_medicne);
                                    
                                    ?>
                                    <tr>
                                        <td><?= $sn++; ?></td>
                                        <td><?= $res3->name; ?></td>
                                        <td><?= $row2->price; ?></td>
                                        <td><?= $row2->quantity; ?></td>
                                    </tr>
                                        
                                    <?php
                                }
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