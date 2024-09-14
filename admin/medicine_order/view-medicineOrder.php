<?php require_once("../menu.php"); ?>\

<div class="main-content">
    <div class="wrapper">
        <div class="order-details">
            <h2>Chi Tiết Đơn Đặt Thuốc</h2>
            <table class="table table-bordered table-list">

                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Tên thuốc</th>
                        <th>Số lượng</th>
                        <th>đơn giá</th>
                    </tr>
                </thead>

                <tbody>
                    
                    <?php
                    if (isset($_GET['id'])) {
                        $id_order = $_GET['id'];

                        $res = $medicineOrders->GetMedicineOrderDetailsById($id_order);
                        $sn = 1;
                        if (count($res) > 0) {
                            foreach ($res as $row) {
                                ?>
                                <tr>
                                    <td><?= $sn++; ?></td>
                                    <?php
                                        $res1 = $medicine->getMedicineById($row->id_medicine);

                                    ?>
                                    <td><?= $res1->name; ?></td>
                                    <td><?= $row->quantity; ?></td>
                                    <td><?= $row->price; ?></td>
                                </tr>

                                <?php
                            }
                        }
                    }
                    ?>

                </tbody>

            </table>






            <button class="btn btn-danger" onclick="window.history.back();">Đóng</button>
        </div>

    </div>
</div>