<?php include("menu.php"); ?>


<div class="main-content" style="height: 100%; width: 84%;">
    <div class="wrapper">

        <div>
            <p class="pt-2 pl-20 h3"><i class="fa-solid fa-house-chimney"></i> <b> DASHBROAD</b></p>
            <p>Home</p>
        </div>

        <hr style="border-top: 2px solid #004085; opacity: 1;">

        <div class="row">
            <div class="row col col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px;">
                    <div class=" dashbroad-view">
                        <?php
                        $res1 = $prescription->GetAllPres();
                        $count1 = count($res1);
                        ?>
                        <a href="">
                            <span class="h4"><?= $count1; ?></span>
                            <span class="h6"><i class="fa-solid fa-caret-up"></i></span>
                            <div>Tổng số lịch khám</div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px;">
                    <div class=" dashbroad-view">
                        <?php
                        $res = $staff->GetAllStaff();
                        $count = count($res);
                        ?>
                        <a href="">
                            <span class="h4"><?= $count; ?></span>
                            <span class="h6"><i class="fa-solid fa-caret-up"></i></span>
                            <div>Tổng số bác sĩ</div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px;">
                    <div class=" dashbroad-view">
                        <?php
                        $res2 = $patients->GetAll();
                        $count2 = count($res2);
                        ?>
                        <a href="">
                            <span class="h4"><?= $count2; ?></span>
                            <span class="h6"><i class="fa-solid fa-caret-up"></i></span>
                            <div>Tổng số bệnh nhân</div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px;">
                    <div class=" dashbroad-view">

                        <a href="">
                            <?php
                            $res3 = $medicine->GetAll();
                            $count3 = 0;
                            foreach ($res3 as $row3) {
                                if ($row3->status == "thuốc hết hạn") {
                                    $count3++;
                                }
                            }
                            ?>

                            <span class="h4"><?= $count3; ?></span>
                            <span class="h6"><i class="fa-solid fa-caret-up"></i></span>
                            <div>Thuốc hết hạn</div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px;">
                    <div class=" dashbroad-view">
                        <a href="">
                            <?php
                            $res4 = $medicine->GetAll();
                            $count4 = 0;
                            foreach ($res4 as $row4) {
                                if ($row4->status == "còn thuốc") {
                                    $count4++;
                                }
                            }
                            ?>
                            <span class="h4"><?= $count4; ?></span>
                            <span class="h6"><i class="fa-solid fa-caret-up"></i></span>
                            <div>Thuốc còn hạn</div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px;">
                    <div class=" dashbroad-view">
                        <a href="">
                            <?php
                            $res5 = $medicine->GetAll();
                            $count5 = 0;
                            foreach ($res5 as $row5) {
                                if ($row5->status == "hết thuốc") {
                                    $count5++;
                                }
                            }
                            ?>
                            <span class="h4"><?= $count5; ?></span>
                            <span class="h6"><i class="fa-solid fa-caret-up"></i></span>
                            <div>Thuốc đã hết</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="todays-report">
                    <div class="h5">Báo cáo ngày hiện tại</div>
                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                            <tr>
                                <th>Tổng doanh thu</th>
                                <?php
                                $result = $prescription->GetAllPres();
                                $total = 0;
                                $dateNow = date("Y/m/d");
                                if (count($result) > 0) {
                                    foreach ($result as $rowResult) {

                                        $rowDatePart = substr($rowResult->date, 0, 10);
                                        $formattedDateNow = str_replace("/", "-", $dateNow);

                                        if ($rowDatePart == $formattedDateNow) {
                                            $total += $rowResult->total_cost;
                                        }
                                    }
                                ?>
                                    <th class="success"><?= currency_format($total, "VND"); ?></th>
                                <?php
                                }
                                ?>

                            </tr>
                            <tr>
                                <?php
                                $result1 = $medicineOrders->GetAllMedicineOrder();
                                $total_AE = 0;
                                $dateAE = date("Y/m/d");
                                if (count($result1) > 0) {
                                    foreach ($result1 as $rowResult1) {

                                        $rowDatePart1 = substr($rowResult1->order_date, 0, 10);
                                        $formattedDateNow1 = str_replace("/", "-", $dateAE);

                                        if ($rowDatePart1 == $formattedDateNow1) {
                                            $total_AE += $rowResult1->total_cost;
                                        }
                                    }
                                ?>
                                    <th>Tổng chi tiêu</th>
                                    <th class="error"><?= currency_format($total_AE, "VND"); ?></th>
                                <?php
                                }
                                ?>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr style="border-top: 2px solid #004085; opacity: 1;">

            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
                    <div class="dashbroad-view" style="padding: 30px 15px;">
                        <a href="<?php echo SITEURL; ?>admin/appointment/add-appointment.php">
                            <div class="text-center">
                                <span class="h1">
                                    <i class="fa fa-address-card p-2"></i>
                                </span>
                                <div class="h5">Thêm lịch khám mới</div>
                            </div>
                        </a>


                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
                    <div class="dashbroad-view" style="padding: 30px 15px;">
                        <a href="<?php echo SITEURL; ?>admin/staff/add-doctor.php">
                            <div class="text-center">
                                <span class="h1">
                                    <i class="fa fa-address-card p-2"></i>
                                </span>
                                <div class="h5">Thêm bệnh nhân mới</div>
                            </div>
                        </a>


                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
                    <div class="dashbroad-view" style="padding: 30px 15px;">
                        <a href="<?php echo SITEURL; ?>admin/medicine/add-medicine.php">
                            <div class="text-center">
                                <span class="h1">
                                    <i class="fa fa-address-card p-2"></i>
                                </span>
                                <div class="h5">Thêm thuốc mới</div>
                            </div>
                        </a>


                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
                    <div class="dashbroad-view" style="padding: 30px 15px;">
                        <a href="<?php echo SITEURL; ?>admin/suppliers/add-supplier.php">
                            <div class="text-center">
                                <span class="h1">
                                    <i class="fa fa-address-card p-2"></i>
                                </span>
                                <div class="h5">Thêm nhà cung cấp</div>
                            </div>
                        </a>


                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
                    <div class="dashbroad-view" style="padding: 30px 15px;">
                        <a href="<?= SITEURL; ?>admin/report/revenue.php">
                            <div class="text-center">
                                <span class="h1">
                                    <i class="fa fa-address-card p-2"></i>
                                </span>
                                <div class="h5">Báo cáo doanh thu</div>
                            </div>
                        </a>
                            
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
                    <div class="dashbroad-view" style="padding: 30px 15px;">
                        <a href="<?= SITEURL; ?>admin/report/aggregateExpenditure.php">
                            <div class="text-center">
                                <span class="h1">
                                    <i class="fa fa-address-card p-2"></i>
                                </span>
                                <div class="h5">Tổng chi tiêu</div>
                            </div>
                        </a>
                        
                    </div>
                </div>

            </div>


        </div>

    </div>
</div>