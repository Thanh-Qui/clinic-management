<?php include("../menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h3 class="pt-2 pl-20"><i class="fa-solid fa-user"></i> QUẢN LÝ NHẬP HÀNG LOẠI THUỐC</h3>
        <br>
        <hr style="border-top: 2px solid #d35400;">

        <?php
        if (isset($_SESSION['delete-medicine'])) {
            echo $_SESSION['delete-medicine'];
            unset($_SESSION['delete-medicine']);
        }
        ?>

        <h5>Quản lý đơn đặt</h5>
        <form action="" method="POST" class="row mb-3 tbl-30">
            <label for="search-medicineorder" class="col-sm-2 col-form-label">Search:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="search-medicineorder" name="search-medicineorder" placeholder="Tìm kiếm đơn đặt thuốc" onkeyup="searchMedicineOrder()">
            </div>
        </form>

        <table class="table table-bordered table-list">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Nhà cung cấp</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Active</th>
                </tr>
            </thead>
            <tbody id="medicineorder-list">
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search-medicineorder'])) {
                        $id_supp = $_POST['search-medicineorder'];
                        $res = $medicineOrders->searchMedicineOrder($id_supp);
                    }else {
                        $res = $medicineOrders->GetAllMedicineOrder();
                    }

                    
                    $count = count($res);
                    $sn = 1;
                    if ($count > 0) {
                        foreach ($res as $row) {
                            $id_order = $row->id_order;
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <?php
                                $res1 = $supp->GetSuppById($row->id_supp);
                                if ($res1 == true) {
                                    $nameSupp = $res1->name;
                                }else {
                                    $nameSupp = "";
                                }
                                ?>
                                <td><?= $nameSupp; ?></td>
                                <td><?= $row->order_date; ?></td>
                                <td><?= currency_format($row->total_cost,""); ?></td>
                                <td><?= $row->status; ?></td>

                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/medicine_order/view-medicineOrder.php?id=<?php echo $id_order; ?>"><i class="fa-solid fa-eye" style="margin-right: 5px;"></i></a>
                                    <a href="<?php echo SITEURL; ?>admin/medicine_order/delete-medicineOrder.php?id=<?php echo $id_order; ?>" onclick="return isDelete();"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                <?php
                        }
                    }else {
                        echo "<div class='error'> Không tìm thấy thông tin! </div>";
                    }
                ?>

            </tbody>
        </table>
        <b>
            <hr style="border-top: 2px solid #d35400;">
        </b>

    </div>
</div>