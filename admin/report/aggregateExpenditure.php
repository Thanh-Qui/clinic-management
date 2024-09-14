<?php require_once("../menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h3 class="pt-2 pl-20">BÁO CÁO CHI TIÊU</h3>
        <hr style="border: 1px solid blue; opacity: 1;">

        <form action="" method="GET">
            <select name="report_number" class="form-select" aria-label="Default select example" style="width: 20%;">
                <option value="" selected>Chọn báo cáo</option>
                <option value="1">Ngày</option>
                <option value="2">Tháng</option>
                <option value="3">Năm</option>
            </select>
            <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Xem báo cáo</button>
        </form>


        <br>
        <table class="table table-hover table-list table-bordered">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Ngày báo cáo</th>
                    <th>Tổng chi tiêu</th>
                    <th>Active</th>
                </tr>
            </thead>

            <?php

            if (isset($_GET['report_number'])) {
                $formDate = $_GET['report_number'];

                $res = $medicineOrders->GetAllMedicineOrder();
                $total = 0;
                $sn = 1;

                if ($formDate == 1) {
                    $dateNow = date("Y/m/d");
                }else if ($formDate == 2) {
                    $dateNow = date("Y/m");
                }else if($formDate == 3){
                    $dateNow = date("Y");
                }else {
                    $dateNow = "";
                }

                if (count($res) > 0) {
                    
                   foreach ($res as $row) {
                        if ($formDate == 1) {
                            // So sánh theo ngày
                            $rowDatePart = substr($row->order_date, 0, 10); // Lấy 'Y-m-d'
                        } else if ($formDate == 2) {
                            // So sánh theo tháng
                            $rowDatePart = substr($row->order_date, 0, 7); // Lấy 'Y-m'
                        } else if ($formDate == 3) {
                            // So sánh theo năm
                            $rowDatePart = substr($row->order_date, 0, 4); // Lấy 'Y'
                        }else {
                            $rowDatePart = "";
                        }
                    
                        // Chuyển đổi $dateNow cho phù hợp với định dạng
                        $formattedDateNow = str_replace("/", "-", $dateNow); // Đổi 'Y/m/d' hoặc 'Y/m' hoặc 'Y' thành 'Y-m-d', 'Y-m', hoặc 'Y'
                    
                        // So sánh
                        if ($rowDatePart === $formattedDateNow) {
                            $total += $row->total_cost;
                        }
                   }
                }

                ?>
                <tbody>
                    <td><?= $sn++; ?></td>
                    <td><?= $dateNow; ?></td>
                    <td><?php if($rowDatePart == "") {echo "";} else {echo currency_format($total,"");} ?></td>
                    <td style="text-align: center;">
                        <a href="<?php echo SITEURL; ?>admin/report/view-AE.php?date=<?= $dateNow;?>&report_number=<?= $formDate;  ?>"><i class="fa-solid fa-eye" style="margin-top: 5px;"></i></a>
                    </td>
                </tbody>
                <?php

               
            }
            ?>


        </table>

        <hr style="border: 1px solid orange; opacity: 1;">
    </div>
</div>