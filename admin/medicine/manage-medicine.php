<?php include("../menu.php"); ob_start(); ?>

<div class="main-content">
    <div class="wrapper">
        <h3 class="pt-2 pl-20"><i class="fa-solid fa-user"></i> QUẢN LÝ CÁC LOẠI THUỐC</h3>
        <br>
        <hr style="border-top: 2px solid #d35400;">

        <?php
        if (isset($_SESSION['delete-medicine'])) {
            echo $_SESSION['delete-medicine'];
            unset($_SESSION['delete-medicine']);
        }

        if (isset($_SESSION['add-medicine'])) {
            echo $_SESSION['add-medicine'];
            unset($_SESSION['add-medicine']);
        }

        if (isset($_SESSION['update-medicine'])) {
            echo $_SESSION['update-medicine'];
            unset($_SESSION['update-medicine']);
        }

        ?>

        <form action="" method="POST" class="row mb-3 tbl-30">
            <label for="search-medicine" class="col-sm-2 col-form-label">Search:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="search-medicine" name="search-medicine" placeholder="Tìm kiếm thuốc" onkeyup="searchMedicine()">
            </div>
        </form>

        <table class="table table-bordered table-list">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Tên thuốc</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Giá bản lẻ</th>
                    <th scope="col">Nhà cung cấp</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Ngày hết hạn</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Active</th>
                </tr>
            </thead>
            <tbody id="medicine-list">
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search-medicine'])) {
                    $search_term = $_POST['search-medicine'];
                    $res = $medicine->searchByName($search_term);
                } else {
                    $res = $medicine->GetAll();
                }

                $count = count($res);
                $sn = 1;
                if ($count > 0) {
                    foreach ($res as $row) {
                        $id_supp = $row->id_supp;
                        $id_medicine = $row->id_medicine;
                        $res1 = $supp->GetSuppById($id_supp);
                        if ($res1 == true) {
                            $nameSupp = $res1->name;
                        }else {
                            $nameSupp = "";
                        }
                        
                ?>

                        <tr>
                            <td><?= $sn++; ?></td>
                            <td><?= $row->name; ?></td>
                            <td><?= $row->description; ?></td>
                            <td><?= currency_format($row->price,"");  ?></td>
                            <td><?= $nameSupp; ?></td>
                            <td><?= $row->quantity;?></td>
                            <td><?= $row->exp_day; ?></td>

                            <td>
                                <?php 
                                    if ($row->status == "thuốc hết hạn" || $row->status == "hết thuốc") {
                                        echo "<div class='error'> $row->status </div>";
                                    }else {
                                        echo "<div class='success'> $row->status </div>";
                                    }
                                ?>
                                
                            </td>

                            <td>
                                <a href="<?php echo SITEURL; ?>admin/medicine/update-medicine.php?id=<?php echo $id_medicine; ?>"><i class="fa-solid fa-pen" style="margin-right: 15px;"></i></a>
                                <a href="<?php echo SITEURL; ?>admin/medicine/delete-medicine.php?id=<?php echo $id_medicine; ?>" onclick="return isDelete();"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>

                <?php
                    }
                } else {
                    echo "<div class='error'> Không tìm thấy được thông tin! </div>";
                }
                ?>
            </tbody>
        </table>
        <b>
            <hr style="border-top: 2px solid #d35400;">
        </b>

    </div>
</div>

<?php ob_end_flush(); ?>