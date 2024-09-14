<?php require_once("../menu.php"); ob_start(); ?>

<div class="main-content">
    <div class="wrapper">

        <h3 class="pt-2 pl-20"><i class="fa-solid fa-user"></i> THÊM ĐƠN ĐẶT THUỐC</h3>
        <hr style="border-top: 2px solid #004085;">
        <br>

        <?php
            if (isset($_SESSION['add-medicine'])) {
                echo $_SESSION['add-medicine'];
                unset($_SESSION['add-medicine']);
            }
        
        ?>

        <h5>Tạo đơn đặt mới</h5>
        <hr>

        <label for="" id="noteAddMedicineOrder" style="color:  red;"></label>
        <form class="row g-3" method="POST" id="formAddMedicineOrder" onsubmit="return isAddMedicineOrder();">

            <div class="col-md-6">
                <label for="" class="form-label">Nhà cung cấp</label>
                <select class="form-select" aria-label="Default select example" name="supp">
                    <option value="" selected>Chọn nhà cung cấp</option>
                    <?php
                    $res = $supp->GetAll();
                    $count = count($res);
                    if ($count > 0) {
                        foreach ($res as $row) {
                    ?>

                            <option value="<?php echo $row->id_supp ?>"><?= $row->name; ?></option>
                    <?php
                        }
                    } else {
                        echo "Không có thông tin!";
                    }

                    ?>

                </select>
            </div>

            <div class="col-md-6">
                <label for="" class="form-label">Ngày đặt</label>
                <input type="date" class="form-control" name="order_date">
            </div>


            <h5>Chi tiết đơn đặt</h5>
            <hr>
            <div id="form-container">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="" class="form-label">Tên thuốc</label>
                        <select class="form-select" name="id_medicine[]" id="">
                            <option value="" selected>Chọn tên thuốc</option>
                            <?php
                            $res1 = $medicine->GetAll();
                            foreach ($res1 as $row) {
                            ?>
                                <option value="<?php echo $row->id_medicine ?>"><?= $row->name; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Số lượng</label>
                        <input class="form-control" type="text" name="quantity[]" id="" placeholder="Nhập số lượng">
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Đơn giá</label>
                        <input class="form-control" type="text" name="price[]" id="" placeholder="Nhập đơn giá">
                    </div>

                </div>
            </div>

            <div class="col-12">
                <div class="text-end">
                    <button type="button" class="btn btn-primary" onclick="addForm()"><i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-danger"onclick="deleteForm()" ><i class="fa fa-trash"></i></button>
                </div>
            </div>

            <div class="col-12">
                <input type="submit" name="submit" class="btn btn-primary" id="" value="Lưu đơn đặt">
            </div>
        </form>
        <hr style="border-top: 2px solid #d35400;">


        <?php
            if (isset($_POST['submit'])) {
                //Bảng medicineOrder
                $supp = $_POST['supp'];
                $order_date = $_POST['order_date'];
                $total_cost = 0;
                $status = "đã đặt";
                
                $id_order = $medicineOrders->insertMedicineOrder($supp, $order_date, $total_cost, $status);

                //Bảng medicineOrderDetail
                $id_medicines = $_POST['id_medicine'];
                $quantities = $_POST['quantity'];
                $prices = $_POST['price'];
                
                for ($i=0; $i < count($id_medicines) ; $i++) { 
                    $id_medicine = $id_medicines[$i];
                    $quantity = $quantities[$i];
                    $price = $prices[$i];

                    $res4 = $medicineOrders->insertMedicineOrderDetail($id_order, $id_medicine,$quantity,$price);

                    $total_cost += $quantity*$price;
                }
                
                

                $updateMedicines = $medicineOrders->updateMedicineOrder($total_cost, $id_order);
                
                if ($res4 == true) {
                    $_SESSION['add-medicine'] = "<div class='success'> Thêm thành công </div>";
                    header('location:'.SITEURL.'admin/medicine_order/add-medicineOrder.php');
                }else {
                    $_SESSION['add-medicine'] = "<div class='error'> Thêm không thành công </div>";
                    header('location:'.SITEURL.'admin/medicine_order/add-medicineOrder.php');
                }
            }
        ?>

    </div>
</div>


<script>
    var formTemplate = `
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="" class="form-label">Tên thuốc</label>
            <select class="form-select" name="id_medicine[]" id="">
                <option selected>Chọn tên thuốc</option>
                <?php
                $res1 = $medicine->GetAll();
                foreach ($res1 as $row) {
                ?>
                    <option value="<?php echo $row->id_medicine ?>"><?php echo $row->name; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="col-md-4">
            <label for="" class="form-label">Số lượng</label>
            <input class="form-control" type="text" name="quantity[]" id="" placeholder="Nhập số lượng">
        </div>

        <div class="col-md-4">
            <label for="" class="form-label">Đơn giá</label>
            <input class="form-control" type="text" name="price[]" id="" placeholder="Nhập đơn giá">
        </div>
    </div>
    `;
</script>



<?php ob_end_flush(); ?>