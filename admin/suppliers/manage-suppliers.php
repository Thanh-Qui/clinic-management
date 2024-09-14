<?php require_once('../menu.php');
ob_start(); ?>

<div class="main-content">
    <div class="wrapper">
        <h3 class="pt-2 pl-20"><i class="fa-solid fa-user"></i> Quản lý các nhà cung cấp</h3>
        <hr><br>

        <?php
        if (isset($_SESSION['delete-supp'])) {
            echo $_SESSION['delete-supp'];
            unset($_SESSION['delete-supp']);
        }

        if (isset($_SESSION['add-supp'])) {
            echo $_SESSION['add-supp'];
            unset($_SESSION['add-supp']);
        }

        if (isset($_SESSION['update-supp'])) {
            echo $_SESSION['update-supp'];
            unset($_SESSION['update-supp']);
        }

        ?>

        <h5>Tìm kiếm nhà cung cấp</h5>
        <form action="" method="POST" class="row mb-3 tbl-30">
            <label for="search-supplier" class="col-sm-2 col-form-label">Search:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="search-supplier" name="search-supplier" placeholder="Tìm kiếm nhà cung cấp" onkeyup="searchSupplier()">
            </div>
        </form>

        <table class="table table-bordered table-list">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Tên nhà cung cấp</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Active</th>
                </tr>
            </thead>

            <tbody id="supplier-list">
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search-supplier'])) {
                    $name = $_POST['search-supplier'];
                    $res = $supp->searchSuppByName($name);
                } else {
                    $res = $supp->GetAll();
                }


                $sn = 1;
                if (count($res) > 0) {
                    foreach ($res as $row) {
                        $id_supp = $row->id_supp;
                ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->contact; ?></td>
                            <td><?php echo $row->address ?></td>

                            <td>
                                <a href="<?php echo SITEURL; ?>admin/suppliers/update-supplier.php?id=<?php echo $id_supp; ?>"><i class="fa fa-pen" style="margin-right: 5px;"></i></a>
                                <a href="<?php echo SITEURL; ?>admin/suppliers/delete-supplier.php?id=<?php echo $id_supp; ?>" onclick="return isDelete();"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<div class='error'>Không tìm thấy thông tin!</div>";
                }
                ?>


            </tbody>

        </table>

        <hr>
    </div>
</div>

<?php ob_end_flush(); ?>